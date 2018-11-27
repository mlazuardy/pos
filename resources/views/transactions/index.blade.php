@extends('users.partials._layout')
@section('dashboard-title','Transactions')
@section('dashboard-body')
    <div class="text-right mb-3">
        <a href="{{route('transactions.create')}}" class="btn btn-primary">Add Transaction</a>
    </div>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Product Name</th>
                <th>Customer Name</th>
                <th>Quantity</th>
                <th>Buy At</th>
                <th colspan="2" class="text-center">Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($transactions as $transaction)
            <tr>
                <th>{{$transaction->id}}</th>
                <td>{{$transaction->product->name}}</td>
                <td>{{$transaction->customer->name}}</td>
                <td>{{$transaction->quantity}}</td>
                <td>{{$transaction->created_at->diffForHumans()}}</td>
                <td>
                    <a href="{{route('transactions.edit',$transaction->id)}}" class="btn btn-success">Edit</a>
                </td>
                <td>
                    <form action="{{route('transactions.destroy',$transaction->id)}}" method="post">
                        @csrf @method("DELETE")
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="7">No Transaction Found</td>
            </tr>
            @endforelse
        </tbody>
    </table>
@endsection