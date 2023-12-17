<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Category;
use App\Models\Admin\Product;
use App\Models\Admin\ProductImage;
use Illuminate\Http\Request;

class ProductController extends Controller
{
                // All Products
    public function index(){
        $productcount = Product::get();
        $publishedproductcount = Product::where('status','=',1)->latest()->get();
        $products = Product::latest()->paginate(10);
        $published = Product::where('status','=',1)->latest()->paginate(10);
        return view('admin.products.index',compact('products','published','productcount','publishedproductcount'));
    }
                // Create Products
    public function add(){
        $categories = Category::all();
        return view('admin.products.add',compact('categories'));
    } 
                // Store Product
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|min:2',
            'description' => 'required',
            'thambnail' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
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

                // thambnail image store in public folder
        $image = $request->thambnail;
        if ($image) {
            $imageName = uniqid() . '.' . $image->getClientOriginalExtension();
            $imageResize = new \Intervention\Image\ImageManager();
            $imageResize->make($image)->resize(600,622)->save('admins/productimage/'.$imageName);
            $products->thambnail = $imageName;
        }

        $products->save();

                // multiple image store in the different database table
        if($request->file('images')){
            foreach ($request->file('images') as $image) {
                $imageName = uniqid() . '.' . $image->getClientOriginalExtension();
                $imageResize = new \Intervention\Image\ImageManager();
                $imageResize->make($image)->resize(600,622)->save('admins/productimage/multiImage/'.$imageName);

                ProductImage::create([
                    'product_id' => $products->id,
                    'image_path' => $imageName,
                ]);
            }
        }
        $notification = array('message' => "Products Created Successfully!", 'alert-type' => 'success');
        return redirect()->route('product.all')->with($notification);
    }

                // Edit Products
    public function edit($id){
        $categories = Category::all();
        $product = Product::with('product_images')->findorFail($id);
        $productImage = ProductImage::get();
        return view('admin.products.edit',compact('product','categories','productImage'));
    }

                // Update Products
    public function update(Request $request, $id){
        $request->validate([
            'name' => 'required|min:2',
            'description' => 'required',
            'thambnail' => 'image|mimes:jpeg,png,jpg,gif,webp|max:2048',
        ]);

        $imageName = '';

        $products = Product::with('product_images')->findorFail($id);

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

                // thambnail image store in public folder

        if ($request->thambnail) {
            $image = $request->thambnail;
            $image_path = public_path('admins/productimage/' . $products->thambnail);
            if (file_exists($image_path)) {
                unlink($image_path);
            }
            $imageName = uniqid() . '.' . $image->getClientOriginalExtension();
            $imageResize = new \Intervention\Image\ImageManager();
            $imageResize->make($image)->resize(600,622)->save('admins/productimage/'.$imageName);
            $products->thambnail = $imageName;
        }

        $products->save();

        // multiple image Update
        if($request->file('images')){

            $products->product_images()->delete();
            foreach ($request->file('images') as $image) {

                $oldImage = $products->product_images;
                foreach($oldImage as $row){
                    $oldImagePath = public_path('admins/productimage/multiImage/' . $row->image_path);
                    if (file_exists($oldImagePath)) {
                        unlink($oldImagePath);
                    }
                }

                $imageName = uniqid() . '.' . $image->getClientOriginalExtension();
                $imageResize = new \Intervention\Image\ImageManager();
                $imageResize->make($image)->resize(600,622)->save('admins/productimage/multiImage/'.$imageName);

                ProductImage::create([
                    'product_id' => $products->id,
                    'image_path' => $imageName,
                ]);
            }
        }

        $notification = array('message' => "Products Updated Successfully!", 'alert-type' => 'success');
        return redirect()->route('product.all')->with($notification);
    }

                // Delete Products
    public function destroy($id)
    {
        $products = Product::findOrFail($id);
                // Delete image
        $image_path = public_path('admins/productimage/' . $products->thambnail);
        if (file_exists($image_path)) {
            unlink($image_path);
        }

        $oldImage = $products->product_images;
        foreach($oldImage as $row){
            $oldImagePath = public_path('admins/productimage/multiImage/' . $row->image_path);
            if (file_exists($oldImagePath)) {
                unlink($oldImagePath);
            }
        }

        $products->delete();
        $notification = array('message' => "Products Deleted!", 'alert-type' => 'success');
        return redirect()->back()->with($notification);
    }


                //Hot deals
    public function hotDeals(){
        $hotDeals = Product::where('hot_deal','=',1)->latest()->get();
        return view('admin.products.hotdeals',compact('hotDeals'));
    }
                //Featured
    public function featured(){
        $featured = Product::where('featured','=',1)->latest()->get();
        return view('admin.products.featured',compact('featured'));
    }
                //Popular
    public function popular(){
        $popular = Product::where('popular_product','=',1)->latest()->get();
        return view('admin.products.popular_product',compact('popular'));
    }
}
