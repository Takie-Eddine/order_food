<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Food;
use App\Models\Order;
use App\Models\OrderDelivery;
use App\Models\OrderDetails;
use App\Models\Persone;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;

class HomeController extends Controller
{


    public function index(){

        $persones = Persone::all();
        $meals = Food::all();

        return view('front.order_form',compact('persones' , 'meals'));
    }



    public function store(Request $request){

        $request->validate([
            //'refrence' => 'required',
            'food' => 'required',
            'date' => 'required|date',
            'persone' => 'required|array|min:1|exists:persones,name',
            'price' => 'required|integer',
            //'delivery' => 'nullable|integer',

        ]);

        try{
            $request->merge(['refrence' => Str::slug($request->date)]);

            DB::beginTransaction();

            if ($request->persone) {
                $count = count($request->persone);
            }else{
                $count = 1;
            }


            $ordertest = OrderDetails::where( 'reference' , $request->refrence )->first();

                if (!$ordertest) {

                    $order = Order::create([
                        'total' => 0,
                    ]);

                    foreach ($request->persone as $value) {
                        $order_details = OrderDetails::create([
                            'order_id' => $order->id,
                            'reference' => $request->refrence,
                            'food' => $request->food,
                            'created_at' => $request->date,
                            'price' => ($request->price/$count),
                            'persone' => $value,
                        ]);
                    }

                    $order->update([
                        'total' => ($request->price),
                    ]);

                }else{
                    foreach ($request->persone as $value) {
                        $order_details = OrderDetails::create([
                            'order_id' => $ordertest->order_id,
                            'reference' => $request->refrence,
                            'food' => $request->food,
                            'created_at' => $request->date,
                            'price' => ($request->price/$count),
                            'persone' => $value,
                        ]);

                        $order_up = Order::find($ordertest->order_id);
                        $order_up->total = $order_up->total+$request->price/$count;
                        $order_up->save();

                    }

                }

            DB::commit();

            return redirect()->back()->with(['success' => 'Order Registred']);

        }catch(Exception $ex){
            DB::rollback();
            return redirect()->back()->with(['errors' => 'There is problem contact the smartest one ']);
        }
    }


}
