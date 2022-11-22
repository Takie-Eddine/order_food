<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Persone;
use Illuminate\Http\Request;

class PersoneController extends Controller
{

    public function index(){

        $persones = Persone::paginate(7);

        return view('dashboard.persone.index' ,compact('persones'));
    }



    public function store(Request $request){

        $request->validate([
            'name' => 'required|unique:persones,name|min:3',
        ]);

        Persone::create([
            'name' => $request->name,
        ]);

        return redirect()->back()->with(['success' => 'User Registred']);
    }


    public function delete($id){

        $persone = Persone::findOrFail($id);

        $persone->delete();

        return redirect()->back()->with(['success' => 'User deleted']);

    }
}
