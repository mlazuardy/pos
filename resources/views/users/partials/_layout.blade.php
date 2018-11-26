@extends('layouts.app') 
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="list-group">
                <a href="/home" class="list-group-item list-group-item-action">
                    Dashboard
                </a>
                @can('view',App\User::class)
                <a href="{{route('users.index')}}" class="list-group-item list-group-item-action">
                    Users
                </a>
                @endcan
            </div>
        </div>
        <div class="col-md-8">
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