@php
    $create = Request::is('customers/create');
@endphp

@if ($errors->any())
    @foreach ($errors->all() as $item)
        <p>{{$item}}</p>
    @endforeach
@endif
    <form action="{{route($create ? 'customers.store' : 'customers.edit',$customer->id)}}" method="post">
        @csrf
        @if(!$create)
            @method('PATCH')
        @endif
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" value="{{old('name',$customer->name)}}" class="form-control">
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" value="{{old('email',$customer->email)}}" class="form-control">
        </div>
        <div class="form-group">
            <label for="phone">Phone</label>
            <input type="text" name="phone" value="{{old('phone',$customer->phone)}}" class="form-control">
        </div>
        <div class="form-group">
            <label for="address">Address</label>
            <textarea name="address" id="" cols="30" rows="10" class="form-control">{{old('address',$customer->address)}}</textarea>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Save Customer</button>
        </div>
    </form>