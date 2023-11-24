<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Slider;
use Intervention\Image\Image;

class SlierController extends Controller
{
    public function index(){
        $sliders = Slider::where('status','=',1)->latest()->get();
        return view('admin.sliders.index',compact('sliders'));
    }

    public function add(){
        return view('admin.sliders.add');
    }

            // Store slider
    public function store(Request $request){
        $request->validate([
            'title' => 'required|min:5',
            'description' => 'required|max:200',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $sliders = new Slider();
        $sliders->title = $request->title;
        $sliders->description = $request->description;
        $sliders->status = $request->status;

                // slider image store in public folder
        if ($request->image) {
            $image=$request->image;
            $photoname=uniqid().'.'.$image->getClientOriginalExtension();
            $imageResize = new \Intervention\Image\ImageManager();
            $imageResize->make($image)->resize(1920,1000)->save('admins/sliderimage/'.$photoname);
            $sliders->image=$photoname;   // public/files/product/plus-point.jpg
            }

        $sliders->save();

        $notification = array('message' => "Slider Created Successfully!", 'alert-type' => 'success');
        return redirect()->route('slider.all')->with($notification);
    }

    public function edit($id){
        $slider = Slider::findOrFail($id);
        return view('admin.sliders.edit',compact('slider'));
    }

                // Update Slider
    public function update(Request $request, $id){
        $request->validate([
            'title' => 'required|min:5',
            'description' => 'required|max:200',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $sliders = Slider::findOrFail($id);

        $sliders->title = $request->title;
        $sliders->description = $request->description;
        $sliders->status = $request->status;

                // slider image store in public folder
        if ($request->image) {
            $image=$request->image;

            $image_path = public_path('admins/sliderimage/' . $sliders->image);
            if (file_exists($image_path)) {
                unlink($image_path);
            }

            $photoname=uniqid().'.'.$image->getClientOriginalExtension();
            $imageResize = new \Intervention\Image\ImageManager();
            $imageResize->make($image)->resize(1920,1000)->save('admins/sliderimage/'.$photoname);
            $sliders->image=$photoname;   // public/files/product/plus-point.jpg
            }

        $sliders->save();

        $notification = array('message' => "Slider Updated Successfully!", 'alert-type' => 'success');
        return redirect()->route('slider.all')->with($notification);
    }

                // Delete Products
    public function destroy($id)
    {
        $slider = Slider::findOrFail($id);
                // Delete image
        $image_path = public_path('admins/sliderimage/' . $slider->image);
        if (file_exists($image_path)) {
            unlink($image_path);
        }

        $slider->delete();

        $notification = array('message' => "Slider Deleted!", 'alert-type' => 'success');
        return redirect()->back()->with($notification);
    }

    // Slider status
    public function status_enable($id)
    {
        $data = Slider::find($id);
        $data->status = 1;
        $data->save();
        return redirect()->back();
    }

    public function status_disable($id)
    {
        $data = Slider::find($id);
        $data->status = 0;
        $data->save();
        return redirect()->back();
    }


}


