<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Food;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class FoodController extends Controller
{
    public function index(){

        $meals = Food::paginate(7);

        return view('dashboard.food.index' ,compact('meals'));
    }

    public function store(Request $request){
        $request->validate([
            'name' => 'required|unique:food,name|min:3',
            'price' => 'required|integer',
        ]);


        Food::create([
            'name' => $request->name,
            'price' => $request->price,
        ]);
        Alert::success( 'Meal Registred');
        return redirect()->back()->with(['success' => 'Meal Registred']);
    }


    public function delete($id){

        $meal = Food::findOrFail($id);

        $meal->delete();
        //Alert::success( 'Meal deleted');
        return redirect()->back()->with(['success' => 'User deleted']);

    }



    public function edit($id){

        $meal = Food::findOrFail($id);

        return view('dashboard.food.edit',compact('meal'));

    }


    public function update(Request $request,$id){

        //return $request;
        $request->validate([
            'name' => 'required|min:3|unique:food,name,'. $request->id,
            'price' => 'required|integer',
        ]);

        $meal = Food::findOrFail($id);
        $meal->update([
            'name' => $request->name,
            'price' => $request->price,
        ]);
        //Alert::success( 'Meal Updated');
        return redirect()->route('dashboard.food')->with(['success' => 'Meal Updated']);

    }
}
