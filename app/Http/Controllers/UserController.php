<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Role;
use App\Http\Requests\StoreUserRequest;

class UserController extends Controller
{

    public function index()
    {
        $users = User::withTrashed()->paginate(15);
        $this->authorize('view',\Auth::user());
        return view('users.index',compact('users'));
    }

    public function show()
    {
        return "Oke";
    }

    public function create()
    {
        $roles = Role::get();
        $this->authorize('create',User::class);
        return view('users.create',compact('roles'));
    }

    public function store(StoreUserRequest $request)
    {
        $user = new User();
        $this->authorize('create',$user);
        $validated = $request->validated();
        $user->fill($validated);
        $user->save();
        alert()->success('Successfully Created', 'Success!')->persistent('close');
        return back()->with('success','Successfully Creating New User');
        
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        $roles = Role::get();
        $this->authorize('update',$user);
        return view('users.edit',compact('user','roles'));
    }

    public function update(Request $request,$id)
    {
        $user = User::find($id);
        $this->authorize('update', $user);
        $validation = $this->validate(request(),[
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'role_id' => 'required',
        ]);
        $user->fill($validation);
        $user->save();
        alert()->success('Successfully Updated', 'Success!')->persistent('close');
        return redirect('/users')->with('success','Successfully Updated');
    }

    public function destroy($id)
    {
        $user = User::find($id);
        $this->authorize('delete',$user);
        $user->delete();
        alert()->success('User has been move to bin', 'Success!')->persistent('close');
        return redirect('/users')->with('success','User has been move to bin');
    }

}
