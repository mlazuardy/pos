<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    public function store()
    {
        $user = User::create([
            'name' => request('name'),
            'role_id' => request('role_id'),
            'email' => request('email'),
            'password' => \Hash::make(request('password')),

        ]);
        $this->authorize('create',$user);
        return request()->wantsJson()
        ?
        response()->json($user,201): null;
    }
}
