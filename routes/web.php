<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PasivoScanController;
use App\Http\Controllers\ActivosScanController;
//base
use App\Http\Controllers\BaseController;


// Route::get('/index', [BaseController::class, 'index'])->middleware(['auth', 'verified'])->name('index');


Route::post('/index', [PasivoScanController::class, 'scanWebsite'])->middleware(['auth', 'verified'])->name('index');


Route::get('/activo', [ActivosScanController::class, 'index'])->middleware(['auth', 'verified'])->name('activo.index');
Route::post('/activo', [ActivosScanController::class, 'scanWebsite'])->middleware(['auth', 'verified'])->name('activo.scanWebsite');

Route::get('/pasivo', [PasivoScanController::class, 'index'])->middleware(['auth', 'verified'])->name('pasivo.index');
Route::post('/pasivo', [PasivoScanController::class, 'scanWebsite'])->middleware(['auth', 'verified'])->name('pasivo.scanWebsite');



Route::get('/', [BaseController::class, 'welcome']);


Route::get('/index', [BaseController::class, 'index'])->middleware(['auth', 'verified'])->name('index');
Route::get('/index/{id}', [BaseController::class, 'show'])->middleware(['auth', 'verified'])->name('index.show');
//por pos

Route::post('/escaneo/enviar', [BaseController::class, 'enviar'])->name('escaneo.enviar');
//necestio ir a escaneos y traerme los resultados


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
