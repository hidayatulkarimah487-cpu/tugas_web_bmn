<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AsetBmnController;

Route::get('/', function () {
    return redirect()->route('aset-bmn.index');
});

Route::resource('aset-bmn', AsetBmnController::class);