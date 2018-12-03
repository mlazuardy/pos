@extends('users.partials._layout')
@section('dashboard-title','Transactions')
@section('dashboard-body')

    <div class="text-right mb-3">
        <a href="{{route('addCustomer')}}" class="btn btn-primary">Add Transaction</a>
    </div>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Customer Name</th>
                <th>Total</th>
                <th colspan="3" class="text-center">Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($transactions as $transaction)
            <tr>
                <th>{{$transaction->id}}</th>
                <td>{{$transaction->customer->name}}</td>
                <td>{{$transaction->total}}</td>
                <td>
                    <a href="{{route('transactions.show',$transaction->id)}}" class="btn btn-primary">Detail</a>
                </td>
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