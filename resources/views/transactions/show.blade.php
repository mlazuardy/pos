@extends('users.partials._layout')
@section('dashboard-title',"Transaksi {$trans->customer->name} Nomor {$trans->id}")
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
                                    <form action="" method="post">
                                        @csrf
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <label for="Product">Product</label>
                                                <select name="product_id" id="product_id" class="form-control">
                                                    @foreach ($products as $product)
                                                        <option value="{{$product->id}}">{{$product->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="Price">Price</label>
                                                <input type="text" id="price" name="price" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label for="qty">Quantity</label>
                                                <input type="number" name="qty" min="1" value="1" class="form-control">
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <button type="button" class="btn btn-primary">Save changes</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
        </tbody>
    </table>
@endsection