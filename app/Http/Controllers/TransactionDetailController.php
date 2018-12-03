<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class TransactionDetailController extends Controller
{
    public function store(Request $request)
    {
        $transaction = new Transaction();
        $this->authorize('create',Transaction::class);
        $validated = $request->validated();
        $transaction->fill($validated);
        $transaction->save();
        alert()->success('Successfully create Transaction','Success!')->persistent('close');
        return redirect('/transactions');
    }
}
