<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Customer extends Model
{
    use SoftDeleletes;

    protected $dates = ['deleted_at'];

    protected $guarded = [];
}
