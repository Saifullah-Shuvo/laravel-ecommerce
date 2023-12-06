<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Admin\Blog;
use App\Models\Admin\Category;
use App\Models\Admin\Faq;
use App\Models\Admin\Product;
use App\Models\Admin\Slider;
use App\Models\Admin\Testimonial;
use App\Models\Frontend\Cart;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index(){
        $slider = Slider::where('status','=',1)->latest()->get();
        $featuredProduct = Product::where('status','=',1)->where('featured','=',1)->latest()->get();
        $popularProduct = Product::where('status','=',1)->where('popular_product','=',1)->latest()->take(4)->get();
        $latestProduct = Product::where('status','=',1)->latest()->limit(8)->get();
        $testimonials = Testimonial::where('status','=',1)->latest()->get();
        
        return view('frontend.home',compact('slider','featuredProduct','popularProduct','latestProduct','testimonials'));
    }

    public function about(){
        $popularProduct = Product::where('status','=',1)->where('popular_product','=',1)->latest()->take(4)->get();
        return view('frontend.sections.about',compact('popularProduct'));
    }

    public function shop(Request $request){
        $latestProduct = Product::where('status','=',1)->with('category')->latest()->paginate(8);
        if ($request->ajax()) {
            $view = view('frontend.sections.data', compact('latestProduct'))->render();
            return response()->json(['html' => $view]);
        }
        $category = Category::where('status','=',1)->latest()->get();
        return view('frontend.sections.shop',compact('latestProduct','category'));
    }

    public function categoryProduct($category_id){
        $category = Category::where('status','=',1)->latest()->get();
        $categoryProduct = Category::where('status','=',1)->with('products')->findOrFail($category_id);
        return view('frontend.sections.shopCategory',compact('categoryProduct','category'));
    }

    public function productDetailsModal($id){
        $productDetails = Product::with('category')->findOrFail($id);
        $productDetails->thambnail =asset('admins/productimage/' . $productDetails->thambnail);
        // $data = [
        //     'productDetails' => $productDetails,
        // ];
        return response()->json($productDetails);
    }

    public function productDetails($id){

        $productDetails = Product::with(['reviews' => function ($query) {
            $query->orderBy('created_at', 'desc');
        }])->findOrFail($id);

        // Assuming $productDetails->reviews is an array of review data
        $reviews = $productDetails->reviews;
        // Initialize counters
        $totalRatings = 0;
        $ratingsCount = 0;
        // Iterate through reviews
        foreach ($reviews as $review) {
            // Check if the review has a 'rating' attribute
            if (isset($review['review'])) {
                // Increment the total ratings and count
                $totalRatings += $review['review'];
                $ratingsCount++;
            }
        }
        // Calculate the average rating (if needed)
        $averageRating = ($ratingsCount > 0) ? ($totalRatings / $ratingsCount) : 0;
        // dd($averageRating);

        $productMultiImage = Product::with('product_images')->findOrFail($id);
        $productCategory = Product::with('category')->findOrFail($id);

        $relatedProducts = Product::where('category_id', $productDetails->category_id)
            ->where('id', '!=', $productDetails->id)
            ->limit(4)
            ->get();

        return view('frontend.sections.product_details',compact('productDetails',
        'productMultiImage','productCategory','relatedProducts','totalRatings','averageRating'));
    }

    public function blog(){
        $blogs = Blog::where('status','=',1)->with('admin')->latest()->paginate(6);
        // dd($blogs);
        return view('frontend.sections.blog',compact('blogs'));
    }

    public function blogDetails($id){
        $categories= Category::where('status','=',1)->latest()->get();
        $latestBlogs = Blog::where('status','=',1)->latest()->take(5)->get();
        // $blogDetails = Blog::with(['admin', 'comments'])->findOrFail($id);
        $blogDetails = Blog::with(['admin', 'comments' => function ($query) {
            $query->latest()->get();
        }])->findOrFail($id);
        return view('frontend.sections.blog_details',compact('blogDetails','latestBlogs','categories'));
    }

    public function blogCategory($id){
        $category = Category::with('blogs')->findOrFail($id);
        return view('frontend.sections.blog_category',compact('category'));
    }

    public function contact(){
        $faqs = Faq::where('status',1)->latest()->get();
        return view('frontend.sections.contact',compact('faqs'));
    }

}
