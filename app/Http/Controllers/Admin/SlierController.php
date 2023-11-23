<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Slider;

class SlierController extends Controller
{
    public function index(){
        $sliders = Slider::latest()->get();
        return view('admin.sliders.index',compact('sliders'));
    }

    public function add(){
        return view('admin.sliders.add');
    }


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
        $image = $request->image;
        if ($image) {
            $imageName = uniqid() . '.' . $image->getClientOriginalExtension();
            $request->image->move('admins/sliderimage', $imageName);
            $sliders->image = $imageName;
        }

        $sliders->save();

        $notification = array('message' => "Slider Created Successfully!", 'alert-type' => 'success');
        return redirect()->route('slider.all')->with($notification);
    }

}


