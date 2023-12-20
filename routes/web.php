<?php

use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Frontend\CommentController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\MessageController;
use App\Http\Controllers\Frontend\SubscriberController;
use App\Http\Controllers\Frontend\ReviewController;
use App\Http\Controllers\Frontend\WishlistController;
use Illuminate\Support\Facades\Route;

        // Frontend Routes

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about', [HomeController::class, 'about'])->name('home.about');

Route::get('/shop', [HomeController::class, 'shop'])->name('home.shop');
Route::get('/shop/{category_id}', [HomeController::class, 'categoryProduct'])->name('home.shop.category');
Route::get('/hot/deals', [HomeController::class, 'hotDeals'])->name('hot.deals');

Route::get('/product/details/{id}', [HomeController::class, 'productDetails'])->name('home.product.details');
Route::get('/product/details/modal/{id}', [HomeController::class, 'productDetailsModal'])->name('home.product.details.modal');
Route::post('/product/reviews', [ReviewController::class, 'store'])->name('home.product.review');

Route::get('/blog', [HomeController::class, 'blog'])->name('home.blog');
Route::get('/blog/details/{id}', [HomeController::class, 'blogDetails'])->name('home.blog.details');
Route::get('/blog/category/{id}', [HomeController::class, 'blogCategory'])->name('home.blog.category');

Route::post('/blog/comments', [CommentController::class, 'store'])->name('home.blog.comment');

Route::get('/contact', [HomeController::class, 'contact'])->name('home.contact');
Route::post('/contact/message', [MessageController::class, 'message'])->name('home.contact.message');

Route::post('/newsletter', [SubscriberController::class, 'store'])->name('home.newsletter');

Route::group(['middleware' => 'auth'], function () {
    Route::get('/cart/all', [CartController::class, 'index'])->name('cart.index');
    Route::get('/cart/add-to-cart/{id}', [CartController::class, 'add'])->name('cart.add');
    Route::get('/cart/remove/{id}', [CartController::class, 'removeItem'])->name('cart.remove');
    // Route::patch('/cart/update/{cart}', [CartController::class, 'update'])->name('cart.update');
    Route::post('/apply-coupon', [CartController::class,'applyCoupon'])->name('apply.coupon');
    Route::get('/checkout', [CartController::class, 'showCheckout'])->name('show.checkout');
    Route::post('/order/place', [CartController::class, 'orderPlace'])->name('order.place');
});

Route::group(['middleware' => 'auth'], function () {
    Route::get('/wishlist/all', [WishlistController::class, 'index'])->name('wishlist.index');
    Route::get('/wishlist/add/{id}', [WishlistController::class, 'add'])->name('wishlist.add');
    Route::get('/wishlist/remove/{id}', [WishlistController::class, 'removeItem'])->name('wishlist.remove');
    // Route::patch('/cart/update/{cart}', [CartController::class, 'update'])->name('cart.update');
});





require __DIR__.'/auth.php';
require __DIR__.'/user.php';
require __DIR__.'/admin.php';

