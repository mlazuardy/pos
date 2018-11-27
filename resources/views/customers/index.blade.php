@extends('users.partials._layout')
@section('dashboard-title','Customers')
@section('dashboard-body')
    <div class="text-right mb-3">
        <a href="{{route('customers.create')}}" class="btn btn-primary">Add Customer</a>
    </div>
@endsection