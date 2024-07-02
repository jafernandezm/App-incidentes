<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PasivoScanController;
use App\Http\Controllers\ActivosScanController;


Route::get('/index', [PasivoScanController::class, 'index'])->middleware(['auth', 'verified'])->name('index');

Route::post('/index', [PasivoScanController::class, 'scanWebsite'])->middleware(['auth', 'verified'])->name('index');

Route::get('/activo', [ActivosScanController::class, 'index'])->middleware(['auth', 'verified'])->name('activo');
Route::post('/activo', [ActivosScanController::class, 'scanWebsite'])->middleware(['auth', 'verified'])->name('activo');


Route::get('/', function () {
    return view('welcome');
});

Route::get('/index', function () {
    return view('index');
})->middleware(['auth', 'verified'])->name('index');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
