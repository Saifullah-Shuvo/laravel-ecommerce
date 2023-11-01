<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Category;

class CategoryController extends Controller
{
    public function index(){
        $categories = Category::all();
        // dd($categories);
        // return view('admin.categories.index',compact('categories'));
        return view('admin.categories.index');
    }
}
