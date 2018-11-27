@extends('users.partials._layout')
@section('dashboard-title','Edit Product')
@section('dashboard-body')
    @if ($errors->any())
        @foreach ($errors->all() as $item)
            <p>{{$item}}</p>
        @endforeach
    @endif
    <form action="{{route('products.update',$product->id)}}" method="post" enctype="multipart/form-data">
        @csrf
        @method("PATCH")
        <div class="form-group">
            <label for="name">Product Name</label>
            <input type="text" name="name" value="{{old('name',$product->name)}}" class="form-control">
        </div>
        <div class="form-group">
            @if ($product->image != 'products/default.jpg')
                <img width="500" src="{{asset('storage/'.$product->image)}}" alt="{{$product->name}}" class="img-thumbnail">
            @endif
            <input type="file" class="form-control-file" name="image">
        </div>
        <div class="form-group">
            <label for="price">Price</label>
            <input type="text" name="price" value="{{old('price',$product->price)}}" min="0" class="form-control">
        </div>
        <div class="form-group">
            <label for="berat">Weight</label>
            <input type="number" name="berat" value="{{old('berat',$product->berat)}}" min="0" class="form-control">
        </div>
        <div class="form-group">
            <label for="stock">Stock</label>
            <input type="number" name="stock" value="{{old('stock',$product->stock)}}" min="0" class="form-control">
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Save Product</button>
        </div>
    </form>
@endsection