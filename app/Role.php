<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $guarded = [];

    /**
     * Role has one User
     */
    public function user()
    {
        return $this->hasOne('App\User');
    }
}
