<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Category;

class CategoryController extends Controller
{
    public function index(){
        $categories = Category::orderBy('id', 'DESC')->get();
        return view('admin.categories.index',compact('categories'));
    }

    public function store(Request $request){
        $request->validate([
            'category_name' => 'required|min:5',
            'category_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        $categories = new Category();
        $categories->category_name = $request->category_name;

        // image store in public folder
        $image = $request->category_image;
        if($image){
            $imageName = uniqid() . '.' . $image->getClientOriginalExtension();
            $request->category_image->move('admins/categoryimage', $imageName);
            $categories->category_image = $imageName;
        }
        $categories->save();
        return redirect()->back();
    }

    public function destroy($id){
        $categories = Category::findOrFail($id);
        //delete image
        $image_path = public_path('admins/categoryimage/' . $categories->category_image);
        if (file_exists($image_path)) {
            unlink($image_path);
        }
        $categories->delete();
        return redirect()->back();
    }

    // Category status
    public function status_enable($id){
        $data = Category::find($id);
        $data->status = 1;
        $data->save();
        return redirect()->back();
    }
    public function status_disable($id){
        $data = Category::find($id);
        $data->status = 0;
        $data->save();
        return redirect()->back();
    }

    //Category feature
    public function feature_enable($id){
        $data = Category::find($id);
        $data->is_featured = 1;
        $data->save();
        return redirect()->back();
    }
    public function feature_disable($id){
        $data = Category::find($id);
        $data->is_featured = 0;
        $data->save();
        return redirect()->back();
    }
}
