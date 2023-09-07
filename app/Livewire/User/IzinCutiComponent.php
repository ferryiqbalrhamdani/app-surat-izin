<?php

namespace App\Livewire\User;

use Livewire\Attributes\Url;
use App\Models\Cuti;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Rule;
use Livewire\Component;
use Livewire\WithPagination;
use RealRashid\SweetAlert\Facades\Alert;

class IzinCutiComponent extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    #[Rule('required')]
    public $keperluanCuti;

    #[Rule('required')]
    public $pilihan;

    #[Rule('required', as: 'mulai cuti')]
    public $date1;

    #[Rule('required')]
    public $lamaCuti = '1 hari';

    #[Rule('required', as: 'tanggal mulai')]
    public $start;
    
    #[Rule('required', as: 'tanggal akhir')]
    public $end;


    #[Rule('required')]
    public $keterangan_cuti;

    public $perPage = 5;
    public $sortField ='created_at';
    public $sortDirection = 'desc';

    public $id_cuti;

    #[Url]
    public $search = '';

    public function tambahSuratCuti() {
        if(Auth::user()->jk == 'P') {
            $date1 = 'required';
        } else {
            $date1 = '';
        }

        if($this->keperluanCuti == 'Cuti Khusus') {
            $rule = 'required';
        } else {
            $rule = '';
            
        }

        

        if($this->lamaCuti == '1 hari') {
            $start = 'required';
            $end = '';
        } else {
            $start = 'required';
            $end = 'required';
        }


        if($this->pilihan == 'Cuti Melahirkan') {
            $start = '';
        } 

         if($this->pilihan != 'Cuti Melahirkan') {
            $date1 = '';
        } 

        $this->validate([
            'keperluanCuti' => 'required',
            'keterangan_cuti' => 'required',
            'pilihan' => $rule,
            'date1' => $date1,
            'start' => $start,
            'end' => $end ,
        ]);

        
        
        if($this->pilihan == "Cuti Melahirkan") {
            $str = date('Y-m-d',strtotime($this->date1));
            $n = date('Y-m-d', strtotime($str . " +3 month"));

            $diff = Carbon::parse($str)->diffInMonths(Carbon::parse($n), false)." bulan";
        } else {
            // [$start, $end] = explode(' - ', $this->date_range);
            // $str = date_create($this->start);
            // $n = date_create($this->end);
            if($this->lamaCuti == '1 hari') {
                $str = date_create($this->start);
                $n = date_create($this->start);
            } else {
                $str = date_create($this->start);
                $n = date_create($this->end);
            }

            $data = date_diff($str, $n);
            $diff = $data->d+1 ." hari";
        }

        if($this->pilihan != null) {
            $data = $this->pilihan.", ".$this->keterangan_cuti;
        } else {
            $data = $this->keterangan_cuti;
        }

        if(Auth::user()->role_id == 2) {
            Cuti::create([
                'user_id' => Auth::user()->id,
                'start_date' => $str,
                'end_date' => $n,
                'lama_cuti' => $diff,
                'keperluan_cuti' => $this->keperluanCuti,
                'keterangan_cuti' => $data,
            ]);

        } elseif(Auth::user()->role_id == 3) {
            Cuti::create([
                'user_id' => Auth::user()->id,
                'start_date' => $str,
                'end_date' => $n,
                'lama_cuti' => $diff,
                'keperluan_cuti' => $this->keperluanCuti,
                'keterangan_cuti' => $data,
                'status' => 1,
                'status_hrd' => 0,
            ]);
        }
        
        Alert::toast('Berhasil disimpan.','success');
        return redirect('izin-cuti');
    }

    public function ubahSuratCuti() {
        // dd('berhasil');
        if(Auth::user()->jk == 'P') {
            $date1 = 'required';
        } else {
            $date1 = '';
        }

        if($this->keperluanCuti == 'Cuti Khusus') {
            $rule = 'required';
        } else {
            $rule = '';
        }

        if($this->lamaCuti == '1 hari') {
            $start = 'required';
            $end = '';
        } else {
            $start = 'required';
            $end = 'required';
        }

        


        $this->validate([
            'keperluanCuti' => 'required',
            'keterangan_cuti' => 'required',
            'pilihan' => $rule,
            'date1' => $date1,
            'start' => $start,
            'end' => $end ,
        ]);
        
        if($this->keperluanCuti == "Cuti Melahirkan") {
            $str = date('Y-m-d',strtotime($this->date1));
            $n = date('Y-m-d', strtotime($str . " +3 month"));

            $diff = Carbon::parse($str)->diffInMonths(Carbon::parse($n), false)." bulan";
        } else {
            // [$start, $end] = explode(' - ', $this->date_range);
            // $str = date_create($this->start);
            // $n = date_create($this->end);
            if($this->lamaCuti == '1 hari') {
                $str = date_create($this->start);
                $n = date_create($this->start);
            } else {
                $str = date_create($this->start);
                $n = date_create($this->end);
            }

            $data = date_diff($str, $n);
            $diff = $data->d+1 ." hari";
        }

        if($this->keperluanCuti == 'Cuti Khusus') {
            if($this->pilihan != null) {
                $data = $this->pilihan.", ".$this->keterangan_cuti;
            } else {
                $data = $this->keterangan_cuti;
            }
        } else {
            $this->pilihan = '';
            $data = $this->pilihan."".$this->keterangan_cuti;
        }

        if(Auth::user()->role_id == 2) {
            Cuti::where('id', $this->id_cuti)->update([
                'user_id' => Auth::user()->id,
                'start_date' => $str,
                'end_date' => $n,
                'lama_cuti' => $diff,
                'keperluan_cuti' => $this->keperluanCuti,
                'keterangan_cuti' => $data,
            ]);

        } elseif(Auth::user()->role_id == 3) {
            Cuti::where('id', $this->id_cuti)->update([
                'user_id' => Auth::user()->id,
                'start_date' => $str,
                'end_date' => $n,
                'lama_cuti' => $diff,
                'keperluan_cuti' => $this->keperluanCuti,
                'keterangan_cuti' => $data,
                'status' => 1,
                'status_hrd' => 0,
            ]);
        }
        
        Alert::toast('Berhasil disimpan.','success');
        return redirect('izin-cuti');
    }

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

    public function ubahIzinCuti($id) {
        $cuti = Cuti::where('id', $id)->first();

        [$keterangan]=explode(",",$cuti->keterangan_cuti);
        $keterangan_cuti=explode( ",",$cuti->keterangan_cuti);
        // dd($keterangan);

        if($cuti->lama_cuti == '1 hari') {
            $this->lamaCuti = '1 hari';
        } else {
            $this->lamaCuti = 'lebih dari sehari';
        }

        if($keterangan != null) {
            $data = end($keterangan_cuti);
        } else {
            $data = $keterangan;
        }


        $this->id_cuti = $cuti->id;
        $this->keperluanCuti = $cuti->keperluan_cuti;
        $this->pilihan = $keterangan;
        $this->date1 = $cuti->start_date;
        $this->start = $cuti->start_date;
        $this->end = $cuti->end_date;
        $this->keterangan_cuti = $data;
        

        
        $this->dispatch('show-ubah-modal');
    }


    public function closeUbahData() {
        $this->id_cuti = '';
        $this->keperluanCuti = '';
        $this->pilihan = '';
        $this->date1 = '';
        $this->start = '';
        $this->end = '';
        $this->keterangan_cuti = '';
        $this->lamaCuti = '1 hari';
    }

    public function cancelIzinCuti($id) {
        $this->id_cuti = $id;

        $this->dispatch('show-cancel-modal');
    }

    public function destroyIzinCuti() {
        Cuti::where('id', $this->id_cuti)->delete();

        Alert::toast('Data berhasil dibatalkan.','success');
        return redirect('izin-cuti');
    }

    public function closeCancelIzinCuti() {
        $this->id_cuti = '';
    }

    #[Layout('layouts.app')]
    public function render()
    {
        return view('livewire.user.izin-cuti-component', [
            'izinCuti' => Cuti::where('user_id', Auth::user()->id)
                                ->where('keperluan_cuti', 'like', '%'.$this->search.'%')
                                ->orWhere('user_id', Auth::user()->id)
                                ->where('lama_cuti', 'like', '%'.$this->search.'%')
                                ->orWhere('user_id', Auth::user()->id)
                                ->where('lama_cuti', 'like', '%'.$this->search.'%')
                                ->orderBy($this->sortField, $this->sortDirection)
                                ->paginate($this->perPage),
            'total' => Cuti::where('user_id', Auth::user()->id)->count(),
        ]);
        
    }

    public function updatingSearch() {
        $this->resetPage();
    }

    public function updatingPerPage() {
        $this->resetPage();
    }
}
