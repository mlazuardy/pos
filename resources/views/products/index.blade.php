@extends('users.partials._layout')
@section('dashboard-title','Products')
@section('dashboard-body')
    <div class="text-center mb-3">
        <a href="{{route('products.create')}}">Create New Product</a>
    </div>
    <div class="row">
        @foreach ($products as $product)
            <div class="col-md-4">
                <div class="card">
                    <img class="card-img-top" src="{{asset('storage/'.$product->image)}}" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">{{$product->name}}</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <div class="row justify-content-center mt-3">
        {{$products->links()}}
    </div>
@endsection