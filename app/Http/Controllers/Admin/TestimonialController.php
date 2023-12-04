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

        $testimonial = new Testimonial();
        $testimonial->name = $request->name;
        $testimonial->profession = $request->profession;
        $testimonial->company = $request->company;
        $testimonial->text = $request->text;
        $testimonial->status = $request->status;

                // testimonial image store in public folder
        if ($request->image) {
            $image=$request->image;
            $photoname=uniqid().'.'.$image->getClientOriginalExtension();
            $imageResize = new \Intervention\Image\ImageManager();
            $imageResize->make($image)->resize(135,105)->save('admins/testimonialimage/'.$photoname);
            $testimonial->image=$photoname;   // public/files/product/plus-point.jpg
            }

        $testimonial->save();

        $notification = array('message' => "Testimonial Data Inserted Successfully!", 'alert-type' => 'success');
        return redirect()->route('testimonial.all')->with($notification);
    }

    public function edit($id){
        $testimonial = Testimonial::findOrFail($id);
        return view('admin.testimonials.edit',compact('testimonial'));
    }

    public function update(Request $request, $id){
        $request->validate([
            'name' => 'required',
            'profession' => 'required',
            'company' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'text' => 'required',
            'status' => 'required',
        ]);

        $testimonial = Testimonial::findOrFail($id);
        $testimonial->name = $request->name;
        $testimonial->profession = $request->profession;
        $testimonial->company = $request->company;
        $testimonial->text = $request->text;
        $testimonial->status = $request->status;

        // slider image update in public folder
        if ($request->image) {
            $image=$request->image;

            $image_path = public_path('admins/testimonialimage/' . $testimonial->image);
            if (file_exists($image_path)) {
                unlink($image_path);
            }

            $photoname=uniqid().'.'.$image->getClientOriginalExtension();
            $imageResize = new \Intervention\Image\ImageManager();
            $imageResize->make($image)->resize(135,105)->save('admins/testimonialimage/'.$photoname);
            $testimonial->image=$photoname;   // public/files/product/plus-point.jpg
        }

        $testimonial->save();

        $notification = array('message' => "Testimonial Updated Successfully!", 'alert-type' => 'success');
        return redirect()->route('testimonial.all')->with($notification);
    }

    public function destroy($id){
        $testimonial = Testimonial::findOrFail($id);
                // Delete image
        $image_path = public_path('admins/testimonialimage/' . $testimonial->image);
        if (file_exists($image_path)) {
            unlink($image_path);
        }

        $testimonial->delete();

        $notification = array('message' => "Testimonial Deleted!", 'alert-type' => 'success');
        return redirect()->back()->with($notification);
    }

    // Slider status
    public function status_enable($id)
    {
        $data = Testimonial::find($id);
        $data->status = 1;
        $data->save();
        return redirect()->back();
    }

    public function status_disable($id)
    {
        $data = Testimonial::find($id);
        $data->status = 0;
        $data->save();
        return redirect()->back();
    }
}
