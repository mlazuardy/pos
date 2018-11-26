@extends('users.partials._layout')
@section('dashboard-title','Users')
@section('dashboard-body')
    <table class="table table-bordered table-hover">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nama</th>
                <th scope="col">Role</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $key => $user)
            <tr>
                <td>{{$key+1}}</td>
                <td>{{$user->name}}</td>
                <td>{{$user->role->name}}</td>
                <td>Action</td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection