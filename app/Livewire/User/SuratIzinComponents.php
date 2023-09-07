<?php

namespace App\Livewire\User;

use App\Models\SuratIzin;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Rule;
use Livewire\Component;
use Livewire\WithPagination;
use RealRashid\SweetAlert\Facades\Alert;

class SuratIzinComponents extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    
    #[Rule('required')] 
    public $keperluanIzin;

    #[Rule('required')] 
    public $jam_akhir;

    #[Rule('required')] 
    public $tanggal_izin;

    #[Rule('required')] 
    public $jam_mulai;

    #[Rule('required')] 
    public $keterangan_izin;

    public $id_surat_izin;

    public $perPage = 5;
    public $sortField ='created_at';
    public $sortDirection = 'desc';
    public $search = '';

    public function tambahSuratIzin() {

        // dd($this->keperluanIzin);
        if($this->keperluanIzin == 'Izin Meninggalkan Kantor' || $this->keperluanIzin == 'Tugas Meninggalkan Kantor') {
            $jamMulai = 'required';
            $jamAkhir = 'required';
        } elseif($this->keperluanIzin == 'Izin Tidak Masuk Kerja') {
            $jamMulai = '';
            $jamAkhir = '';
        } elseif($this->keperluanIzin == 'Izin Datang Terlambat') {
            $jamMulai = 'required';
            $jamAkhir = '';
        } else {
            $jamMulai = 'required';
            $jamAkhir = 'required';
        }

        $this->validate([
            'tanggal_izin' => 'required',
            'jam_mulai' => $jamMulai,
            'jam_akhir' => $jamAkhir,
            'keterangan_izin' => 'required',
            'keperluanIzin' => 'required',
        ], [
            'tanggal_izin.required' => 'Tanggal izin wajib diisi!',
            'jam_mulai.required' => 'Jam masuk wajib diisi!',
            'jam_akhir.required' => 'Jam keluar wajib diisi!',
            'keterangan_izin.required' => 'Keterangan izin wajib diisi!',
            'keperluanIzin.required' => 'Keperluan izin wajib diisi!',
        ]);
        // dd($this->all());
        if($this->keperluanIzin == 'Tugas Meninggalkan Kantor' || $this->keperluanIzin == 'Izin Meninggalkan Kantor') {
            $jamKeluar = $this->jam_akhir;
            $jamMasuk = $this->jam_mulai;
        } elseif($this->keperluanIzin == 'Izin Datang Terlambat' ) {
            $jamKeluar = $this->jam_mulai;
            $jamMasuk = '08:00:00';
        } else {
            $jamKeluar = '17:00:00';
            $jamMasuk = '08:00:00';
        }

        if(Auth::user()->role_id == 2) {
            SuratIzin::create([
                'nama_user' => Auth::user()->name,
                'nama_pt' => Auth::user()->nama_pt,
                'username_user' => Auth::user()->username,
                'divisi_user' => Auth::user()->divisi,
                'tanggal_izin' => $this->tanggal_izin,
                'jam_mulai' => $jamMasuk,
                'jam_akhir' => $jamKeluar,
                'keterangan_izin' => $this->keterangan_izin,
                'keperluan_izin' => $this->keperluanIzin,
                'role_id' => Auth::user()->role_id,
                
            ]);
        } elseif(Auth::user()->role_id == 3) {
            SuratIzin::create([
                'nama_user' => Auth::user()->name,
                'nama_pt' => Auth::user()->nama_pt,
                'username_user' => Auth::user()->username,
                'divisi_user' => Auth::user()->divisi,
                'tanggal_izin' => $this->tanggal_izin,
                'jam_mulai' => $jamMasuk,
                'jam_akhir' => $jamKeluar,
                'keterangan_izin' => $this->keterangan_izin,
                'keperluan_izin' => $this->keperluanIzin,
                'status' => 1,
                'status_hrd' => 0,
                'role_id' => Auth::user()->role_id,
                
            ]);
        }
        

        toast('Berhasil disimpan.','success');
        return redirect('surat-izin');
    }

    public function closeTambahDataModal() {
        $this->dispatch('close-modal');
    }

    public function ketIzin() {
       $this->keperluanIzin;

    }

    public function cancelSuratIzin($id) {
        $this->id_surat_izin = $id;

        $this->dispatch('show-confirm-cancel');
    }
    
    public function destroySuratIzin() {
        SuratIzin::where('id', $this->id_surat_izin)->delete();

        Alert::toast('Data berhasil dibatalkan', 'success');
        return redirect('surat-izin');
    }

    public function ubahSuratIzin($id) {
        $suratIzin = SuratIzin::where('id', $id)->first();

        $this->id_surat_izin = $suratIzin->id;
        $this->keperluanIzin = $suratIzin->keperluan_izin;
        $this->tanggal_izin = $suratIzin->tanggal_izin;
        $this->jam_mulai = $suratIzin->jam_mulai;
        $this->jam_akhir = $suratIzin->jam_akhir;
        $this->keterangan_izin = $suratIzin->keterangan_izin;

        
        $this->dispatch('show-ubah-modal');
        // dd($this->keperluanIzin = $suratIzin->keperluan_izin);
    }

    public function UbahDataSuratIzin() {
        if($this->keperluanIzin == 'Izin Meninggalkan Kantor' || $this->keperluanIzin == 'Tugas Meninggalkan Kantor') {
            $jamMulai = 'required';
            $jamAkhir = 'required';
        } elseif($this->keperluanIzin == 'Izin Tidak Masuk Kerja') {
            $jamMulai = '';
            $jamAkhir = '';
        } elseif($this->keperluanIzin == 'Izin Datang Terlambat') {
            $jamMulai = 'required';
            $jamAkhir = '';
        } else {
            $jamMulai = 'required';
            $jamAkhir = 'required';
        }

        $this->validate([
            'tanggal_izin' => 'required',
            'jam_mulai' => $jamMulai,
            'jam_akhir' => $jamAkhir,
            'keterangan_izin' => 'required',
            'keperluanIzin' => 'required',
        ], [
            'tanggal_izin.required' => 'Tanggal izin wajib diisi!',
            'jam_mulai.required' => 'Jam masuk wajib diisi!',
            'jam_akhir.required' => 'Jam keluar wajib diisi!',
            'keterangan_izin.required' => 'Keterangan izin wajib diisi!',
            'keperluanIzin.required' => 'Keperluan izin wajib diisi!',
        ]);
        // dd($this->all());
        if($this->keperluanIzin == 'Tugas Meninggalkan Kantor' || $this->keperluanIzin == 'Izin Meninggalkan Kantor') {
            $jamKeluar = $this->jam_akhir;
            $jamMasuk = $this->jam_mulai;
        } elseif($this->keperluanIzin == 'Izin Datang Terlambat' ) {
            $jamKeluar = $this->jam_mulai;
            $jamMasuk = '08:00:00';
        } else {
            $jamKeluar = '17:00:00';
            $jamMasuk = '08:00:00';
        }

        if(Auth::user()->role_id == 2) {
            SuratIzin::where('id', $this->id_surat_izin)->update([
                'tanggal_izin' => $this->tanggal_izin,
                'jam_mulai' => $jamMasuk,
                'jam_akhir' => $jamKeluar,
                'keterangan_izin' => $this->keterangan_izin,
                'keperluan_izin' => $this->keperluanIzin,
            ]);
        } elseif(Auth::user()->role_id == 3) {
            SuratIzin::where('id', $this->id_surat_izin)->update([
                'tanggal_izin' => $this->tanggal_izin,
                'jam_mulai' => $jamMasuk,
                'jam_akhir' => $jamKeluar,
                'keterangan_izin' => $this->keterangan_izin,
                'keperluan_izin' => $this->keperluanIzin,
                
            ]);
        }
        

        toast('Berhasil disimpan.','success');
        return redirect('surat-izin');
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

    public function closeSuratIzin() {
        $this->tanggal_izin = '';
        $this->keperluanIzin = '';
        $this->jam_akhir = '';
        $this->jam_mulai = '';
        $this->keterangan_izin = '';
    }


    #[Layout('layouts.app')] 
    public function render()
    { 
        
        return view('livewire.user.surat-izin-components', [
            'suratIzin' => SuratIzin::where('username_user', Auth::user()->username)
                            ->where('keperluan_izin', 'like', '%'.$this->search.'%')
                            ->orWhere('username_user', Auth::user()->username)
                            ->where('keterangan_izin', 'like', '%'.$this->search.'%')
                            ->orderBy($this->sortField, $this->sortDirection)
                            ->paginate($this->perPage),
            'total' => SuratIzin::where('username_user', Auth::user()->username)->count(),
        ]);
    }

    public function updatingSearch() {
        $this->resetPage();
    }

    public function updatingPerPage() {
        $this->resetPage();
    }
}
