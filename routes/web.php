<?php

use App\Http\Controllers\Auth\LoginController;
use App\Livewire\Siswa\Dashboard as SiswaDashboard;
use App\Livewire\Guru\Dashboard as GuruDashboard;
use App\Livewire\Pkl;
use App\Livewire\Settings\Appearance;
use App\Livewire\Settings\Password;
use App\Livewire\Settings\Profile;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');


Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');


    Route::middleware(['auth'])->group(function () {
        Route::middleware('role:super_admin|siswa')->group(function () {

            Route::get('/siswa/dashboard', SiswaDashboard::class)->name('siswa.dashboard'); 
        });
    
        Route::middleware('role:super_admin|guru')->group(function () {
            Route::get('/guru/dashboard', GuruDashboard::class)->name('guru.dashboard');
        });
    });

Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [LoginController::class, 'login']);
Route::post('logout', [LoginController::class, 'logout'])->name('logout');
Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Route::get('settings/profile', Profile::class)->name('settings.profile');
    Route::get('settings/password', Password::class)->name('settings.password');
    Route::get('settings/appearance', Appearance::class)->name('settings.appearance');
});

require __DIR__.'/auth.php';
