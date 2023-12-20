<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Models\Frontend\Cart;
use App\Models\Frontend\Wishlist;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{
    public function index()
    {
        // Get the authenticated user
        $user = Auth::user();
        // Get the cart items for the current user
        $wishlistItems = Wishlist::where('user_id', $user->id)->with('product')->latest()->get();
        // Pass the cart items to the cart view
        return view('users.wishlists.index', compact('wishlistItems'));
    }

    public function cart(){
        // Get the authenticated user
        $user = Auth::user();
        // Get the cart items for the current user
        $cartItems = Cart::where('user_id', $user->id)->with('product')->latest()->get();
        // Pass the cart items to the cart view
        return view('users.cartlists.index', compact('cartItems'));
    }

    
}
