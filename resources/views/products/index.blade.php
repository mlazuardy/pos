@extends('users.partials._layout')
@section('dashboard-title','Products')
@section('dashboard-body')
    <div class="text-center mb-3">
        <a href="{{route('products.create')}}" class="btn btn-primary">Create New Product</a>
        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal">
          Import Products from Excel
        </button>
        
    </div>
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Import Product</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{route('products.import')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="file">Excel</label>
                            <input type="file" name="excel" class="form-control-file">
                        </div>
                        <div class="form-group text-right">
                            <button type="submit" class="btn btn-primary">Upload</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        @foreach ($products as $product)
            <div class="col-md-4">
                <div class="card">
                    <img class="card-img-top" src="{{asset('storage/'.$product->image)}}" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">{{$product->name}}</h5>
                        <p class="card-text">
                            Rp. {{number_format($product->price,0)}}
                        </p>
                        <p class="card-text">
                            Stok: {{$product->stock}}
                        </p>
                        <p class="card-text">
                            Berat: {{$product->berat}}
                        </p>
                        <a href="{{route('products.edit',$product->id)}}" class="btn btn-primary">Edit</a>
                        <form action="{{route('products.destroy',$product->id)}}" method="post">
                            @csrf
                            @method("DELETE")
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <div class="row justify-content-center mt-3">
        {{$products->links()}}
    </div>
@endsection