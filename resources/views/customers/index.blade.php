@extends('users.partials._layout')
@section('dashboard-title','Customers')
@section('dashboard-body')
    <div class="text-right mb-3">
        <a href="{{route('customers.create')}}" class="btn btn-primary">Add Customer</a>
    </div>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Phone</th>
                <th>Email</th>
                <th>Address</th>
                <th colspan="2" class="text-center">Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($customers as $customer)
            <tr>
                <th>{{$customer->id}}</th>
                <td>{{$customer->name}}</td>
                <td>{{$customer->phone}}</td>
                <td>{{$customer->email}}</td>
                <td>{{$customer->address}}</td>
                <td>
                    <a href="{{route('customers.edit',$customer->id)}}" class="btn btn-success">Edit</a>
                </td>
                <td>
                    <form action="{{route('customers.destroy',$customer->id)}}" method="post">
                        @csrf
                        @method("DELETE")
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="7">No Customer Found</td>
            </tr>
            @endforelse
        </tbody>
    </table>
@endsection