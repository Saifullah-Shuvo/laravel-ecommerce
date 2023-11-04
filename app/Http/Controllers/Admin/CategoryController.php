<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Category;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::orderBy('id', 'DESC')->get();
        return view('admin.categories.index', compact('categories'));
    }

    //Category Store Method

    public function store(Request $request)
    {
        $request->validate([
            'category_name' => 'required|min:5',
            'category_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        $categories = new Category();
        $categories->category_name = $request->category_name;

                // image store in public folder
        $image = $request->category_image;
        if ($image) {
            $imageName = uniqid() . '.' . $image->getClientOriginalExtension();
            $request->category_image->move('admins/categoryimage', $imageName);
            $categories->category_image = $imageName;
        }
        $categories->save();
        $notification = array('message' => "Category Created Successfully!", 'alert-type' => 'success');
        return redirect()->back()->with($notification);
    }

    // Category Destroy method

    public function destroy($id)
    {
        $categories = Category::findOrFail($id);
                //delete image
        $image_path = public_path('admins/categoryimage/' . $categories->category_image);
        if (file_exists($image_path)) {
            unlink($image_path);
        }
        $categories->delete();
        $notification = array('message' => "Category Deleted!", 'alert-type' => 'success');
        return redirect()->back()->with($notification);
    }

    // Category Edit method

    public function edit($id)
    {
        $data = Category::findorFail($id);
        $data->image_path =asset('admins/categoryimage/' . $data->category_image);

        return response()->json($data);
    }

    // Category Update method
    
    public function update(Request $request){
        $request->validate([
            'category_name' => 'required|min:5',
            'category_image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $category = Category::where('id',$request->id)->first();
        $category->category_name = $request->category_name;

        //image store in public folder
        $image = $request->category_image;
        if ($image) {
            $image_path = public_path('admins/categoryimage/' . $category->category_image);
            if (file_exists($image_path)) {
                unlink($image_path);
            }
            $imageName = uniqid() . '.' . $image->getClientOriginalExtension();
            $request->category_image->move('admins/categoryimage', $imageName);
            $category->category_image = $imageName;
        }
        //end

        $category->save();

        $notification = array('message' => "Category Updated!", 'alert-type' => 'success');
        return redirect()->back()->with($notification);
    }

    // Category status
    public function status_enable($id)
    {
        $data = Category::find($id);
        $data->status = 1;
        $data->save();
        return redirect()->back();
    }
    public function status_disable($id)
    {
        $data = Category::find($id);
        $data->status = 0;
        $data->save();
        return redirect()->back();
    }

    //Category feature
    public function feature_enable($id)
    {
        $data = Category::find($id);
        $data->is_featured = 1;
        $data->save();
        return redirect()->back();
    }
    public function feature_disable($id)
    {
        $data = Category::find($id);
        $data->is_featured = 0;
        $data->save();
        return redirect()->back();
    }
}
