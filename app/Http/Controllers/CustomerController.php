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
        return view('customers.create',['customer' => new Customer()]);
    }

    /**
     * store from create page
     */
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

    /**
     * Edit customer
     */
    public function edit($id)
    {
        $customer = Customer::findOrFail($id);
        $this->authorize('update',$customer);
        return view('customers.edit',compact('customer'));
    }

    /**
     * update customer from edit page
     */
    public function update(CustomerRequest $request,$id)
    {
        $customer = Customer::findOrFail($id);
        $validated = $request->validated();
        $this->authorize('update',$customer);
        $customer->fill($validated);
        $customer->save();
        alert()->success('Update Success','Success!');
        return redirect('/customers');
    }
    
    /**
     * Delete Customer with softDelete
     */
    public function destroy($id)
    {
        $customer = Customer::findOrFail($id);
        $this->authorize('delete',$customer);
        $customer->delete();
        alert()->success('Move customer to Bin','Success');
        return redirect('/customers');
    }
}
