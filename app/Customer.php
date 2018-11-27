<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Customer extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $guarded = [];

    /**
     * Customer has many transaction
     */
    public function transactions()
    {
        return $this->hasMnany('App\Transaction');
    }
}
