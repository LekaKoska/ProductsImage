<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/', [HomeController::class, "product"])->name('home');

Route::view('/product', 'product');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');
Route::post('/product/add', [ProductController::class, "create"])->name('products.add');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::post('/profile/change-avatar', [ProfileController::class, 'changeAvatar'])->name('profile.change_avatar');
});
Route::get('/product/flush', [ProductController::class, 'flush']);

require __DIR__.'/auth.php';
Route::get('/product/{id}', [ProductController::class, "permalink"])->name('products.permalink');

