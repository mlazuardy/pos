<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Transaction extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $guarded = [];

    /**
     * Transaction belongsTo Product
     */
    public function product()
    {
        return $this->belongsTo('App\Product');
    }

    /**
     * Transaction belongsTo Customer
     */
    public function customer()
    {
        return $this->belongsTo('App\Customer');
    }
}
