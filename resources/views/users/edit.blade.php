@extends('users.partials._layout')
@section('dashboard-title',"Edit {$user->name}")
@section('dashboard-body')
    @if ($errors->any())
        @foreach ($errors->all as $item)
            <p>{{$item}}</p>
        @endforeach
    @endif
    <form action="{{route('users.update',$user->id)}}" method="post">
        @csrf
        @method('PATCH')
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" value="{{old('name',$user->name)}}" class="form-control">
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" value="{{old('email',$user->email)}}" class="form-control">
        </div>
        <div class="form-group">
            <label for="role">Role</label>
            <select name="role_id" class="form-control">
                @foreach ($roles as $role)
                    <option value="{{$role->id}}" {{$role->id == $user->role_id || $role->id == old('role_id') ? 'selected' :'' }} >{{$role->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Update</button>
        </div>
    </form>
@endsection