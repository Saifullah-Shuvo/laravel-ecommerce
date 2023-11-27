<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Blog;
use App\Models\Admin\Category;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index(){
        $blogs = Blog::latest()->get();
        return view('admin.blogs.index',compact('blogs'));
    }

    public function add(){
        $categories = Category::all();
        return view('admin.blogs.add',compact('categories'));
    }

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
        $blogs->user_id = $user;

                // blog image store in public folder
        if ($request->image) {
            $image=$request->image;
            $photoname=uniqid().'.'.$image->getClientOriginalExtension();
            $imageResize = new \Intervention\Image\ImageManager();
            $imageResize->make($image)->resize(500,364)->save('admins/blogimages/'.$photoname);
            $blogs->image=$photoname;   // public/files/product/plus-point.jpg
            }
        // dd($request->all());
        $blogs->save();

        $notification = array('message' => "Blogs Created Successfully!", 'alert-type' => 'success');
        return redirect()->route('blog.all')->with($notification);
    }
}
