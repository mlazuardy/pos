@if ($errors->any())
    @foreach ($errors->all() as $item)
        <p>{{$item}}</p>
    @endforeach
@endif

@php
    $create = Request::is('transactions/create');
@endphp
<form action="{{route($create ? 'transactions.store' : 'transactions.update',$transaction->id)}}" method="post">
    @csrf
    @if (!$create)
        @method("PATCH")
    @endif
    <div class="form-group">
        <label for="product">Product Name</label>
        <select name="product_id" class="form-control">
             @foreach ($products as $product)
                @if($create)
                <option value="{{$product->id}}" {{ $product->id == old( 'product_id') ? 'selected' : '' }} >{{$product->name}}</option>
                @else
                <option value="{{$product->id}}" {{$transaction->product_id == $product->id || $product->id == old('product_id') ? 'selected' :''}} >{{$product->name}}</option>
                @endif
            @endforeach
        </select>
    </div>
    @if($create)
    <div class="form-group">
        <label for="customer">Customer Name</label>
        <select name="customer_id" class="form-control">
            @foreach ($customers as $customer)
                <option value="{{$customer->id}}" {{ old('customer_id') == $customer->id ? 'selected' : '' }} >{{$customer->name}}</option>
            @endforeach
        </select>
    </div>
    @endif
    <div class="form-group">
        <label for="quantity">Quantity</label>
        <input type="number" name="quantity" min="1" value="{{old('quantity',$transaction->quantity)}}" class="form-control">
    </div>
    <div class="form-group">
        <button type="submit" class="btn btn-primary">Save</button>
    </div>
</form>