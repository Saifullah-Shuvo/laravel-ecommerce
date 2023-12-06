<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
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
        return view('frontend.sections.wishlist', compact('wishlistItems'));
    }

    public function add(Request $request, $id)
    {
        $wishlist = new Wishlist();
        // Get the authenticated user
        $user = Auth::user();

        // Check if the user is authenticated
        if (!$user) {
            $notification = [
                'message' => 'You must be logged in to add items to the wishlist.',
                'alert-type' => 'info',
            ];
            return redirect()->route('login')->with($notification);
        }

        // Check if the same product is already in the user's wishlist
        $existingwishlist = Wishlist::where('user_id', $user->id)
                            ->where('product_id', $request->id)
                            ->first();

        if ($existingwishlist) {

            $notification = [
                'message' => 'Product already in the wishlist!',
                'alert-type' => 'info',
            ];
            return redirect()->back()->with($notification);
        }

        // Create a new wishlist item
        $wishlist->user_id = $user->id;
        $wishlist->product_id = $request->id;
        $wishlist->save();

        $notification = [
            'message' => 'Product added to the wishlist successfully!',
            'alert-type' => 'success',
        ];

        return redirect()->back()->with($notification);
    }

    public function removeItem($id)
    {
        // Get the authenticated user
        $user = Auth::user();

        // Find the cart item by product ID and user ID
        $Item = Wishlist::where('product_id', $id)
                        ->where('user_id', $user->id)
                        ->first();

        // Check if the cart item exists
        if ($Item) {
            // Remove the cart item
            $Item->delete();

            $notification = [
                'message' => 'Product removed from the Wishlist successfully!',
                'alert-type' => 'success',
            ];

            return redirect()->back()->with($notification);
            // return response()->json(['message' => 'Item removed successfully']);
        }

    }

}
