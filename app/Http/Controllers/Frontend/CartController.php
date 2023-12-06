<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Frontend\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function index()
    {
        // Get the authenticated user
        $user = Auth::user();
        // Get the cart items for the current user
        $cartItems = Cart::where('user_id', $user->id)->with('product')->latest()->get();
        // Pass the cart items to the cart view
        return view('frontend.sections.shopping_cart', compact('cartItems'));
    }

    public function add(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'quantity' => 'required|numeric|min:1',
            'product_id' => 'required|numeric',
        ]);
        $cart = new Cart();
        // Get the authenticated user
        $user = Auth::user();

        // Check if the user is authenticated
        if (!$user) {
            $notification = [
                'message' => 'You must be logged in to add items to the cart.',
                'alert-type' => 'warning',
            ];
            return redirect()->route('login')->with($notification);
        }

        // Check if the same product is already in the user's cart
        $existingCart = Cart::where('user_id', $user->id)
                            ->where('product_id', $request->product_id)
                            ->first();

        if ($existingCart) {
            $existingCart->update(['quantity' => $existingCart->quantity + $request->quantity]);

            $notification = [
                'message' => 'Product already in the cart!',
                'alert-type' => 'info',
            ];
            return redirect()->back()->with($notification);
        }

        // Create a new cart item
        $cart->user_id = $user->id;
        $cart->product_id = $request->product_id;
        $cart->quantity = $request->quantity;
        $cart->save();

        $notification = [
            'message' => 'Product added to the cart successfully!',
            'alert-type' => 'success',
        ];

        return redirect()->back()->with($notification);
    }

    public function removeItem($id)
    {
        // Get the authenticated user
        $user = Auth::user();

        // Find the cart item by product ID and user ID
        $cartItem = Cart::where('product_id', $id)
                        ->where('user_id', $user->id)
                        ->first();

        // Check if the cart item exists
        if ($cartItem) {
            // Remove the cart item
            $cartItem->delete();

            $notification = [
                'message' => 'Product removed from the cart successfully!',
                'alert-type' => 'success',
            ];

            return redirect()->back()->with($notification);
            // return response()->json(['message' => 'Item removed successfully']);
        }

    }

}
