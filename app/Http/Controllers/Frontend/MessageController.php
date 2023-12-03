<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Frontend\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function message(Request $request){
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'subject' => 'required|max:100',
            'message' => 'required'
        ]);

        $messages = new Message();
        $messages->name = $request->name;
        $messages->email = $request->email;
        $messages->subject = $request->subject;
        $messages->message = $request->message;

        $messages->save();
        $notification = array('message' => "Message Successfully Sent!", 'alert-type' => 'success');
        return redirect()->back()->with($notification);
    }
}
