<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;

class CustomerController extends Controller
{
    /** customer resources */
    public function index()
    {
        $this->authorize('view',Customer::class);
        return view('customers.index');
    }

    /**
     * Create New customer
     */
    public function create()
    {
        $this->authorize('create',Customer::class);
        return view('customers.create');
    }
}
