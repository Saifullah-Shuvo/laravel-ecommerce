<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Admin\Coupon;
use App\Models\Frontend\Cart;
use App\Models\Frontend\Order;
use Carbon\Carbon;
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

    public function add(Request $request, $id)
    {
        $cart = new Cart();
        // Get the authenticated user
        $user = Auth::user();

        // Check if the user is authenticated
        if (!$user) {
            $notification = [
                'message' => 'You must be logged in to add items to the cart.',
                'alert-type' => 'info',
            ];
            return redirect()->route('login')->with($notification);
        }

        // Check if the same product is already in the user's cart
        $existingCart = Cart::where('user_id', $user->id)
                            ->where('product_id', $request->id)
                            ->first();

        if ($existingCart) {
            if($request->quantity){
                $existingCart->update(['quantity' => $existingCart->quantity + $request->quantity]);
            }
            $notification = [
                'message' => 'Product already in the cart!',
                'alert-type' => 'info',
            ];
            return redirect()->back()->with($notification);
        }

        // Create a new cart item
        $cart->user_id = $user->id;
        $cart->product_id = $request->id;
        if($request->quantity){
            $cart->quantity = $request->quantity;
        }
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
        //coupon apply
        public function applyCoupon(Request $request)
        {
            $request->validate([
                'coupon_code' => 'required|string',
                'totalSum' => 'required|numeric',
            ]);

            $totalSum = $request->input('totalSum');
            $coupon = Coupon::where('status', 1)->where('code', $request->coupon_code)->first();

            if ($coupon) {
                $expiryDate = Carbon::parse($coupon->expiry_date);
                $currentDate = Carbon::now();

                if ($currentDate->lte($expiryDate)) {
                    $discountAmount = 0;

                    if ($coupon->discount_type === 'percentage') {
                        // Calculate discount based on percentage
                        $discountAmount = $totalSum * ($coupon->discount_value / 100);
                    } elseif ($coupon->discount_type === 'fixed') {
                        // Use fixed discount value
                        $discountAmount = $coupon->discount_value;
                    }

                    // Store the applied coupon and discount amount in the session
                    session(['applied_coupon' => $coupon, 'discount_amount' => $discountAmount ]);
                    // session()->forget('applied_coupon');

                    $notification = ['message' => 'Coupon Applied Successfully!', 'alert-type' => 'success'];
                    return redirect()->back()->with($notification);
                } else {
                    $notification = ['message' => 'Coupon has expired!', 'alert-type' => 'error'];
                    return redirect()->back()->with($notification);
                }
            } else {
                $notification = ['message' => 'Invalid Coupon Code!', 'alert-type' => 'error'];
                return redirect()->back()->with($notification);
            }
        }

        // public function showCheckout()
        // {
        //     // Retrieve applied coupon and discount amount from the session
        //     $appliedCoupon = session('applied_coupon');
        //     $discountAmount = session('discount_amount');

        //     session()->put('applied_coupon', 'appliedCoupon');
        //     session()->put('discount_amount', 'discountAmount');
        //     session()->put('subtotal', 'subtotal');
        //     session()->put('totalPrice', 'totalPrice');

        //     $user = Auth::user();
        //     $cartItems = Cart::where('user_id', $user->id)->with('product')->latest()->get();

        //     $subtotal = 0;
        //     foreach ($cartItems as $item) {
        //         $subtotal += $item->quantity * $item->product->selling_price;
        //     }

        //     $totalPrice = $subtotal - $discountAmount;
        //     // dd($totalPrice);

        //     // return view('checkout', compact('appliedCoupon', 'discountAmount', 'productData', 'subtotal', 'totalPrice'));
        //     return view('frontend.sections.checkout',compact('appliedCoupon','discountAmount','cartItems',
        //                     'subtotal','totalPrice'));
        // }

        // public function orderPlace(Request $request){

        //     $orders = new Order();
        //     $user = Auth::user();

        //     $appliedCoupon = session()->get('applied_coupon');
        //     $discountAmount = session()->get('discount_amount');
        //     $subtotal = session()->get('subtotal');
        //     $totalPrice = session()->get('totalPrice');

        //     $orders->user_id = $user->id;
        //     $orders->first_name = $request->first_name;
        //     $orders->last_name = $request->last_name;
        //     $orders->email = $request->email;
        //     $orders->phone_number = $request->phone_number;
        //     $orders->country = $request->country;
        //     $orders->address = $request->address;
        //     $orders->zip_code = $request->zip_code;
        //     $orders->city = $request->city;
        //     $orders->order_notes = $request->order_notes;
        //     $orders->payment_type = $request->payment_type;
        //     $orders->status = 0;
        //     $orders->order_id = rand(10000,90000);

        //     $orders->subtotal = $subtotal;
        //     $orders->coupon_code = $appliedCoupon;
        //     $orders->discountAmount = $discountAmount;
        //     $orders->totalPrice = $totalPrice;

        //     $orders->order_date = date('d-m-Y');
        //     $orders->order_month = date('F');
        //     $orders->order_year = date('Y');

        //     dd($orders);

        // }

        public function showCheckout()
        {
            // Retrieve applied coupon and discount amount from the session
            $appliedCoupon = session('applied_coupon');
            $discountAmount = session('discount_amount');

            $user = Auth::user();
            $cartItems = Cart::where('user_id', $user->id)->with('product')->latest()->get();

            $subtotal = 0;
            foreach ($cartItems as $item) {
                $subtotal += $item->quantity * $item->product->selling_price;
            }

            $totalPrice = $subtotal - $discountAmount;

            // Store values in the session
            session()->put('applied_coupon', $appliedCoupon);
            session()->put('discount_amount', $discountAmount);
            session()->put('subtotal', $subtotal);
            session()->put('totalPrice', $totalPrice);

            return view('frontend.sections.checkout', compact('appliedCoupon', 'discountAmount', 'cartItems', 'subtotal', 'totalPrice'));
        }

        public function orderPlace(Request $request)
        {
            $orders = new Order();
            $user = Auth::user();

            $appliedCoupon = session()->get('applied_coupon');
            $discountAmount = session()->get('discount_amount');
            $subtotal = session()->get('subtotal');
            $totalPrice = session()->get('totalPrice');

            $orders->user_id = $user->id;
            $orders->first_name = $request->first_name;
            $orders->last_name = $request->last_name;
            $orders->email = $request->email;
            $orders->phone_number = $request->phone_number;
            $orders->country = $request->country;
            $orders->address = $request->address;
            $orders->zip_code = $request->zip_code;
            $orders->city = $request->city;
            $orders->order_notes = $request->order_notes;
            $orders->payment_type = $request->payment_type;
            $orders->status = 0;
            $orders->order_id = rand(10000, 90000);

            $orders->subtotal = $subtotal;
            $orders->coupon_code = $appliedCoupon;
            $orders->discountAmount = $discountAmount;
            $orders->totalPrice = $totalPrice;

            $orders->order_date = now()->format('d-m-Y');
            $orders->order_month = now()->format('F');
            $orders->order_year = now()->format('Y');

            dd($orders);

            $orders->save();

            // Clear session values after placing the order
            session()->forget(['applied_coupon', 'discount_amount', 'subtotal', 'totalPrice']);

            // Redirect or return response as needed
            return redirect()->back();
        }





}
