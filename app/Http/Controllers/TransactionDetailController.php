<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TransactionDetail;
use App\Transaction;

class TransactionDetailController extends Controller
{
    public function store(Request $request,$id)
    {
        $trans = Transaction::find($id);
        $transDetail = new TransactionDetail();
        $validated = $this->validate($request,[
            'product_id' => 'required',
            'price' => 'required',
            'qty' => 'required',
        ]);
        $transDetail->fill($validated);
        $transDetail->transaction_id = $trans->id;
        $transDetail->save();
        $trans->increment('total');
        alert()->success('success');
        return redirect('/transactions');
    }
}
