<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\IndustriController;
use App\Http\Controllers\UsahaController;
use App\Http\Controllers\IKMController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Dashboard
Route::get('/', fn() => view('admin.beranda'));
Route::get('/beranda-admin', [AdminController::class, 'index'])->name('admin.beranda');


// =======================
// IKM
// =======================

// LIST
Route::get('/ikm', [IKMController::class, 'index'])->name('ikm.index');

// CREATE (RESET SESSION)
Route::get('/ikm/create', [IKMController::class, 'create'])
    ->name('ikm.create');

// EDIT + UPDATE + DELETE
Route::get('/ikm/{id}/edit', [IKMController::class, 'edit'])->name('ikm.edit');
Route::put('/ikm/{id}', [IKMController::class, 'update'])->name('ikm.update');
Route::delete('/ikm/{id}', [IKMController::class, 'destroy'])->name('ikm.destroy');

// SHOW (PALING BAWAH)
Route::get('/ikm/{id}', [IKMController::class, 'show'])->name('ikm.show');


// =======================
// MULTISTEP FORM
// =======================

// STEP 1 — PERSONAL
Route::get('/ikm/create/personal', [IKMController::class, 'formPersonal'])
    ->name('ikm.form.personal');
Route::post('/ikm/create/personal', [IKMController::class, 'storePersonal'])
    ->name('ikm.store.personal');

// STEP 2 — USAHA
Route::get('/ikm/create/usaha', [IKMController::class, 'formUsaha'])
    ->name('ikm.form.usaha');
Route::post('/ikm/create/usaha', [IKMController::class, 'storeUsaha'])
    ->name('ikm.store.usaha');

// STEP 3 — LEGALITAS
Route::get('/ikm/create/legalitas', [IKMController::class, 'formLegalitas'])
    ->name('ikm.form.legalitas');
Route::post('/ikm/create/legalitas', [IKMController::class, 'storeLegalitas'])
    ->name('ikm.store.legalitas');


// =======================
// INDUSTRI
// =======================

Route::get('/industri', [IndustriController::class, 'index'])->name('industri.index');
Route::get('/industri/create', [IndustriController::class, 'create'])->name('industri.create');
Route::post('/industri', [IndustriController::class, 'store'])->name('industri.store');
Route::get('/industri/{industri}/edit', [IndustriController::class, 'edit'])->name('industri.edit');
Route::put('/industri/{industri}', [IndustriController::class, 'update'])->name('industri.update');
Route::delete('/industri/{industri}', [IndustriController::class, 'destroy'])->name('industri.destroy');
Route::get('/cariin', [IndustriController::class, 'cariin'])->name('industri.cariin');


// =======================
// USAHA
// =======================

Route::get('/usaha', [UsahaController::class, 'index'])->name('usaha.index');
Route::get('/usaha/create', [UsahaController::class, 'create'])->name('usaha.create');
Route::post('/usaha', [UsahaController::class, 'store'])->name('usaha.store');
Route::delete('/usaha/{id}', [UsahaController::class, 'destroy'])->name('usaha.destroy');
Route::get('/usaha/{id}/edit', [UsahaController::class, 'edit'])->name('usaha.edit');
Route::put('/usaha/{id}', [UsahaController::class, 'update'])->name('usaha.update');
Route::get('/carius', [UsahaController::class, 'carius'])->name('usaha.carius');
