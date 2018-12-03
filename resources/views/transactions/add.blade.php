@extends('users.partials._layout')
@section('dashboard-title','Customer add')
@section('dashboard-body')
    <form action="#" method="post">
        @csrf
        <div class="form-group">
            <label for="customer_id">Customer Name</label>
            <select name="customer_id" class="form-control">
                @foreach ($customers as $item)
                    <option value="{{$item->id}}">{{$item->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-default">Save</button>
        </div>
    </form>
@endsection