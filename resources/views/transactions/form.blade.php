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
                <option value="{{$product->id}}">{{$product->name}}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="customer">Customer Name</label>
        <select name="customer_id" class="form-control">
            @foreach ($customers as $customer)
                <option value="{{$customer->id}}">{{$customer->name}}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="quantity">Quantity</label>
        <input type="number" name="quantity" min="0" class="form-control">
    </div>
    <div class="form-group">
        <button type="submit" class="btn btn-primary">Save</button>
    </div>
</form>