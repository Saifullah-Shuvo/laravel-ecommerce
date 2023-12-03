<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Testimonial;
use Illuminate\Http\Request;

class TestimonialController extends Controller
{
    public function index(){
        $testimonials = Testimonial::latest()->get();
        return view('admin.testimonials.index',compact('testimonials'));
    }

    public function add(){
        return view('admin.testimonials.add');
    }

    public function store(Request $request){
        $request->validate([
            'name' => 'required',
            'profession' => 'required',
            'company' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'text' => 'required',
            'status' => 'required',
        ]);

        $sliders = new Testimonial();
        $sliders->name = $request->name;
        $sliders->profession = $request->profession;
        $sliders->company = $request->company;
        $sliders->text = $request->text;
        $sliders->status = $request->status;

                // testimonial image store in public folder
        if ($request->image) {
            $image=$request->image;
            $photoname=uniqid().'.'.$image->getClientOriginalExtension();
            $imageResize = new \Intervention\Image\ImageManager();
            $imageResize->make($image)->resize(135,105)->save('admins/testimonialimage/'.$photoname);
            $sliders->image=$photoname;   // public/files/product/plus-point.jpg
            }

        $sliders->save();

        $notification = array('message' => "Testimonial Data Inserted Successfully!", 'alert-type' => 'success');
        return redirect()->route('testimonial.all')->with($notification);
    }

    public function edit($id){
        $testimonial = Testimonial::findOrFail($id);
        return view('admin.testimonials.edit',compact('testimonial'));
    }
}
