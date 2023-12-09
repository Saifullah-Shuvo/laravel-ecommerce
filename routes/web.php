<?php

use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\CouponController;
use App\Http\Controllers\Admin\FaqController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\SlierController;
use App\Http\Controllers\Admin\TestimonialController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Frontend\CommentController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\MessageController;
use App\Http\Controllers\Frontend\SubscriberController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Frontend\ReviewController;
use App\Http\Controllers\Frontend\WishlistController;
use Illuminate\Support\Facades\Route;

        // Frontend Routes

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about', [HomeController::class, 'about'])->name('home.about');

Route::get('/shop', [HomeController::class, 'shop'])->name('home.shop');
Route::get('/shop/{category_id}', [HomeController::class, 'categoryProduct'])->name('home.shop.category');

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
});

Route::group(['middleware' => 'auth'], function () {
    Route::get('/wishlist/all', [WishlistController::class, 'index'])->name('wishlist.index');
    Route::get('/wishlist/add/{id}', [WishlistController::class, 'add'])->name('wishlist.add');
    Route::get('/wishlist/remove/{id}', [WishlistController::class, 'removeItem'])->name('wishlist.remove');
    // Route::patch('/cart/update/{cart}', [CartController::class, 'update'])->name('cart.update');
});

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

    //slider crud
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

Route::middleware('auth:admin')->group(function () {

    //blog crud
    Route::get('/blog/all', [BlogController::class, 'index'])->name('blog.all');
    Route::get('/blog/add', [BlogController::class, 'add'])->name('blog.add');
    Route::post('/blog/store', [BlogController::class, 'store'])->name('blog.store');

    Route::get('/blog/edit/{id}', [BlogController::class, 'edit'])->name('blog.edit');
    Route::post('/blog/update/{id}', [BlogController::class, 'update'])->name('blog.update');
    Route::get('/blog/delete/{id}', [BlogController::class, 'destroy'])->name('blog.delete');

    //blog status
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

    //faq status
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

    // testimonial status
    Route::get('/system/testimonial/enable/{id}',[testimonialController::class, 'status_enable'])->name('testimonial.status.enable');
    Route::get('/system/testimonial/disable/{id}',[testimonialController::class, 'status_disable'])->name('testimonial.status.disable');
});

Route::middleware('auth:admin')->group(function(){
    Route::get('system/coupon/all',[CouponController::class,'index'])->name('coupon.all');
    Route::get('system/coupon/add', [CouponController::class, 'add'])->name('coupon.add');
    Route::post('system/coupon/store',[CouponController::class,'store'])->name('coupon.store');

    Route::get('system/coupon/edit/{id}', [CouponController::class, 'edit'])->name('coupon.edit');
    Route::post('system/coupon/update/{id}', [CouponController::class, 'update'])->name('coupon.update');
    Route::get('system/coupon/delete/{id}', [CouponController::class, 'destroy'])->name('coupon.delete');

    // coupon status
    Route::get('/system/coupon/enable/{id}',[CouponController::class, 'status_enable'])->name('coupon.status.enable');
    Route::get('/system/coupon/disable/{id}',[CouponController::class, 'status_disable'])->name('coupon.status.disable');

});
