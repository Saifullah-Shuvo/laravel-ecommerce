<?php

namespace App\Providers;

use App\Models\Frontend\Cart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Broadcast;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {

        // Get the authenticated user
        // $user = Auth::user();
        // Get the cart items for the current user
        // $cartItems = Cart::where('user_id', auth()->user()->id)->with('product')->latest()->get();
        
        // View::composer('*', function ($view) use($cartItems) {
        //     $view->with('cartItems', $cartItems);
        // });

    }
}
