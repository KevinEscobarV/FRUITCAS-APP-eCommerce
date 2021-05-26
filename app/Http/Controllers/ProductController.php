<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller


{
    protected $listeners = ['render'];
    
    public function show(Product $product)
    {
       return view('products.show', compact('product'));
    }
}
