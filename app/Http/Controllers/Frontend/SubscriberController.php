<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Frontend\Subscriber;
use Illuminate\Http\Request;

class SubscriberController extends Controller
{
    public function store(Request $request){
        $request->validate([
            'subscriber' => 'required|email|unique:subscribers,email',
        ],
        [
            'subscriber.unique' => 'The email address is already subscribed.',
        ]);
        
        $subscribers = new Subscriber();
        $subscribers->email = $request->subscriber;
        $userIpAddress = $request->ip();
        $subscribers->ip_address = $userIpAddress;

        $subscribers->save();
        $notification = array('message' => "You're Addeed To Our Subscribers List!", 'alert-type' => 'success');
        return redirect()->back()->with($notification);
    }
}
