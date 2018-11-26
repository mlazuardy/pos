@extends('users.partials._layout')
@section('dashboard-title','Users')
@section('dashboard-body')

    @can('create',App\User::class)
    <div class="text-center mb-3">
        <a href="{{route('users.create')}}" class="btn btn-primary">Add User +</a>
    </div>
    @endcan
    <table class="table table-bordered table-hover">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nama</th>
                <th scope="col">Role</th>
                <th scope="col" colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $key => $user)
            <tr>
                <td>{{$key+1}}</td>
                <td>{{$user->name}}</td>
                <td>{{$user->role->name}}</td>
                <td>
                    <a href="{{route('users.show',$user->id)}}">Show</a>
                </td>
                <td>
                    <a href="{{route('users.edit',$user->id)}}">Edit</a>
                </td>
                <td>Delete</td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection