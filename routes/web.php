<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;
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

    //category crud
    Route::get('/category/all', [CategoryController::class, 'index'])->name('category.all');
    Route::post('/category/store', [CategoryController::class, 'store'])->name('category.store');
    Route::get('/category/delete/{id}', [CategoryController::class, 'destroy'])->name('category.delete');

    Route::get('/category/edit/{id}', [CategoryController::class, 'edit'])->name('category.edit');
    Route::post('/category/update', [CategoryController::class, 'update'])->name('category.update');

    //category status
    Route::get('/category/status/enable/{id}',[CategoryController::class, 'status_enable'])->name('category.status.enable');
    Route::get('/category/status/disable/{id}',[CategoryController::class, 'status_disable'])->name('category.status.disable');

    //category feature
    Route::get('/category/feature/enable/{id}',[CategoryController::class, 'feature_enable'])->name('category.feature.enable');
    Route::get('/category/feature/disable/{id}',[CategoryController::class, 'feature_disable'])->name('category.feature.disable');

});

Route::middleware('auth:admin')->group(function () {

    //product crud
    Route::get('/product/all', [ProductController::class, 'index'])->name('product.all');
    Route::get('/product/add', [ProductController::class, 'add'])->name('product.add');
    Route::post('/product/store', [ProductController::class, 'store'])->name('product.store');
    
    Route::get('/product/edit/{id}', [ProductController::class, 'edit'])->name('product.edit');
    Route::post('/product/update/{id}', [ProductController::class, 'update'])->name('product.update');
    Route::get('/product/delete/{id}', [ProductController::class, 'destroy'])->name('product.delete');

    Route::get('/product/hotdeal', [ProductController::class, 'hotDeals'])->name('product.hotdeal');
    Route::get('/product/featured',[ProductController::class, 'featured'])->name('product.featured');
    Route::get('/product/popular',[ProductController::class, 'popular'])->name('product.popular');

});

