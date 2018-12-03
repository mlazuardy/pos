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
                @endforelse
                <tr>
                    <td>
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                            Add New Product to this customer
                        </button>
                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                                    </div>
                                    <div class="modal-body">
                                        ...
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="button" class="btn btn-primary">Save changes</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
        </tbody>
    </table>
@endsection