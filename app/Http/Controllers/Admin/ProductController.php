<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Category;
use App\Models\Admin\Product;
use App\Models\Admin\ProductImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Expr\FuncCall;

class ProductController extends Controller
{
                // All Products
    public function index(){
        $products = Product::latest()->get();
        $published = Product::where('status','=',1)->latest()->get();
        return view('admin.products.index',compact('products','published'));
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
            'description' => 'required|max:200',
            'thambnail' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
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
            $request->thambnail->move('admins/productimage', $imageName);
            $products->thambnail = $imageName;
        }
                // multiple image store
        $images = array();
        if($request->hasFile('images')){
            foreach ($request->file('images') as $key => $image) {
                $imageName= uniqid().'.'.$image->getClientOriginalExtension();
                // Image::make($image)->resize(600,600)->save('public/files/product/'.$imageName);
                $image->move('admins/productimage/multiImage', $imageName);
                array_push($images, $imageName);
            }
            $products->images = json_encode($images);
        }

        // foreach ($request->file('images') as $image) {
        //     $imageName = time().'.'.$image->getClientOriginalExtension();
        //     $image->move(public_path('admins/productimage/multiImage'), $imageName);

        //     // ProductImage::create([
        //     //     'product_id' => $productId,
        //     //     'image_path' => $imageName,
        //     // ]);
        //     $products->images = $imageName;
        // }
        // dd($request->all());

        $products->save();
        $notification = array('message' => "Products Created Successfully!", 'alert-type' => 'success');
        return redirect()->route('product.all')->with($notification);
    }

                // Edit Products
    public function edit($id){
        $categories = Category::all();
        $product = Product::findorFail($id);
        return view('admin.products.edit',compact('product','categories'));
    }

                // Update Products
    public function update(Request $request, $id){
        $request->validate([
            'name' => 'required|min:2',
            'description' => 'required|max:200',
            'thambnail' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $imageName = '';

        $products = Product::findOrFail($id);

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
            // $imageName = time().'.'.$request->image->getClientOriginalExtension();
            $imageName = uniqid() . '.' . $image->getClientOriginalExtension();
            $request->thambnail->move('admins/productimage', $imageName);
            $products->thambnail = $imageName;
        }

                // multiple image store
        // $images = array();
        // if($request->hasFile('images')){
        //     foreach ($request->file('images') as $key => $image) {
        //         $imageName= hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        //         // Image::make($image)->resize(600,600)->save('public/files/product/'.$imageName);
        //         $request->images->move('admins/productimage', $imageName);
        //         array_push($images, $imageName);
        //     }
        //     $products->images = json_encode($images);
        // }

        // DB::table('products')->insert($data);

        $products->save();
        $notification = array('message' => "Products Updated Successfully!", 'alert-type' => 'success');
        return redirect()->route('product.all')->with($notification);
    }

                // Delete Products
    public function destroy($id)
    {
        $products = Product::findOrFail($id);
                //delete image
        $image_path = public_path('admins/productimage/' . $products->thambnail);
        if (file_exists($image_path)) {
            unlink($image_path);
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
