<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TransactionDetail extends Model
{
    protected $guarded = [];

    public function transaction()
    {
        return $this->belongsTo('App\Transaction');
    }

    public function product()
    {
        return $this->belongsTo('App\Product');
    }

    public function getPriceAttribute($value)
    {
        return 'Rp. '.number_format($value,0);
    }
}
