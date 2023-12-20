<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Frontend\Order;
use App\Models\Frontend\OrderDetails;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function allOders(){
        $user = Auth::user();
        $orders = Order::where('user_id', $user->id)->latest()->get();
        return view('users.orders.index',compact('orders'));
    }

    public function details($id){
        $orderDetails = Order::findOrFail($id);
        $productDetails = OrderDetails::where('order_id',$orderDetails->id)->latest()->get();
        return view('users.orders.details',compact('orderDetails','productDetails'));
    }
}
