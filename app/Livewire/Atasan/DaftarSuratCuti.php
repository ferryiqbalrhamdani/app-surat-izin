<?php

namespace App\Livewire\Atasan;

use App\Models\Cuti;
use App\Models\SuratIzin;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;
use RealRashid\SweetAlert\Facades\Alert;

class DaftarSuratCuti extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $perPage = 5;
    public $sortField ='created_at';
    public $sortDirection = 'desc';
    public $id_cuti;

    #[Url()]
    public $search = '';
    

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

    public function approved($id) {
        $this->id_cuti = $id;

        $this->dispatch('show-approved-modal');
    }

    public function reject($id) {
        $this->id_cuti = $id;

        $this->dispatch('show-reject-modal');
    }

    public function resetData($id) {
        $this->id_cuti = $id;

        $this->dispatch('show-reset-modal');
    }

    public function approvedHRD($id) {
        $this->id_cuti = $id;

        $this->dispatch('show-approved-hrd-modal');
    }

    public function rejectHRD($id) {
        $this->id_cuti = $id;

        $this->dispatch('show-reject-hrd-modal');
    }

    public function resetDataHRD($id) {
        $this->id_cuti = $id;

        $this->dispatch('show-reset-hrd-modal');
    }

    public function approveSuratIzinAtasan() {
        Cuti::where('id', $this->id_cuti)->update([
            'status' => 1,
            'status_hrd' => 0
        ]);

        Alert::toast('Berhasil approve.','success');
        return redirect('daftar-cuti');
    }

    public function approveSuratIzinHRD() {
        Cuti::where('id', $this->id_cuti)->update([
            'status_hrd' => 1
        ]);

        Alert::toast('Berhasil approve.','success');
        return redirect('daftar-cuti');
    }

    public function rejectSuratIzinAtasan() {
        Cuti::where('id', $this->id_cuti)->update([
            'status' => 2,
            'status_hrd' => null
        ]);

        Alert::toast('Berhasil reject.','success');
        return redirect('daftar-cuti');
    }

    public function rejectSuratIzinHRD() {
        Cuti::where('id', $this->id_cuti)->update([
            'status_hrd' => 2
        ]);

        Alert::toast('Berhasil reject.','success');
        return redirect('daftar-cuti');
    }

    public function resetSuratIzinAtasan() {
        Cuti::where('id', $this->id_cuti)->update([
            'status' => 0,
            'status_hrd' => null
        ]);

        Alert::toast('Berhasil direset.','success');
        return redirect('daftar-cuti');
    }

    public function resetSuratIzinHRD() {
        Cuti::where('id', $this->id_cuti)->update([
            'status_hrd' => 0
        ]);

        Alert::toast('Berhasil direset.','success');
        return redirect('daftar-cuti');
    }

    public function closeCanceDaftarlIzinCuti() {
        $this->id_cuti = '';
    }

    #[Layout('layouts.app')]
    public function render()
    {
        
        return view('livewire.atasan.daftar-surat-cuti', [
            // 'cuti' => Cuti::whereMonth('start_date', Carbon::now()->month)->orderBy($this->sortField, $this->sortDirection)->paginate($this->perPage),
            'cuti' => Cuti::where('keperluan_cuti', 'like', '%'.$this->search.'%')
                            ->orWhere('keterangan_cuti', 'like', '%'.$this->search.'%')
                            ->orWhere('lama_cuti', 'like', '%'.$this->search.'%')
                            ->orderBy($this->sortField, $this->sortDirection)
                            ->paginate($this->perPage),
            'cutiHRD' => Cuti::where('status', 1)
                            ->where('keperluan_cuti', 'like', '%'.$this->search.'%')
                            ->orWhere('keterangan_cuti', 'like', '%'.$this->search.'%')
                            ->where('status', 1)
                            ->orWhere('lama_cuti', 'like', '%'.$this->search.'%')
                            ->where('status', 1)
                            ->orderBy($this->sortField, $this->sortDirection)
                            ->paginate($this->perPage),
            'cutiNotif' => Cuti::where('status', 0)
                            ->get(),                
            'cutiNotifHRD' => Cuti::where('status_hrd', 0)
                            ->get(),                
            'countCutiAll' => Cuti::count(),
            'countCuti' => Cuti::where('status', 0)->count(),
            'countCutiHRD' => Cuti::where('status_hrd', 0)->count(),
            
        ]);
    }

    public function updatingSearch() {
        $this->resetPage();
    }

    public function updatingPerPage() {
        $this->resetPage();
    }
}
