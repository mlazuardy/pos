<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;

class CustomerController extends Controller
{
    public function index()
    {
        $this->authorize('view',Customer::class);
        return view('customers.index');
    }
}
