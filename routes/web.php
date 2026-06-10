<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AsetBmnController;
use App\Http\Controllers\RuanganController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return redirect()->route('aset-bmn.index');
});

Route::middleware(['auth'])->group(function () {

    // Dashboard diarahkan ke halaman aset
    Route::get('/dashboard', function () {
        return redirect()->route('aset-bmn.index');
    })->name('dashboard');

    // Semua user login boleh lihat daftar aset
    Route::get('/aset-bmn', [AsetBmnController::class, 'index'])
        ->name('aset-bmn.index');

    // Khusus admin: tambah, simpan, edit, update, hapus aset
    Route::middleware(['role:admin'])->group(function () {

        Route::get('/aset-bmn/create', [AsetBmnController::class, 'create'])
            ->name('aset-bmn.create');

        Route::post('/aset-bmn', [AsetBmnController::class, 'store'])
            ->name('aset-bmn.store');

        Route::get('/aset-bmn/{aset_bmn}/edit', [AsetBmnController::class, 'edit'])
            ->name('aset-bmn.edit');

        Route::put('/aset-bmn/{aset_bmn}', [AsetBmnController::class, 'update'])
            ->name('aset-bmn.update');

        Route::delete('/aset-bmn/{aset_bmn}', [AsetBmnController::class, 'destroy'])
            ->name('aset-bmn.destroy');

        // Khusus admin: CRUD Master Ruangan
        Route::resource('ruangan', RuanganController::class);
    });

    // Semua user login boleh lihat detail aset
    // Ditaruh di bawah create/edit agar tidak bentrok
    Route::get('/aset-bmn/{aset_bmn}', [AsetBmnController::class, 'show'])
        ->name('aset-bmn.show');

    // Profile Breeze
    Route::get('/profile', [ProfileController::class, 'edit'])
        ->name('profile.edit');

    Route::patch('/profile', [ProfileController::class, 'update'])
        ->name('profile.update');

    Route::delete('/profile', [ProfileController::class, 'destroy'])
        ->name('profile.destroy');
});

require __DIR__.'/auth.php';