<?php

namespace App\Http\Controllers\Dashboard;

use App\Exports\ExpencesExport;
use App\Http\Controllers\Controller;
use App\Models\Expence;
use App\Models\Expence_details;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ExpencesController extends Controller
{

    public function index(){

        $request = request();
        $expences = Expence_details::filter($request->query())->paginate();


        switch ($request->input('action')) {
            case 'filter':
                    $expences = Expence_details::filter($request->query())->paginate();
                break;

            case 'export':
                    $request->validate([
                        'date_started' => ['nullable','date'],
                        'date_endded' => ['nullable','date'],
                    ]);
                    $from = Carbon::parse($request->date_started)->toDateTimeString();
                    $to = Carbon::parse( $request->date_endded)->toDateTimeString();

                    return Excel::download(new ExpencesExport($from,$to),'Expenses.ods');
                break;
        }


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



    // public function edit($id){


    //     $expense = Expence_details::findOrFail($id);

    //     return view('dashboard.expences.edit',compact('expense'));
    // }


    public function export(Request $request){



    }

}
