<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TransactionDetail;

class TransactionDetailController extends Controller
{
    public function store(Request $request)
    {
        $transaction = new TransactionDetail();
        
    }
}
