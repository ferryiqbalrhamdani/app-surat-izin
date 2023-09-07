<?php

namespace App\Livewire\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Rule;
use Livewire\Component;
use RealRashid\SweetAlert\Facades\Alert;

class Login extends Component
{
    #[Rule('required|min:3')]
    public $username;

    #[Rule('required|min:3')]
    public $password;

    public $title = 'Login';


    public function loginAction(Request $request) {
        $credentials = $this->validate([
            'username' => 'required|min:3',
            'password' => 'required|min:3'
        ]);

        if(Auth::attempt($credentials)){
            if (Auth::user()->role_id == 1) {
                Alert::toast('Selamat Datang '.Auth::user()->name, 'success');
                return redirect('dashboard');
            }

            $request->session()->regenerate();

            if (Auth::user()->role_id == 2) {
                Alert::toast('Selamat Datang '.Auth::user()->name, 'success');
                return redirect('surat-izin');
            }

            $request->session()->regenerate();

            if(Auth::user()->role_id == 3) {
                Alert::toast('Selamat Datang '.Auth::user()->name, 'success');
                return redirect('daftar-surat-izin');
            }

            $request->session()->regenerate();

            if(Auth::user()->role_id == 4) {
                Alert::toast('Selamat Datang '.Auth::user()->name, 'success');
                return redirect('daftar-surat-izin');
            }
        }

        Alert::error('Gagal login', 'Username atau password salah.');
        return redirect('/login');
    }

    #[Layout('layouts.auth-layouts')] 
    public function render()
    {
        $data['title'] = $this->title;
        return view('livewire.auth.login', $data);
    }
}
