<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){

        $users = User::paginate();
        $roles = Role::all();

        return view('dashboard.user.index',compact('users','roles'));

    }


    public function store(Request $request){

        $request->validate([
            'name' => ['required','unique:users','min:2'],
            'email' => ['required','email'],
            'password' => ['required'],
            'role' => ['required','numeric','exists:roles,id'],
        ]);


        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password) ,
            'role_id' => $request->role,
        ]);


        return redirect()->back()->with(['success' => 'User Registred']);

    }



    public function delete($id){

        $user = User::findOrFail($id);

        $user->delete();

        return redirect()->back();
    }



}
