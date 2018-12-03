@extends('users.partials._layout')
@section('dashboard-title',$trans->customer->name)
@section('dashboard-body')
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#ID</th>
                <th scope="col">Product Name</th>
                <th scope="col">Product Price</th>
                <th scope="col">QTY</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($details as $item)
                <tr>
                    <th scope="row">{{$detail->id}}</th>
                    <td>{{$trans->product->name}}/td>
                    <td>{{$trans->price}}</td>
                    <td>{{$trans->qty}}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="4">No Transaction detail in this customer</td>
                </tr>
                <tr>
                    <td>
                        <a href="#" class="btn btn-primary">New Transaction Detail</a>
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection