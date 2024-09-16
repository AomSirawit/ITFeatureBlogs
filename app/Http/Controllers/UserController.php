<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index(){
        $usersTable = User::all();
        return view('backoffice.manageUsers',compact('usersTable'));
    }

    public function edit($id){
        $user = User::findOrFail($id);
        return view('backoffice.users.editUsers',compact('user'));
    }

    public function update(Request $request,$id){
        $user = User::findOrFail($id);
        $user->update($request->all());
        return redirect()->route('users.show');
    }

    public function destroy($id){
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->route('users.show');
    }

}
