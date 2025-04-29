<?php

use App\Livewire\Settings\Appearance;
use App\Livewire\Settings\Password;
use App\Livewire\Settings\Profile;
use App\Livewire\Books\BookCreate;
use App\Livewire\Books\BookUpdate;

use App\Livewire\Pinjam\PinjamTabel;
use App\Livewire\Pinjam\PinjamCreate;
use App\Livewire\Pinjam\PinjamShow;

use App\Livewire\Balik\BalikTabel;
use App\Livewire\Balik\BalikCreate; 

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::view('dashboard', 'dashboard')->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');
    Route::get('settings/profile', Profile::class)->name('settings.profile');
    Route::get('settings/password', Password::class)->name('settings.password');
    Route::get('settings/appearance', Appearance::class)->name('settings.appearance');
});

Route::middleware(['auth'])->prefix('book')->group(function () {
    Route::view('', 'book',['showTable' => true])->name('books.book-tabel');
    Route::get('/book-create', BookCreate::class)->name('books.book-create');
    Route::get('/book-edit/{id}', BookUpdate::class)->name('books.book-edit');
});

Route::middleware(['auth'])->prefix('peminjaman')->group(function () {
    Route::view('', 'peminjaman',['showTable' => true])->name('pinjam.peminjaman-tabel');
    Route::get('/peminjaman-create', PinjamCreate::class)->name('pinjam.peminjaman-create');
    // Route::get('/peminjaman-edit/{id}', BookUpdate::class)->name('pinjam.peminjaman-edit');
    Route::get('/peminjaman-show/{id}', PinjamShow::class)->name('pinjam.peminjaman-show');
});

Route::middleware(['auth'])->prefix('pengembalian')->group(function () {
    Route::view('', 'pengembalian',['showTable' => true])->name('balik.pengembalian-tabel');
    Route::get('/pengembalian-create', BalikCreate::class)->name('balik.pengembalian-create');
    // Route::get('/pengembalian-edit/{id}', BookUpdate::class)->name('balik.pengembalian-edit');
});

Route::middleware(['auth'])->prefix('penggunas')->group(function () {
    Route::view('', 'pengguna',['showTable' => true])->name('costumer.pengguna-tabel');
    // Route::get('/pengembalian-edit/{id}', BookUpdate::class)->name('balik.pengembalian-edit');
});

require __DIR__.'/auth.php';
