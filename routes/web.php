<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return view('frontend.home');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';


Route::get('/admin/dashboard', function () {
    return view('admin.dashboard');
})->middleware(['auth:admin', 'verified'])->name('admin.dashboard');

require __DIR__.'/adminauth.php';

Route::middleware('auth:admin')->group(function () {
    Route::get('/category/all', [CategoryController::class, 'index'])->name('category.all');
    Route::get('/category/store', [CategoryController::class, 'store'])->name('category.store');

    // Route::patch('/profile', [CategoryController::class, 'update'])->name('profile.update');
    // Route::delete('/profile', [CategoryController::class, 'destroy'])->name('profile.destroy');
});

