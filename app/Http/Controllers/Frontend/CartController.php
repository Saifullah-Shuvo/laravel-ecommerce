<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Frontend\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function add(Request $request)
    {
        $request->validate([
            'quantity' => 'required|numeric|min:1',
            'product_id' => 'required|numeric',
        ]);

        $cart = new Cart();
        // Get the authenticated user
        $user = Auth::user();

        // Check if the same product is already in the user's cart
        $existingCart = Cart::where('user_id', $user->id)
                            ->where('product_id', $request->product_id)
                            ->first();

        if ($existingCart) {
            // Uncomment this line if you want to update the quantity of the existing cart item
            // $existingCart->update(['quantity' => $existingCart->quantity + $request->quantity]);

            $notification = [
                'message' => 'Product already in the cart!',
                'alert-type' => 'warning',
            ];
            return redirect()->back()->with($notification);
        }

        // Create a new cart item
        $cart->user_id = $user->id;
        $cart->product_id = $request->product_id;
        $cart->quantity = $request->quantity;
        // dd($request->all());
        $cart->save();

        $notification = [
            'message' => 'Product added to the cart successfully!',
            'alert-type' => 'success',
        ];

        return redirect()->back()->with($notification);
    }

}
