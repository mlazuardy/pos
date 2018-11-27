<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Http\Requests\CreateProductRequest;

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
        $this->authorize('view',Product::class);
        return view('products.index');
    }

    /**
     * View Create Product Page
     */
    public function create()
    {
        $this->authorize('create',Product::class);
        return view('products.create');
    }

    /**
     * Store Product from create method
     */
    public function store(CreateProductRequest $request)
    {
        $validated = $request->validated();
        $product = new Product();
        $this->authorize('create',Product::class);
        $product->fill($validated);
        if($request->hasFile('image')){
            $image = $request->file('image');
            $image->store('public/products/');
            $product->image = $image->hashName('products/');
        }
        $product->save();
        alert()->success('New Product Added','Success');
        return redirect('/products');
    }

    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $this->authorize('update',$product);
    }
}
