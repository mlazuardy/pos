@extends('users.partials._layout')
@section('dashboard-title','Products')
@section('dashboard-body')
    <div class="text-center mb-3">
        <a href="{{route('products.create')}}">Create New Product</a>
    </div>
@endsection