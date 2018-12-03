<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Product;

class ProductController extends Controller
{
    public function index()
    {
       return Product::all();
    }

    public function show($id)
    {
        $product = Product::find($id);
        return response()->json($product,200);
    }
}
