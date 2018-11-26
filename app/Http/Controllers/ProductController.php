<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Product Resources
     */
    public function index()
    {
        $products = Product::get();
        return view('products.index');
    }

    /**
     * View Create Product Page
     */
    public function create()
    {
        return view('products.create');
    }
}
