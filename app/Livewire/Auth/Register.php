<?php

namespace App\Livewire\Auth;

use App\Models\DaftarDivisi;
use App\Models\DaftarPT;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Rule;
use Livewire\Component;
use RealRashid\SweetAlert\Facades\Alert;

class Register extends Component
{
    #[Rule('required|min:3|unique:users,username|string|alpha_dash')]
    public $username;

    #[Rule('required|min:3|string')]
    public $password;

    #[Rule('required|min:3|string')]
    public $nama;

    #[Rule('required|min:3|string')]
    public $nama_pt;

    #[Rule('required|string')]
    public $divisi;
    
    #[Rule('required|string', as: 'jenis kelamin')]
    public $jk;
    
    #[Rule('required|string')]
    public $status;

    public $title = 'Register';

    public function register() {
        $this->validate([
            'username'=> 'required|min:3|unique:users,username|string|alpha_dash',
            'password'=> 'required|min:3|string',
            'nama'=> 'required|min:3|string',
            'nama_pt'=> 'required|min:3|string',
            'divisi'=> 'required|string',
            'jk'=> 'required|string',
            'status'=> 'required',
        ]);

        if($this->status == 'tetap') {
            $sisaCuti = 6;
        } else {
            $sisaCuti = null;
        }

        // dd($sisaCuti);
        User::create([
            'username' => $this->username,
            'password' => Hash::make($this->password),
            'name' => $this->nama,
            'nama_pt' => $this->nama_pt,
            'divisi' => $this->divisi,
            'jk' => $this->jk,
            'status' => $this->status,
            'sisa_cuti' => $sisaCuti,
        ]);

        Alert::toast('Data berhasil disimpan.','success');
        return redirect('login');
    }

    #[Layout('layouts.auth-layouts')] 
    public function render()
    {
        $data['title'] = $this->title;
        $data['daftarPT'] = DaftarPT::all();
        $data['daftarDivisi'] = DaftarDivisi::all();
        
        return view('livewire.auth.register', $data);
    }
}
