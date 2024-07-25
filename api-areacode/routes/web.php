<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AreaCodeController;

Route::get('/areacode/{code?}', [AreaCodeController::class, 'getAreaCode'])->name('areacode.api');
Route::get('/{code?}', [AreaCodeController::class, 'show'])->name('welcome.show');
Route::get('/', function () {
    return view('welcome');
});

