<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Category;
use App\Models\Admin\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(){
        $categories = Category::all();
        return view('admin.products.index');
    }

    public function add(){
        $categories = Category::all();
        return view('admin.products.add',compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|min:2',
            'description' => 'required|max:200',
            // 'images' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        $products = new Product();
        $products->category_id = $request->category_id;
        $products->name = $request->name;
        $products->code = $request->code;

        $products->description = $request->description;
        $products->purchase_price = $request->purchase_price;
        $products->selling_price = $request->selling_price;
        $products->discount_price = $request->discount_price;
        $products->stock_quantity = $request->stock_quantity;
        
        $products->status = $request->status;
        $products->hot_deal = $request->hot_deal;
        $products->featured = $request->featured;
        $products->popular_product = $request->popular_product;
        
        $products->unit = $request->unit;
        $products->tags = $request->tags;


                // image store in public folder
        $image = $request->thambnail;
        if ($image) {
            $imageName = uniqid() . '.' . $image->getClientOriginalExtension();
            $request->thambnail->move('admins/productimage', $imageName);
            $products->thambnail = $imageName;
        }

                // multiple image store

        //multiple images
        // $images = array();
        // if($request->hasFile('images')){
        //     foreach ($request->file('images') as $key => $image) {
        //         $imageName= uniqid().'.'.$image->getClientOriginalExtension();
        //         $request->images->move('admins/productimage', $imageName);
        //         // Image::make($image)->resize(600,600)->save('public/files/product/'.$imageName);
        //         array_push($images, $imageName);
        //     }
        //     $products->images = json_encode($images);
        // }

        //another one
        if($request->hasFile('images'))
        {
            $names = [];
            foreach($request->file('images') as $images)
            {
                $destinationPath = 'admins/productimage/';
                $filename = $images->getClientOriginalName();
                $image->move($destinationPath, $filename);
                array_push($names, $filename);          

            }
            $products->image = json_encode($names);
        }

        // $allImages = null;

        // if($request->hasFile('images'))
        // {
        //     foreach($request->file('images') as $images)
        //     {
        //         $destinationPath = 'admins/productimage';
        //         $filename = $images->getClientOriginalName();
        //         $images->move($destinationPath, $filename);
        //         $fullPath = $destinationPath . $filename;
        //         $allImages .= $allImages == null ? $fullPath : ';' . $fullPath;
        //     }
        
        //     $products->images = $allImages;
        
        // }

        $products->save();
        $notification = array('message' => "Products Created Successfully!", 'alert-type' => 'success');
        return redirect()->route('product.all')->with($notification);
    }
}
