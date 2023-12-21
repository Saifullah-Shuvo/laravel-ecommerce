<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Frontend\Order;
use App\Http\Controllers\Controller;
use App\Models\Frontend\OrderDetails;

class OrderController extends Controller
{
    public function allOders(){
        $orderCount = Order::all();
        $orders = Order::latest()->paginate(10);
        return view('admin.orders.allOrders',compact('orders','orderCount'));
    }

    public function details($id){
        $orderDetails = Order::findOrFail($id);
        $productDetails = OrderDetails::where('order_id',$orderDetails->id)->latest()->get();
        return view('admin.orders.orderDetails',compact('orderDetails','productDetails'));
    }

    public function pending(){
        $pendingorderCount = Order::where('status',0)->get();
        $pendingorders = Order::where('status',0)->latest()->paginate(10);
        return view('admin.orders.pending',compact('pendingorders','pendingorderCount'));
    }

    public function confirmed(){
        $confirmedorderCount = Order::where('status',1)->get();
        $confirmedorders = Order::where('status',1)->latest()->paginate(10);
        return view('admin.orders.confirmed',compact('confirmedorders','confirmedorderCount'));
    }

    public function shipped(){
        $shippedorderCount = Order::where('status',2)->get();
        $shippedorders = Order::where('status',2)->latest()->paginate(10);
        return view('admin.orders.shipped',compact('shippedorders','shippedorderCount'));
    }

    public function delivered(){
        $deliveredorderCount = Order::where('status',3)->get();
        $deliveredorders = Order::where('status',3)->latest()->paginate(10);
        return view('admin.orders.delivered',compact('deliveredorders','deliveredorderCount'));
    }

    public function cancelled(){
        $cancelledorderCount = Order::where('status',4)->get();
        $cancelledorders = Order::where('status',4)->latest()->paginate(10);
        return view('admin.orders.cancelled',compact('cancelledorders','cancelledorderCount'));
    }
}
