@extends('users.partials._layout')
@section('dashboard-title','Dashboard')
@section('dashboard-body')
    <div class="card" style="width: 18rem;">
        <div class="card-body text-center">
            <h5 class="card-title">Total User</h5>
            <div class="display-2">
                {{\App\User::get()->count()}}
            </div>
            <a href="#" class="card-link">Card link</a>
        </div>
    </div>
@endsection