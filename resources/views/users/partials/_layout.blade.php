@extends('layouts.app') 
@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-2">
            <div class="list-group">
                <a href="/dashboard" class="list-group-item list-group-item-action">
                    Dashboard
                </a>
                @can('view',App\User::class)
                <a href="{{route('users.index')}}" class="list-group-item list-group-item-action">
                    Users
                </a>
                @endcan
                @can('view',App\Product::class)
                    <a href="{{route('products.index')}}" class="list-group-item list-group-item-action">Products</a>
                @endcan
                @can('view',App\Customer::class)
                    <a href="{{route('customers.index')}}" class="list-group-item list-group-item-action">
                        Customers
                    </a>
                @endcan
                @can('view',App\Transaction::class)
                    <a href="{{route('transactions.index')}}" class="list-group-item list-group-item-action">Transactions</a>
                @endcan
            </div>
        </div>
        <div class="col-md-10">
            <div class="card">
                <div class="card-header text-center">@yield('dashboard-title')</div>
                <div class="card-body">
                   @yield('dashboard-body')
                </div>
            </div>
        </div>
    </div>
</div>
@endsection