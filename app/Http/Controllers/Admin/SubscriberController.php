<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Frontend\Subscriber;
use Illuminate\Http\Request;

class SubscriberController extends Controller
{
    public function index(){
        $subscribers = Subscriber::latest()->get();
        return view('admin.subscribers.index',compact('subscribers'));
    }

    public function destroy($id){
        $subscriber = Subscriber::findOrFail($id);
        $subscriber->delete();

        $notification = array('message' => "Subscriber Removed!", 'alert-type' => 'success');
        return redirect()->back()->with($notification);

    }
}
