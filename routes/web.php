<?php

use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;
use App\Models\siswa;
use App\Models\guru;
use App\Models\pkl;
use App\Models\industri;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::view('/siswa', 'siswa', ['siswa' => Siswa::all()])->name('siswa');
Route::view('/guru', 'guru', ['guru' => Guru::all()])->name('guru');
Route::view('/pkl', 'pkl', ['pkl' => Pkl::all()])->name('pkl');
Route::view('/industri', 'industri', ['industri' => Industri::all()])->name('industri');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Volt::route('settings/profile', 'settings.profile')->name('settings.profile');
    Volt::route('settings/password', 'settings.password')->name('settings.password');
    Volt::route('settings/appearance', 'settings.appearance')->name('settings.appearance');
});

require __DIR__.'/auth.php';
