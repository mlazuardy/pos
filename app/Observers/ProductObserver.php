<?php

namespace App\Observers;

use App\Product;

class ProductObserver
{
  
    public function saving(Product $product)
    {
        if (request()->hasFile('image')) {
            $image = request()->file('image');
            $image->store('public/products/');
            $product->image = $image->hashName('products/');
        }
    }
    
    public function updating(Product $product)
    {
        $image = storage_path('app/public/' . $product->getOriginal('image'));
        if (request()->file('image')) {
            if (basename($image) != 'default.jpg') {
                unlink($image);
            }
            $newImage = request()->file('image');
            $newImage->store('public/products/');
            $product->image = $newImage->hashName('products/');
        }
    }
}
