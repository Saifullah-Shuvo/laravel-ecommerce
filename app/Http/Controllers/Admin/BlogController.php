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
        $categories = Category::where('status','=',1)->get();
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

        $blogs->save();

        $notification = array('message' => "Blogs Created Successfully!", 'alert-type' => 'success');
        return redirect()->route('blog.all')->with($notification);
    }

    public function edit($id){
        $blog = Blog::findOrFail($id);
        $categories = Category::where('status','=',1)->get();
        return view('admin.blogs.edit',compact('blog','categories'));
    }

            // Update Blog
    public function update(Request $request, $id){
        $request->validate([
            'title' => 'required|min:5',
            'description' => 'required|max:200',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $blogs = Blog::findOrFail($id);
        
        $user = auth()->user()->id;
        $blogs->title = $request->title;
        $blogs->description = $request->description;
        $blogs->category_id = $request->category_id;
        $blogs->status = $request->status;
        $blogs->user_id = $user;

                // blog image update in public folder
        if ($request->image) {
            $images=$request->image;
            $image_path = public_path('admins/blogimages/'.$blogs->image);
            if (file_exists($image_path)) {
                unlink($image_path);
            }

            $photoname=uniqid().'.'.$images->getClientOriginalExtension();
            $imageResize = new \Intervention\Image\ImageManager();
            $imageResize->make($images)->resize(500,364)->save('admins/blogimages/'.$photoname);
            $blogs->image=$photoname;   // public/files/product/plus-point.jpg
        }

        $blogs->save();

        $notification = array('message' => "Blog Updated Successfully!", 'alert-type' => 'success');
        return redirect()->route('blog.all')->with($notification);
    }

                // Delete Products
    public function destroy($id)
    {
        $blog = Blog::findOrFail($id);
                // Delete image
        $image_path = public_path('admins/blogimages/'.$blog->image);
        if (file_exists($image_path)) {
            unlink($image_path);
        }

        $blog->delete();

        $notification = array('message' => "Blog Deleted!", 'alert-type' => 'success');
        return redirect()->back()->with($notification);
    }

    // Slider status
    public function status_enable($id)
    {
        $data = Blog::find($id);
        $data->status = 1;
        $data->save();
        return redirect()->back();
    }

    public function status_disable($id)
    {
        $data = Blog::find($id);
        $data->status = 0;
        $data->save();
        return redirect()->back();
    }

}
