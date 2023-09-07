<?php

namespace App\Livewire\Atasan;

use App\Models\SuratIzin;
use Carbon\Carbon;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithPagination;
use RealRashid\SweetAlert\Facades\Alert;

class DaftarSuratIzin extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $id_surat_izin;

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

    public function approved($id) {
        $this->id_surat_izin = $id;

        $this->dispatch('show-approved-modal');
    }

    public function reject($id) {
        $this->id_surat_izin = $id;

        $this->dispatch('show-reject-modal');
    }

    public function resetData($id) {
        $this->id_surat_izin = $id;

        $this->dispatch('show-reset-modal');
    }

    public function approveHRD($id) {
        $this->id_surat_izin = $id;

        $this->dispatch('show-approved-hrd-modal');
    }

    public function rejectHRD($id) {
        $this->id_surat_izin = $id;

        $this->dispatch('show-reject-hrd-modal');
    }

    public function resetDataHRD($id) {
        $this->id_surat_izin = $id;

        $this->dispatch('show-reset-hrd-modal');
    }

    public function closeCanceDaftarlIzinCuti() {
        $this->id_surat_izin = '';
    }

    public function approveSuratIzinAtasan() {
        SuratIzin::where('id', $this->id_surat_izin)->update([
            'status' => 1,
            'status_hrd' => 0
        ]);

        Alert::toast('Berhasil approve.','success');
        return redirect('daftar-surat-izin');
    }

    public function approveSuratIzinHRD() {
        SuratIzin::where('id', $this->id_surat_izin)->update([
            'status_hrd' => 1
        ]);

        Alert::toast('Berhasil approve.','success');
        return redirect('daftar-surat-izin');
    }

    public function rejectSuratIzinAtasan() {
        SuratIzin::where('id', $this->id_surat_izin)->update([
            'status' => 2,
            'status_hrd' => null
        ]);

        Alert::toast('Berhasil reject.','success');
        return redirect('daftar-surat-izin');
    }

    public function rejectSuratIzinHRD() {
        SuratIzin::where('id', $this->id_surat_izin)->update([
            'status_hrd' => 2
        ]);

        Alert::toast('Berhasil reject.','success');
        return redirect('daftar-surat-izin');
    }

    public function resetSuratIzinAtasan() {
        SuratIzin::where('id', $this->id_surat_izin)->update([
            'status' => 0,
            'status_hrd' => null
        ]);

        Alert::toast('Berhasil direset.','success');
        return redirect('daftar-surat-izin');
    }

    public function resetSuratIzinHRD() {
        SuratIzin::where('id', $this->id_surat_izin)->update([
            'status_hrd' => 0
        ]);

        Alert::toast('Berhasil direset.','success');
        return redirect('daftar-surat-izin');
    }

    #[Layout('layouts.app')]
    public function render()
    {
        
        return view('livewire.atasan.daftar-surat-izin', [
            'suratIzin' => SuratIzin::where('keperluan_izin', 'like', '%'.$this->search.'%')
                            ->orWhere('keterangan_izin', 'like', '%'.$this->search.'%')
                            ->orderBy($this->sortField, $this->sortDirection)
                            ->paginate($this->perPage),
            'suratIzinHRD' => SuratIzin::where('status', 1)
                            ->where('keterangan_izin', 'like', '%'.$this->search.'%')
                            ->orderBy($this->sortField, $this->sortDirection)
                            ->paginate($this->perPage),
            'total' => SuratIzin::count(),
            'totalHRD' => SuratIzin::where('status', 1)->count(),
            'countSuratIzinAll' => SuratIzin::count(),
            'countSuratIzin' => SuratIzin::where('status', 0)->count(),
            'countSuratIzinHRD' => SuratIzin::where('status_hrd', 0)->count(),
            'countAllSuratIzinHRD' => SuratIzin::where('status_hrd', '!=', null)->count(),
            'countAllSuratIzin' => SuratIzin::where('status', '!=', null)->count(),
            
        ]);
    }

    public function updatingSearch() {
        $this->resetPage();
    }

    public function updatingPerPage() {
        $this->resetPage();
    }
}
