<?php

use App\Http\Controllers\AuthController;
use App\Livewire\Atasan\DaftarSuratCuti;
use App\Livewire\Atasan\DaftarSuratIzin;
use App\Livewire\Atasan\DaftarSuratLembur;
use App\Livewire\Auth\Login;
use App\Livewire\Auth\Register;
use App\Livewire\User\IzinCutiComponent;
use App\Livewire\User\IzinLemburComponents;
use App\Livewire\User\SuratIzinComponents;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->middleware('auth');

Route::get('login', Login::class)->name('login');
Route::get('register', Register::class)->name('register');

Route::middleware(['auth'])->group(function () {
    Route::get('logout', [AuthController::class, 'logout']);
    
    Route::middleware(['userAtasan'])->group(function () {
        Route::get('surat-izin', SuratIzinComponents::class);
        Route::get('izin-cuti', IzinCutiComponent::class);
        Route::get('izin-lembur', IzinLemburComponents::class);    
    });

    Route::middleware(['atasanHRD'])->group(function () {
        Route::get('daftar-surat-izin', DaftarSuratIzin::class);
        Route::get('daftar-cuti', DaftarSuratCuti::class);
        Route::get('daftar-lembur', DaftarSuratLembur::class);
    });
});

