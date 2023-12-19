<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Frontend\Order;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function allOders(){
        $user = Auth::user();
        $orders = Order::where('user_id', $user->id)->latest()->get();
        return view('users.orders.index',compact('orders'));
    }
}
