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

class HomeController extends Controller
{


    public function index(){

        $persones = Persone::all();
        $meals = Food::all();

        return view('front.order_form',compact('persones' , 'meals'));
    }



    public function store(Request $request){

        try{
            $request->validate([
                'refrence' => 'required',
                'food' => 'required|exists:food,id',
                'date' => 'required|date',
                'persone' => 'nullable|array|min:1|exists:persones,id',
                'price' => 'required|integer',
                'delivery' => 'nullable|integer',

            ]);
            DB::beginTransaction();

            $count = count($request->persone);

            $ordertest = OrderDetails::where('reference',$request->refrence)->first();



            if (!$ordertest) {

                $order = Order::create([
                    'total' => 0,
                ]);

                foreach ($request->persone as $value) {
                    $order_details = OrderDetails::create([
                        'order_id' => $order->id,
                        'reference' => $request->refrence,
                        'food_id' => $request->food,
                        'created_at' => $request->date,
                        'price' => ($request->price/$count),
                        'persone_id' => $value,
                    ]);
                }

                $order_delevery = OrderDelivery::create([
                    'order_id' => $order->id,
                    'delivery' => $request->delivery,
                ]);

                $order->update([
                    'total' => ($request->price + $order_delevery->delivery),
                ]);

            }else{
                foreach ($request->persone as $value) {
                    $order_details = OrderDetails::create([
                        'order_id' => $ordertest->order_id,
                        'reference' => $request->refrence,
                        'food_id' => $request->food,
                        'created_at' => $request->date,
                        'price' => ($request->price/$count),
                        'persone_id' => $value,
                    ]);

                    $order = Order::findOrFail($ordertest->id);

                    $order->total = $order->total+$request->price;
                    $order->save();

                }

                // OrderDelivery::create([
                //     'order_id' => $ordertest->order_id,
                //     'delivery' => $request->delivery,
                // ]);

            }

            DB::commit();


            return redirect()->back()->with(['success' => 'Order Registred']);

        }catch(Exception $ex){
            DB::rollback();

            return $ex;
        }







    }
}
