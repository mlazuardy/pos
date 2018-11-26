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
        return view('users.index',compact('users'));
    }

    public function show()
    {
        return "Oke";
    }

    public function create()
    {
        $user = new User;
        
        $this->authorize('create',$user);
        return view('users.create');
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

    public function edit($id)
    {
        $user = User::findOrFail($id);
        $this->authorize('update',$user);
        return view('users.edit',compact('user'));
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
