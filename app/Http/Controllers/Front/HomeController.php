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
use Illuminate\Validation\Rule;
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
            'day' => [
                '*.date'=> ['required','date'],
                '*.meal'=> [
                                '*.food' => ['required','string'],
                                '*.persone' => ['required',Rule::exists('persones','name')],
                                '*.price' => ['required','integer'],
                                ],
                            ],
            'image' => ['required','image'],
        ]);

        DB::beginTransaction();

        try{

            $fileName = "";
        if ($request->has('image')) {

            $fileName = uploadImage('bills', $request->image);
        }

            $total = 0 ;

            $order = Order::create([
                'total' => 0,
                'image' => $fileName,
            ]);

            foreach ($request->day as $day => $value) {

                foreach ($value['meal'] as $meal=>$key) {
                    $orderdetails = OrderDetails::create([
                        'order_id' => $order->id,
                        'reference' => $value['date'],
                        'food' => $key['food'],
                        'persone' => $key['persone'],
                        'price' => $key['price'],
                    ]);
                    $total = $total + $key['price'];
                }

            }

            $order->update([
                'total' => $total,
            ]);

            DB::commit();
            return redirect()->back()->with(['success' => 'Order Registred']);

        }catch(Exception){
            return redirect()->back()->with(['error' => 'Ops !']);
            DB::rollback();

        }
    }


}
