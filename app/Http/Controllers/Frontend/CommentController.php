<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request){
        $request->validate([
            'title' => 'required|min:5',
            'description' => 'required|max:200',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $blogs = new Blog();
        $user = auth()->user()->id;
        $blogs->title = $request->title;
        $blogs->description = $request->description;
        $blogs->category_id = $request->category_id;
        $blogs->status = $request->status;
        $blogs->admin_id = $user;

    

        $blogs->save();

        $notification = array('message' => "Blogs Created Successfully!", 'alert-type' => 'success');
        return redirect()->route('blog.all')->with($notification);
    }
}
