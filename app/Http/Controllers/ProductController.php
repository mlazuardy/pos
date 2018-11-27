<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Http\Requests\CreateProductRequest;
use Excel;
use App\Imports\ProductsImport;

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
        $products = Product::paginate(16);
        $this->authorize('view',Product::class);
        return view('products.index',compact('products'));
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

    /**
     * Edit Page
     */
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $this->authorize('update',$product);
        return view('products.edit',compact('product'));
    }

    public function update(CreateProductRequest $request,$id)
    {
        $product = Product::findOrFail($id);
        $this->authorize('update',$product);
        $validated = $request->validated();
        $product->fill($validated);
        $image = storage_path('app/public/'.$product->image);
        if($request->file('image')){
            if(basename($image) != 'default.jpg'){
                unlink($image);
            }
            $newImage = $request->file('image');
            $newImage->store('public/products/');
            $product->image = $newImage->hashName('products/');
        }
        $product->save();
        alert()->success('Edit Product Success','Success!');
        return redirect('products/');
    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $this->authorize('delete',$product);
        $product->delete();
        alert()->success('Move Product to Bin','Success');
        return redirect('/products');
    }

    public function importProducts()
    {
        Excel::import(new ProductsImport,request()->file('excel'));
    }
}
