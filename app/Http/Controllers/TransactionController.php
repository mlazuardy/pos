<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;
use App\Transaction;
use App\Product;
use App\Http\Requests\StoreTransactionRequest;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $transactions = Transaction::paginate(16);
        $this->authorize('view',Transaction::class);
        return view('transactions.index',compact('transactions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $products = Product::where('stock', '>' ,0)->get();
        $customers = Customer::get();
        $transaction = new Transaction();
        $this->authorize('create',Transaction::class);
        return view('transactions.create',compact('products','customers','transaction'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTransactionRequest $request)
    {
        $transaction = new Transaction();
        $this->authorize('create',Transaction::class);
        $validated = $request->validated();
        $transaction->fill($validated);
        $transaction->save();
        alert()->success('Successfully create Transaction','Success!')->persistent('close');
        return redirect('/transactions');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $transaction = Transaction::findOrFail($id);
        $products = Product::where('stock','>' ,0)->get();
        $this->authorize('update',$transaction);
        return view('transactions.edit',compact('transaction','products'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreTransactionRequest $request, $id)
    {
        $transaction = Transaction::findOrFail($id);
        $this->authorize('update',$transaction);
        $validated = $request->validated();
        $transaction->fill($validated);
        $transaction->save();
        alert()->success('Update Transaction Success','Success!')->persistent('close');
        return redirect('/transactions');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
