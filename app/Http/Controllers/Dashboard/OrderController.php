<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderDelivery;
use App\Models\OrderDetails;
use Exception;
use GrahamCampbell\ResultType\Success;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function index(){

        $request = request();

        $orders = Order::filter($request->query())->paginate(7);
        $total = Order::selectRaw('SUM(total) as total')->filter($request->query())->first();

        return view('dashboard.order.index',compact('orders','total'));
    }



    public function details($id){

        $order_details = OrderDetails::where('order_id',$id)->paginate();
        //$order_delivrey = OrderDelivery::where('order_id',$id)->first();
        $order = Order::find($id);

        return view('dashboard.order.details',compact('order_details','order'));

    }




    public function delete($id){

        try{

            $order = Order::findOrFail($id);
            $order_details = OrderDetails::where('order_id',$id)->get();
            //$order_delivrey = OrderDelivery::where('order_id',$id)->first();


            DB::beginTransaction();
            foreach ($order_details as $value) {
                $value->delete();
            }
            //$order_delivrey->delete();
            $order->delete();

            DB::commit();

            return redirect()->back()->with(['success' =>'Order Deleted']);
        }catch(Exception $ex){
            DB::rollback();
            return $ex;
        }

    }
}
