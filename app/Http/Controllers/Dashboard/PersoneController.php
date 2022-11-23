<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Persone;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;


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

        Alert::success( 'User Registred');
        return redirect()->back();
    }


    public function delete($id){

        $persone = Persone::findOrFail($id);

        $persone->delete();
        Alert::success( 'User deleted');
        return redirect()->back()->with(['success' => 'User deleted']);

    }
}
