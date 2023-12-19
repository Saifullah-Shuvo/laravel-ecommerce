<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Frontend\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function index(){
        $messages = Message::latest()->get();
        return view('admin.messages.index',compact('messages'));
    }

    public function show($id){
        $message = Message::findOrFail($id);
        return view('admin.messages.show',compact('message'));

    }

    public function destroy($id){
        $message = Message::findOrFail($id);
        $message->delete();

        $notification = array('message' => "Message Removed!", 'alert-type' => 'success');
        return redirect()->back()->with($notification);

    }
}
