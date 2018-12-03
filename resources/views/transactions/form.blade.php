@if ($errors->any())
    @foreach ($errors->all() as $item)
        <p>{{$item}}</p>
    @endforeach
@endif

@php
    $create = Request::is('transactions/create');
@endphp
<form action="#" @submit.prevent="addToCart">
    @if (!$create)
        @method("PATCH")
    @endif
    <div class="form-group">
        <label for="product">Product Name</label>
        <select name="product_id" id="product_id" class="form-control">
             @foreach ($products as $product)
                @if($create)
                <option value="{{$product->id}}" >{{$product->name}}</option>
                @else
                <option value="{{$product->id}}" >{{$product->name}}</option>
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
        <input type="number" name="qty" min="1" value="1" class="form-control">
    </div>
    <div class="form-group">
        <button class="btn btn-primary">Add To Cart</button>
    </div>
</form>