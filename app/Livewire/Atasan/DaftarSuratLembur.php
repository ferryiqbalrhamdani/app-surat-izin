<?php

namespace App\Livewire\Atasan;

use App\Models\Lembur;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithPagination;
use RealRashid\SweetAlert\Facades\Alert;

class DaftarSuratLembur extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $id_surat_izin;

    public $perPage = 5;
    public $sortField ='created_at';
    public $sortDirection = 'desc';
    public $search = '';
    public $id_lembur, $tgl_lembur, $start_time, $end_time, $lama_lembur, $upah_lembur_perjam, $uang_makan, $upah_lembur, $keterangan_lembur, $nama_user;

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
        $this->id_lembur = $id;

        $this->dispatch('show-approved-modal');
    }

    public function reject($id) {
        $this->id_lembur = $id;

        $this->dispatch('show-reject-modal');
    }

    public function resetData($id) {
        $this->id_lembur = $id;

        $this->dispatch('show-reset-modal');
    }

    public function approveHRD($id) {
        $this->id_lembur = $id;

        $this->dispatch('show-approved-hrd-modal');
    }

    public function rejectHRD($id) {
        $this->id_lembur = $id;

        $this->dispatch('show-reject-hrd-modal');
    }

    public function resetDataHRD($id) {
        $this->id_lembur = $id;

        $this->dispatch('show-reset-hrd-modal');
    }

    public function closeCanceDaftarlIzinCuti() {
        $this->id_lembur = '';
        return redirect('daftar-lembur');
    }

    public function approveSuratIzinAtasan() {
        Lembur::where('id', $this->id_lembur)->update([
            'status' => 1,
            'status_hrd' => 0
        ]);

        Alert::toast('Berhasil approve.','success');
        return redirect('daftar-lembur');
    }

    public function approveSuratIzinHRD() {
        Lembur::where('id', $this->id_lembur)->update([
            'status_hrd' => 1
        ]);

        Alert::toast('Berhasil approve.','success');
        return redirect('daftar-lembur');
    }

    public function rejectSuratIzinAtasan() {
        Lembur::where('id', $this->id_lembur)->update([
            'status' => 2,
            'status_hrd' => null
        ]);

        Alert::toast('Berhasil reject.','success');
        return redirect('daftar-lembur');
    }

    public function rejectSuratIzinHRD() {
        Lembur::where('id', $this->id_lembur)->update([
            'status_hrd' => 2
        ]);

        Alert::toast('Berhasil reject.','success');
        return redirect('daftar-lembur');
    }

    public function resetSuratIzinAtasan() {
        Lembur::where('id', $this->id_lembur)->update([
            'status' => 0,
            'status_hrd' => null
        ]);

        Alert::toast('Berhasil direset.','success');
        return redirect('daftar-lembur');
    }

    public function resetSuratIzinHRD() {
        Lembur::where('id', $this->id_lembur)->update([
            'status_hrd' => 0
        ]);

        Alert::toast('Berhasil direset.','success');
        return redirect('daftar-lembur');
    }

    public function detailHRD($id) {
        $lembur = DB::table('tb_lembur')
                        ->where('tb_lembur.id', $id)
                        ->join('users', 'tb_lembur.user_id', '=', 'users.id')
                        ->select('tb_lembur.*', 'users.name',)
                        ->whereYear('start_time', Carbon::now()->year)
                        ->first();

        // dd($lembur);
        $this->nama_user = $lembur->name;
        $this->tgl_lembur = $lembur->tgl_lembur;
        $this->start_time = $lembur->start_time;
        $this->end_time = $lembur->end_time;
        $this->lama_lembur = $lembur->lama_lembur;
        $this->upah_lembur_perjam = $lembur->upah_lembur_perjam;
        $this->uang_makan = $lembur->uang_makan;
        $this->upah_lembur = $lembur->upah_lembur;
        $this->keterangan_lembur = $lembur->keterangan_lembur;

        $this->dispatch('show-detail-hrd-modal');

    }

    #[Layout('layouts.app')]
    public function render()
    {
        $data['countAllLembur'] = Lembur::count();
        $data['countLembur'] = Lembur::where('status', 0)->count();
        $data['countLemburHrd'] = Lembur::where('status_hrd', 0)->count();
        $lembur = Lembur::orderBy('created_at', 'desc')->get();
        $lembur = $lembur->map(function($leave, $key) {
            $user = User::find($leave->user_id);
            $leave->employee = $user;
            return $leave;
        });
        
        return view('livewire.atasan.daftar-surat-lembur', [
            'lembur' => Lembur::where('keterangan_lembur', 'like', '%'.$this->search.'%')
                            ->orWhere('upah_lembur', 'like', '%'.$this->search.'%')
                            ->orWhere('lama_lembur', 'like', '%'.$this->search.'%')
                            ->orderBy($this->sortField, $this->sortDirection)
                            ->paginate($this->perPage),
            'lemburHRD' => Lembur::where('status', 1)
                            ->where('keterangan_lembur', 'like', '%'.$this->search.'%')
                            ->orWhere('upah_lembur', 'like', '%'.$this->search.'%')
                            ->where('status', 1)
                            ->orWhere('lama_lembur', 'like', '%'.$this->search.'%')
                            ->where('status', 1)
                            ->orderBy($this->sortField, $this->sortDirection)
                            ->paginate($this->perPage),
            'lemburNotif' => Lembur::where('status', 0)
                            ->get(),                
            'lemburNotifHRD' => Lembur::where('status_hrd', 0)
                            ->get(),                
            'countLemburAll' => Lembur::count(),
            'countLembur' => Lembur::where('status', 0)->count(),
            'countLemburHRD' => Lembur::where('status_hrd', 0)->count(),
        ]);
    }
}
