<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Expence;
use App\Models\Expence_details;
use App\Models\Order;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){

        $meals = Order::selectRaw('SUM(total) as total')->first();
        $cash_in = Expence_details::selectRaw('SUM(price) as total')->where('type' , '=' , 'cash_in')->first();
        $cash_out = Expence_details::selectRaw('SUM(price) as total')->where('type' , '=' , 'cash_out')->first();
        return view('dashboard.index',compact('meals','cash_in','cash_out'));
    }
}
