<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{

    public function index()
    {
        $users = User::paginate(15);
        $this->authorize('view',\Auth::user());
        return response($users);
    }

    public function show()
    {
        return "Oke";
    }

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

    public function update(Request $request,$id)
    {
        $user = User::find($id);
        $user->name = request('name');
        $user->email  = request('email');
        $this->authorize('update',$user);
        return request()->wantsJson()
        ?
        response()->json($user,201): null;
    }

}
