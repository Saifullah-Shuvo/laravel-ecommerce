<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\SlierController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

        // Frontend Routes

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about', [HomeController::class, 'about'])->name('home.about');

Route::get('/shop', [HomeController::class, 'shop'])->name('home.shop');
Route::get('/shop/{category_id}', [HomeController::class, 'categoryProduct'])->name('home.shop.category');

Route::get('/product/details/{id}', [HomeController::class, 'productDetails'])->name('home.product.details');

Route::get('/blog', [HomeController::class, 'blog'])->name('home.blog');
Route::get('/contact', [HomeController::class, 'contact'])->name('home.contact');


        // User Routes

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

        // Admins Routes

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

Route::middleware('auth:admin')->group(function () {

    Route::get('/slider/all', [SlierController::class, 'index'])->name('slider.all');
    Route::get('/slider/add', [SlierController::class, 'add'])->name('slider.add');
    Route::post('/slider/store', [SlierController::class, 'store'])->name('slider.store');

    Route::get('/slider/edit/{id}', [SlierController::class, 'edit'])->name('slider.edit');
    Route::post('/slider/update/{id}', [SlierController::class, 'update'])->name('slider.update');
    Route::get('/slider/delete/{id}', [SlierController::class, 'destroy'])->name('slider.delete');

    //Slider status
    Route::get('/slider/status/enable/{id}',[SlierController::class, 'status_enable'])->name('slider.status.enable');
    Route::get('/slider/status/disable/{id}',[SlierController::class, 'status_disable'])->name('slider.status.disable');
});
