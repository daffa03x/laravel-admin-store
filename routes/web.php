<?php

use App\Http\Controllers\GameController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VoucherController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    // Profile
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
    // User
    Route::get('/user', [UserController::class, 'index'])->name('user.index');
    Route::get('/user/create', [UserController::class, 'create'])->name('user.create');
    Route::get('/user/edit/{id}', [UserController::class, 'edit'])->name('user.edit');
    Route::post('/user/store', [UserController::class, 'store'])->name('user.store');
    Route::put('/user/update/{id}', [UserController::class, 'update'])->name('user.update');
    Route::get('/user/destroy/{id}', [UserController::class, 'destroy'])->name('user.destroy');

    // Kategori
    Route::get('/kategori', [KategoriController::class, 'index'])->name('kategori.index');
    Route::get('/kategori/create', [KategoriController::class, 'create'])->name('kategori.create');
    Route::get('/kategori/edit/{id}', [KategoriController::class, 'edit'])->name('kategori.edit');
    Route::post('/kategori/store', [KategoriController::class, 'store'])->name('kategori.store');
    Route::put('/kategori/update/{id}', [KategoriController::class, 'update'])->name('kategori.update');
    Route::get('/kategori/destroy/{id}', [KategoriController::class, 'destroy'])->name('kategori.destroy');

    // Item
    Route::get('/item', [ItemController::class, 'index'])->name('item.index');
    Route::get('/item/create', [ItemController::class, 'create'])->name('item.create');
    Route::post('/item/store', [ItemController::class, 'store'])->name('item.store');
    Route::get('/item/edit/{id}', [ItemController::class, 'edit'])->name('item.edit');
    Route::put('/item/update/{id}', [ItemController::class, 'update'])->name('item.update');
    Route::get('/item/destroy/{id}', [ItemController::class, 'destroy'])->name('item.destroy');

    // Game
    Route::get('/game', [GameController::class, 'index'])->name('game.index');
    Route::get('/game/create', [GameController::class, 'create'])->name('game.create');
    Route::post('/game/store', [GameController::class, 'store'])->name('game.store');
    Route::get('/game/edit/{id}', [GameController::class, 'edit'])->name('game.edit');
    Route::put('/game/update/{id}', [GameController::class, 'update'])->name('game.update');
    Route::get('/game/destroy/{id}', [GameController::class, 'destroy'])->name('game.destroy');

    // Voucher
    Route::get('/voucher', [VoucherController::class, 'index'])->name('voucher.index');
    Route::get('/voucher/create', [VoucherController::class, 'create'])->name('voucher.create');
    Route::post('/voucher/store', [VoucherController::class, 'store'])->name('voucher.store');
    Route::get('/voucher/edit/{id}', [VoucherController::class, 'edit'])->name('voucher.edit');
    Route::put('/voucher/update/{id}', [VoucherController::class, 'update'])->name('voucher.update');
    Route::get('/voucher/destroy/{id}', [VoucherController::class, 'destroy'])->name('voucher.destroy');
});


require __DIR__.'/auth.php';
