<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Admin\Category;
use App\Models\Admin\Product;
use App\Models\Admin\Slider;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $slider = Slider::where('status','=',1)->latest()->get();
        $featuredProduct = Product::where('status','=',1)->where('featured','=',1)->latest()->get();
        $popularProduct = Product::where('status','=',1)->where('popular_product','=',1)->latest()->take(4)->get();
        $latestProduct = Product::where('status','=',1)->latest()->limit(8)->get();
        return view('frontend.home',compact('slider','featuredProduct','popularProduct','latestProduct'));
    }

    public function about(){
        $popularProduct = Product::where('status','=',1)->where('popular_product','=',1)->latest()->take(4)->get();
        return view('frontend.sections.about',compact('popularProduct'));
    }

    public function shop(){
        $latestProduct = Product::where('status','=',1)->with('category')->latest()->get();
        $category = Category::where('status','=',1)->latest()->get();
        return view('frontend.sections.shop',compact('latestProduct','category'));
    }

    public function categoryProduct($category_id){
        $category = Category::where('status','=',1)->latest()->get();
        $categoryProduct = Category::where('status','=',1)->with('products')->findOrFail($category_id);
        return view('frontend.sections.shopCategory',compact('categoryProduct','category'));
    }

    public function productDetails($id){

        $productDetails = Product::findOrFail($id);
        $productMultiImage = Product::with('product_images')->findOrFail($id);
        $productCategory = Product::with('category')->findOrFail($id);

        $relatedProducts = Product::where('category_id', $productDetails->category_id)
            ->where('id', '!=', $productDetails->id)
            ->limit(4)
            ->get();

        return view('frontend.sections.product_details',compact('productDetails',
        'productMultiImage','productCategory','relatedProducts'));
    }

    public function blog(){
        return view('frontend.sections.blog');
    }

    public function contact(){
        return view('frontend.sections.contact');
    }
}
