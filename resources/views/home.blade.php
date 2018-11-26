@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="list-group">
                <a href="#" class="list-group-item list-group-item-action active">
                    Dashboard
                </a>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-center">Dashboard</div>
                <div class="card-body">
                    <div class="card" style="width: 18rem;">
                        <div class="card-body text-center">
                            <h5 class="card-title">Total User</h5>
                            <div class="display-2">
                                {{\App\User::get()->count()}}
                            </div>
                            <a href="#" class="card-link">Card link</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
