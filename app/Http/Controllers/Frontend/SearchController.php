<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Admin\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SearchController extends Controller
{
    public function globalSearch(Request $request)
    {
        $query = $request->input('query');

        $search = Product::where('status','=',1)->where('name', 'like', '%' . $query . '%')
                     ->orWhere('description', 'like', '%' . $query . '%')
                     ->get();

        // $latestProduct = Product::where('status','=',1)->latest()->get();

        return view('frontend.sections.search', compact('search'));
    }
}
