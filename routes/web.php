<?php

use App\Livewire\AdminDashboard;
use App\Livewire\Dashboard;
use App\Livewire\Profile;
use App\Livewire\TampilWisata;
use App\Livewire\Kota;
use App\Livewire\Kategori;
use App\Livewire\Wisata;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth', 'verified'])->group(function () {
    
    Route::get('/admin', AdminDashboard::class)->name('admin');
    Route::get('/create-kota', Kota::class)->name('createkota');
    Route::get('/create-kategori', Kategori::class)->name('createkategori');
    Route::get('/create-wisata', Wisata::class)->name('createwisata');

    Route::get('/', Dashboard::class)->name('dashboard');

    Route::get('/profile', Profile::class)->name('profile');

    Route::get('/wisata/{wisata_id}', TampilWisata::class)->name('tampilwisata');

});


require __DIR__.'/auth.php';
