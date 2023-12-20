<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\User\OrderController;
use App\Http\Controllers\User\WishlistController as UserWishlistController;
use Illuminate\Support\Facades\Route;

// User Routes

Route::get('user/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

        // ____profile routes
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
        //_____orders routes
Route::middleware('auth')->group(function () {
    Route::get('/orders/all', [OrderController::class, 'allOders'])->name('order.all');
    Route::get('/orders/details/{id}', [OrderController::class, 'details'])->name('order.details');
});
        //_____wishlist routes
Route::group(['middleware' => 'auth'], function () {
    Route::get('/wishlist/user/all', [UserWishlistController::class, 'index'])->name('user.wishlist.index');
});
        //_____cart routes
Route::group(['middleware' => 'auth'], function () {
    Route::get('/cartlist/user/all', [UserWishlistController::class, 'cart'])->name('user.cartlist.index');
});