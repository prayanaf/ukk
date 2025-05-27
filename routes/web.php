<?php

use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;


Route::get('/', function () {
    // dd(auth()->user->roles);
    return view('welcome');
})->name('home');

// Route::view('/siswa', 'siswa', ['siswa' => Siswa::all()])->name('siswa');
// Route::view('/guru', 'guru', ['guru' => Guru::all()])->name('guru');
// Route::view('/pkl', 'pkl', ['pkl' => Pkl::all()])->name('pkl');
// Route::view('/industri', 'industri', ['industri' => Industri::all()])->name('industri');

// Route::view('dashboard', 'dashboard')
//     ->middleware(['auth', 'verified'])
//     ->name('dashboard');

// Route::view('industri', 'industri')
//     ->middleware(['auth', 'verified'])
//     ->name('industri');

//membuat ujicoba dengan role siswa dapat akses fe
Route::get('/siswa', function () {
    return "Siswa";
})->middleware(['auth', 'verified','role:Siswa','cek_user'])
 ->name('siswa');

//membuat peraturan role siswa dapat akses fe
Route::middleware(['auth', 'verified', 'role:Siswa','cek_user'])->group(function () {
    Route::view('dashboard', 'dashboard')->name('dashboard');
    Route::view('industri', 'industri')->name('industri');
});


Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Volt::route('settings/profile', 'settings.profile')->name('settings.profile');
    Volt::route('settings/password', 'settings.password')->name('settings.password');
    Volt::route('settings/appearance', 'settings.appearance')->name('settings.appearance');
});

require __DIR__.'/auth.php';
