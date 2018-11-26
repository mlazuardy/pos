@extends('users.partials._layout')
@section('dashboard-title','Create New Product')
@section('dashboard-body')
    <form action="{{route('products.store')}}" method="post">
        @csrf
        <div class="form-group">
            <label for="name">Product Name</label>
            <input type="text" name="name" value="{{old('name')}}" class="form-control">
        </div>
        <div class="form-group">
            <label for="image">Foto</label>
            <input type="file" class="form-control-file" name="image">
        </div>
        <div class="form-group">
            <label for="berat">Weight</label>
            <input type="number" name="berat" value="{{old('berat')}}" minlength="0" class="form-control">
        </div>
        <div class="form-group">
            <label for="stock">Stock</label>
            <input type="number" name="stock" value="{{old('stock')}}" class="form-control">
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Save Product</button>
        </div>
    </form>
@endsection