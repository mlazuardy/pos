@extends('users.partials._layout')
@section('dashboard-title','Create new User')
@section('dashboard-body')
    @if ($errors->any())
        @foreach ($errors->all() as $item)
            <p>
                {{$item}}
            </p>
        @endforeach
    @endif
    <form action="{{route('users.store')}}" method="post">
    @csrf
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" value="{{old('name')}}" class="form-control">
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" value="{{old('email')}}" class="form-control">
        </div>
        <div class="form-group">
            <label for="role_id">Role</label>
            <select name="role_id" class="form-control">
                @foreach ($roles as $role)
                    <option value="{{$role->id}}" {{$role->id == old('role_id') ? 'selected' :'' }}>{{$role->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" name="password" class="form-control">
        </div>
        <div class="form-group">
            <label for="password_confirmation">Password Confimartion</label>
            <input type="password" name="password_confirmation" class="form-control">
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Save</button>
        </div>
    </form>
@endsection