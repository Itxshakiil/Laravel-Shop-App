<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function view($slug){
        $product = Product::where('slug', $slug)->firstOrFail();
        return view('product.view',compact('product'));
    }
}
