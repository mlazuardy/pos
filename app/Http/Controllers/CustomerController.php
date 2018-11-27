<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;
use App\Http\Requests\CustomerRequest;

class CustomerController extends Controller
{
    /** customer resources */
    public function index()
    {
        $customers = Customer::paginate(20);
        $this->authorize('view',Customer::class);
        return view('customers.index',compact('customers'));
    }

    /**
     * Create New customer
     */
    public function create()
    {
        $this->authorize('create',Customer::class);
        return view('customers.create');
    }

    public function store(CustomerRequest $request)
    {
        $customer = new Customer();
        $this->authorize('create',Customer::class);
        $validated = $request->validated();
        $customer->fill($validated);
        $customer->save();
        alert()->success('Successfully create new customer','Success!')->persistent('close');
        return redirect('/customers');
    }
}
