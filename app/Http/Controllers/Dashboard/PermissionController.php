<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Role;
use Illuminate\Http\Request;

class PermissionController extends Controller
{


    public function index(){

        $roles = Role::paginate();

        return view('dashboard.permission.index',compact('roles'));
    }



    public function store(Request $request){


        $request->validate([
            'name' => 'required',
            'permissions' => 'required|array|min:1',
        ]);

        try {

            $role = $this->process(new Role, $request);
            if ($role)
                return redirect()->back()->with(['success' => 'added with success']);
            else
                return redirect()->back()->with(['error' => 'there is a problem']);
        } catch (\Exception $ex) {
            return $ex;
            return redirect()->back()->with(['error' => 'there is a problem']);
        }
    }


    public function delete($id){

            $user = Role::findOrFail($id);

            $user->delete();

            return redirect()->back();

    }



    protected function process(Role $role, Request $r)
    {
        $role->name = $r->name;
        $role->permissions = json_encode($r->permissions);
        $role->save();
        return $role;
    }
}
