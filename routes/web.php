<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AsetBmnController;

Route::get('/', [AsetBmnController::class, 'index']);

Route::get('/create', [AsetBmnController::class, 'create'])
    ->name('aset_bmn.create');

Route::post('/store', [AsetBmnController::class, 'store'])
    ->name('aset_bmn.store');