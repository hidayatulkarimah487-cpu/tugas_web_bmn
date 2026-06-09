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

    // CRUD Aset BMN
    Route::resource(
        'aset-bmn',
        AsetBmnController::class
    );

    // CRUD Master Ruangan
    Route::resource(
        'ruangan',
        RuanganController::class
    );

    // Profile Breeze
    Route::get(
        '/profile',
        [ProfileController::class, 'edit']
    )->name('profile.edit');

    Route::patch(
        '/profile',
        [ProfileController::class, 'update']
    )->name('profile.update');

    Route::delete(
        '/profile',
        [ProfileController::class, 'destroy']
    )->name('profile.destroy');

});

require __DIR__.'/auth.php';