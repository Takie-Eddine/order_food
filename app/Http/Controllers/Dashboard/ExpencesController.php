<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Expence;
use App\Models\Expence_details;
use Exception;
use Illuminate\Http\Request;

class ExpencesController extends Controller
{

    public function index(){

        $request = request();

        $expences = Expence_details::filter($request->query())->paginate();


        return view('dashboard.expences.index',compact('expences'));
    }



    public function create(){

        return view('dashboard.expences.create');
    }


    public function store(Request $request){


        $request->validate([
            'type' => ['required','in:cash_in,cash_out'] ,
            'price' => ['required','numeric'] ,
            'description' => ['nullable'] ,
            'date' => ['required','date'] ,
            // ,'after_or_equal:today'
        ]);

        try{

            $expense = Expence_details::orderBy('id', 'desc')->first();
            //return $expense;

            if ($expense) {
                if ($request->type === 'cash_in') {
                    Expence_details::create([
                        'type' => $request->type,
                        'price' => $request->price,
                        'description' => $request->description,
                        'old'=> $expense->total,
                        'total'=>($expense->total+$request->price),
                        'created_at' => $request->date,
                    ]);
                }else {
                    Expence_details::create([
                        'type' => $request->type,
                        'price' => $request->price,
                        'description' => $request->description,
                        'old'=> $expense->total,
                        'total'=> ($expense->total-$request->price),
                        'created_at' => $request->date,
                    ]);
                }
            }else{
                if ($request->type === 'cash_in') {
                    Expence_details::create([
                        'type' => $request->type,
                        'price' => $request->price,
                        'description' => $request->description,
                        'old'=> 0,
                        'total'=>(0+$request->price),
                        'created_at' => $request->date,
                    ]);
                }else {
                    Expence_details::create([
                        'type' => $request->type,
                        'price' => $request->price,
                        'description' => $request->description,
                        'old'=> 0,
                        'total'=> (0-$request->price),
                        'created_at' => $request->date,
                    ]);
                }
            }


            return redirect()->back()->with(['success' => 'Transaction Registred']);


        }catch(Exception $ex){
            return redirect()->back();
        }
    }



    public function edit($id){


        $expense = Expence_details::findOrFail($id);

        return view('dashboard.expences.edit',compact('expense'));
    }


}
