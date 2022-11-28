<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\OrderDetails;
use Illuminate\Http\Request;

class CalculationController extends Controller
{



    public function show( $person){

        $request = request();

        $person_orders = OrderDetails::where('persone',$person)->filter($request->query())->paginate();

        $person_orders_total = OrderDetails::selectRaw('SUM(price) as total')->where('persone',$person)->filter($request->query())->first();


        return view('dashboard.order.show',compact('person_orders','person_orders_total'));
    }



}
