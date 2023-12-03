<?php

namespace App\Http\Controllers;

use App\Models\Frontend\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function store(Request $request){
        $request->validate([
            'name' => 'required|min:5',
            'email' => 'required|email',
            'review_text' => 'required|max:200',
            'review' => 'required|in:1,2,3,4,5',
        ]);

        $reviews = new Review();
        // dd($request->all());
        $reviews->product_id = $request->product_id;
        $reviews->name = $request->name;
        $reviews->email = $request->email;
        $reviews->review = $request->review;
        $reviews->review_text = $request->review_text;
        $user = auth()->user()->id;
        $reviews->user_id = $user;
        $reviews->save();

        $notification = array('message' => "Review Submitted Successfully!", 'alert-type' => 'success');
        return redirect()->back()->with($notification);
    }
}
