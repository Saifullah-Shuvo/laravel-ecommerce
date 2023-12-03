<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Frontend\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller

{
    public function store(Request $request){
        $request->validate([
            'name' => 'required|min:5',
            'email' => 'required|email',
            'comment' => 'required|max:200',
        ]);

        $comments = new Comment();
        $comments->blog_id = $request->blog_id;
        $comments->name = $request->name;
        $comments->email = $request->email;
        $comments->comment = $request->comment;
        $user = auth()->user()->id;
        $comments->user_id = $user;

        $comments->save();

        $notification = array('message' => "Comment Submitted Successfully!", 'alert-type' => 'success');
        return redirect()->back()->with($notification);
    }
}
