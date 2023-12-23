<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\FaqController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\SlierController;
use App\Http\Controllers\Admin\CouponController;
use App\Http\Controllers\Admin\DetailsController;
use App\Http\Controllers\Admin\MessageController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\SubscriberController;
use App\Http\Controllers\Admin\TestimonialController;


    //______Admins Routes

Route::get('/admin/dashboard', function () {
    return view('admin.dashboard');
})->middleware(['auth:admin', 'verified'])->name('admin.dashboard');

require __DIR__.'/adminauth.php';

Route::middleware('auth:admin')->group(function(){
    //___all Users
    Route::get('/user/all',[UserController::class, 'allUsers'])->name('users.all');
    Route::get('/user/delete/{id}',[UserController::class, 'deleteUsers'])->name('users.delete');
});

//_____orders routes
Route::middleware('auth:admin')->group(function () {
    Route::get('/orders/admin/all', [OrderController::class, 'allOders'])->name('admin.order.all');
    Route::get('/orders/admin/details/{id}', [OrderController::class, 'details'])->name('admin.order.details');
    Route::get('/orders/admin/pending', [OrderController::class, 'pending'])->name('admin.order.pending');
    Route::get('/orders/admin/confirmed', [OrderController::class, 'confirmed'])->name('admin.order.confirmed');
    Route::get('/orders/admin/shipped', [OrderController::class, 'shipped'])->name('admin.order.shipped');
    Route::get('/orders/admin/delivered', [OrderController::class, 'delivered'])->name('admin.order.delivered');
    Route::get('/orders/admin/cancelled', [OrderController::class, 'cancelled'])->name('admin.order.cancelled');

    Route::get('/order/confirm/{id}',[OrderController::class, 'orderConfirm'])->name('order.confirm');
    Route::get('/order/ship/{id}',[OrderController::class, 'orderShip'])->name('order.ship');
    Route::get('/order/deliver/{id}',[OrderController::class, 'orderDeliver'])->name('order.deliver');
    Route::get('/order/cancel/{id}',[OrderController::class, 'orderCancel'])->name('order.cancel');
});

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

    // ______slider crud
    Route::get('/slider/all', [SlierController::class, 'index'])->name('slider.all');
    Route::get('/slider/add', [SlierController::class, 'add'])->name('slider.add');
    Route::post('/slider/store', [SlierController::class, 'store'])->name('slider.store');

    Route::get('/slider/edit/{id}', [SlierController::class, 'edit'])->name('slider.edit');
    Route::post('/slider/update/{id}', [SlierController::class, 'update'])->name('slider.update');
    Route::get('/slider/delete/{id}', [SlierController::class, 'destroy'])->name('slider.delete');

    // _____Slider status
    Route::get('/slider/status/enable/{id}',[SlierController::class, 'status_enable'])->name('slider.status.enable');
    Route::get('/slider/status/disable/{id}',[SlierController::class, 'status_disable'])->name('slider.status.disable');
});

Route::middleware('auth:admin')->group(function () {

    // _____blog crud
    Route::get('/blog/all', [BlogController::class, 'index'])->name('blog.all');
    Route::get('/blog/add', [BlogController::class, 'add'])->name('blog.add');
    Route::post('/blog/store', [BlogController::class, 'store'])->name('blog.store');

    Route::get('/blog/edit/{id}', [BlogController::class, 'edit'])->name('blog.edit');
    Route::post('/blog/update/{id}', [BlogController::class, 'update'])->name('blog.update');
    Route::get('/blog/delete/{id}', [BlogController::class, 'destroy'])->name('blog.delete');

    // _____blog status
    Route::get('/blog/status/enable/{id}',[BlogController::class, 'status_enable'])->name('blog.status.enable');
    Route::get('/blog/status/disable/{id}',[BlogController::class, 'status_disable'])->name('blog.status.disable');
});

Route::middleware('auth:admin')->group(function(){
    Route::get('system/faq/all',[FaqController::class,'index'])->name('faq.all');
    Route::get('system/faq/add', [FaqController::class, 'add'])->name('faq.add');
    Route::post('system/faq/store',[FaqController::class,'store'])->name('faq.store');

    Route::get('system/faq/edit/{id}', [FaqController::class, 'edit'])->name('faq.edit');
    Route::post('system/faq/update/{id}', [FaqController::class, 'update'])->name('faq.update');
    Route::get('system/faq/delete/{id}', [FaqController::class, 'destroy'])->name('faq.delete');

    // _____faq status
    Route::get('/system/faq/enable/{id}',[FaqController::class, 'status_enable'])->name('faq.status.enable');
    Route::get('/system/faq/disable/{id}',[FaqController::class, 'status_disable'])->name('faq.status.disable');
});

Route::middleware('auth:admin')->group(function(){
    Route::get('system/testimonial/all',[TestimonialController::class,'index'])->name('testimonial.all');
    Route::get('system/testimonial/add', [TestimonialController::class, 'add'])->name('testimonial.add');
    Route::post('system/testimonial/store',[testimonialController::class,'store'])->name('testimonial.store');

    Route::get('system/testimonial/edit/{id}', [testimonialController::class, 'edit'])->name('testimonial.edit');
    Route::post('system/testimonial/update/{id}', [testimonialController::class, 'update'])->name('testimonial.update');
    Route::get('system/testimonial/delete/{id}', [testimonialController::class, 'destroy'])->name('testimonial.delete');

    // ____testimonial status
    Route::get('/system/testimonial/enable/{id}',[testimonialController::class, 'status_enable'])->name('testimonial.status.enable');
    Route::get('/system/testimonial/disable/{id}',[testimonialController::class, 'status_disable'])->name('testimonial.status.disable');

    // ___details
    Route::get('system/details/all',[DetailsController::class,'index'])->name('details.all');
    Route::post('system/details/update/{id}',[DetailsController::class,'update'])->name('details.update');
});
    //_____coupons
Route::middleware('auth:admin')->group(function(){
    Route::get('coupon/all',[CouponController::class,'index'])->name('coupon.all');
    Route::get('coupon/add', [CouponController::class, 'add'])->name('coupon.add');
    Route::post('coupon/store',[CouponController::class,'store'])->name('coupon.store');

    Route::get('coupon/edit/{id}', [CouponController::class, 'edit'])->name('coupon.edit');
    Route::post('coupon/update/{id}', [CouponController::class, 'update'])->name('coupon.update');
    Route::get('coupon/delete/{id}', [CouponController::class, 'destroy'])->name('coupon.delete');

    // _____coupon status
    Route::get('coupon/enable/{id}',[CouponController::class, 'status_enable'])->name('coupon.status.enable');
    Route::get('coupon/disable/{id}',[CouponController::class, 'status_disable'])->name('coupon.status.disable');
});
    // ____Subscribers
Route::middleware('auth:admin')->group(function(){
    Route::get('subscriber/all',[SubscriberController::class,'index'])->name('subscriber.all');
    Route::get('subscriber/delete/{id}', [SubscriberController::class, 'destroy'])->name('subscriber.delete');
});

    // ____Messages
Route::middleware('auth:admin')->group(function(){
    Route::get('message/all',[MessageController::class,'index'])->name('message.all');
    Route::get('message/show/{id}', [MessageController::class, 'show'])->name('message.show');
    Route::get('message/delete/{id}', [MessageController::class, 'destroy'])->name('message.delete');
});
