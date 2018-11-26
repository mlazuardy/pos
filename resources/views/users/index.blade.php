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
            @foreach ($users->where('id', '!=' ,auth()->id()) as $key => $user)
            <tr>
                <td>{{$key}}</td>
                <td>{{$user->name}}</td>
                <td>{{$user->role->name}}</td>
                <td>
                    <a href="{{route('users.show',$user->id)}}">Show</a>
                </td>
                <td>
                    <a href="{{route('users.edit',$user->id)}}">Edit</a>
                </td>
                <td>
                    <form action="{{route('users.destroy',$user->id)}}" method="post">
                        @csrf
                        @method("DELETE")
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection