<?php

use App\Http\Controllers\KategoriController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/user', [UserController::class, 'index'])->name('user.index');
Route::get('/user/create', [UserController::class, 'create'])->name('user.create');
Route::get('/user/edit/{id}', [UserController::class, 'edit'])->name('user.edit');
Route::post('/user/store', [UserController::class, 'store'])->name('user.store');
Route::put('/user/update/{id}', [UserController::class, 'update'])->name('user.update');
Route::get('/user/destroy/{id}', [UserController::class, 'destroy'])->name('user.destroy');

Route::get('/kategori', [KategoriController::class, 'index'])->name('kategori.index');
Route::get('/katagori/create', [KategoriController::class, 'create'])->name('katagori.create');
Route::get('/katagori/edit/{id}', [KategoriController::class, 'edit'])->name('katagori.edit');
Route::post('/katagori/store', [KategoriController::class, 'store'])->name('katagori.store');
Route::put('/katagori/update/{id}', [KategoriController::class, 'update'])->name('katagori.update');
Route::get('/katagori/destroy/{id}', [KategoriController::class, 'destroy'])->name('katagori.destroy');

require __DIR__.'/auth.php';
