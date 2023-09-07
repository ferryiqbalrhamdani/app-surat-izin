<?php

namespace App\Livewire\User;


use App\Models\Lembur;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Rule;
use Livewire\Component;
use Livewire\WithPagination;
use DateTime;
use RealRashid\SweetAlert\Facades\Alert;

class IzinLemburComponents extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    #[Rule('required', as: 'tanggal lembur')]
    public $tgl_lembur;

    #[Rule('required', as: 'jam mulai')]
    public $start_time;

    #[Rule('required', as: 'jam selesai')]
    public $end_time;

    #[Rule('required')]
    public $keterangan_lembur;

    public $perPage = 5;
    public $sortField ='created_at';
    public $sortDirection = 'desc';
    public $search = '';
    public $id_lembur;
    
     public function sortBy($sortField) {
        if($this->sortField === $sortField) {
            $this->sortDirection = $this->swapSortDirection();
        } else {
            $this->sortDirection = 'asc';

        }

        $this->sortField = $sortField;
    }

    public function swapSortDirection() {
       return $this->sortDirection === 'asc' ? 'desc' : 'asc';
    } 

    public function tambahDataLembur() {
        $this->validate([
            'tgl_lembur' => 'required|date',
            'start_time' => 'required',
            'end_time' => 'required',
            'keterangan_lembur' => 'required',
        ]);

        $datetime1  = $this->start_time;
        $datetime2  = $this->end_time;
        $date1 = new DateTime($datetime1);
        $date2 = new DateTime($datetime2);
        $lamaLembur = $date1->diff($date2)->format('%H:%I');
        $pemisahan = explode(':', $lamaLembur);
        $jam = $pemisahan[0];
        $upahMakan = 0;
        $status = 0;
        $status_hrd = null;
        $upahLemburPerjam = 15000;

        if($lamaLembur > '05:00') {
            $upahLemburPerjam = 0;
            $upahLembur = 100000;
        } else if($lamaLembur >= '03:00') {
            $upahMakan = 20000;
            $upahLembur = $upahLemburPerjam * $jam + $upahMakan;
            
        } else {
            $upahLembur = $upahLemburPerjam * $jam;
        }

        if(Auth::user()->role_id == 3) {
            $status = 1;
            $status_hrd = 0;
        }
        

        Lembur::create([
            'user_id' => Auth::user()->id,
            'tgl_lembur' => date_create($this->tgl_lembur),
            'start_time' => $this->start_time,
            'end_time' => $this->end_time,
            'lama_lembur' => $lamaLembur,
            'uang_makan' => $upahMakan,
            'upah_lembur_perjam' => $upahLemburPerjam,
            'upah_lembur' => $upahLembur,
            'status' => $status,
            'status_hrd' => $status_hrd,
            'keterangan_lembur' => $this->keterangan_lembur,
        ]);

        Alert::toast('Berhasil disimpan.','success');
        return redirect('izin-lembur');
    }

    public function ubahIzinLembur($id) {
        $lembur = Lembur::where('id', $id)->first();

        $this->id_lembur = $lembur->id;
        $this->tgl_lembur = $lembur->tgl_lembur;
        $this->start_time = $lembur->start_time;
        $this->end_time = $lembur->end_time;
        $this->keterangan_lembur = $lembur->keterangan_lembur;

        $this->dispatch('show-ubah-modal');

    }

    public function ubahDataLembur() {
        $this->validate([
            'tgl_lembur' => 'required|date',
            'start_time' => 'required',
            'end_time' => 'required',
            'keterangan_lembur' => 'required',
        ]);

        $datetime1  = $this->start_time;
        $datetime2  = $this->end_time;
        $date1 = new DateTime($datetime1);
        $date2 = new DateTime($datetime2);
        $lamaLembur = $date1->diff($date2)->format('%H:%I');
        $pemisahan = explode(':', $lamaLembur);
        $jam = $pemisahan[0];
        $upahMakan = 0;
        $status = 0;
        $status_hrd = null;

        if($lamaLembur > '05:00') {
            $upahLembur = 100000;
        } else if($lamaLembur >= '03:00') {
            $upahMakan = 20000;
            $upahLembur = 15000 * $jam + $upahMakan;
            
        } else {
            $upahLembur = 15000 * $jam;
        }

        if(Auth::user()->role_id == 3) {
            $status = 1;
            $status_hrd = 0;
        }
        

        Lembur::where('id', $this->id_lembur)->update([
            'user_id' => Auth::user()->id,
            'tgl_lembur' => date_create($this->tgl_lembur),
            'start_time' => $this->start_time,
            'end_time' => $this->end_time,
            'lama_lembur' => $lamaLembur,
            'uang_makan' => $upahMakan,
            'upah_lembur' => $upahLembur,
            'status' => $status,
            'status_hrd' => $status_hrd,
            'keterangan_lembur' => $this->keterangan_lembur,
        ]);

       

        Alert::toast('Berhasil diubah.','success');

        $this->tgl_lembur = '';
        $this->start_time = '';
        $this->end_time = '';
        $this->keterangan_lembur = '';

        return redirect('izin-lembur');
    }

    public function cancelIzinLembur($id) {
        $this->id_lembur = $id;

        $this->dispatch('show-confirm-modal');
    }

    public function destroySuratLembur() {
        Lembur::where('id', $this->id_lembur)->delete();

        Alert::toast('Berhasil diubah.','success');
        
        $this->id_lembur = '';
        return redirect('izin-lembur');
    }

    #[Layout('layouts.app')]
    public function render()
    {        
        return view('livewire.user.izin-lembur-components',  [
            'lembur' => Lembur::where('user_id', Auth::user()->id)
                                ->where('keterangan_lembur', 'like', '%'.$this->search.'%')
                                ->orderBy($this->sortField, $this->sortDirection)
                                ->paginate($this->perPage),
            'total' => Lembur::where('user_id', Auth::user()->id)->count()
        ]);
    }

    public function updatingSearch() {
        $this->resetPage();
    }

    public function updatingPerPage() {
        $this->resetPage();
    }
}
