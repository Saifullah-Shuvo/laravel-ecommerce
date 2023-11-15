<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Category;
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
        dd($categories);
    }
}
