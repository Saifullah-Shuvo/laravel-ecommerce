<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Frontend\Details;
use Illuminate\Http\Request;

class DetailsController extends Controller
{
    public function index(){
        $details = Details::get();
        return view('admin.details.index',compact('details'));
    }

    public function update(Request $request, $id){
        $request->validate([
            'adderess' => 'required',
            'main_email' => 'required|email',
            'alternative_email' => 'required|email',
            'main_phone' => 'required|numeric',
            'alternative_phone' => 'required|numeric',
            'facebook' => 'required',
            'tweeter' => 'required',
            'linkedIn' => 'required',
            'google_plus' => 'required',
            'short_details' => 'required',
            'about_details' => 'required',
        ]);

        $details = Details::findOrFail($id);
        $details->adderess = $request->adderess;
        $details->main_email = $request->main_email;
        $details->alternative_email = $request->alternative_email;
        $details->main_phone = $request->main_phone;
        $details->alternative_phone = $request->alternative_phone;
        $details->facebook = $request->facebook;
        $details->tweeter = $request->tweeter;
        $details->linkedIn = $request->linkedIn;
        $details->google_plus = $request->google_plus;
        $details->short_details = $request->short_details;
        $details->about_details = $request->about_details;

        $details->save();

        $notification = array('message' => "Details Updated!", 'alert-type' => 'success');
        return redirect()->back()->with($notification);
    }
}
