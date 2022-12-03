<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Expence;
use App\Models\Expence_details;
use App\Models\Order;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){

        $meals = Order::selectRaw('SUM(total) as total')->whereMonth('created_at',Carbon::now()->month())->first();
        $cash_in = Expence_details::selectRaw('SUM(price) as total')->where('type' , '=' , 'cash_in')->first();
        $cash_out = Expence_details::selectRaw('SUM(price) as total')->where('type' , '=' , 'cash_out')->first();
        $rest = Expence_details::select('total')->orderBy('updated_at', 'desc')->first();
        return view('dashboard.index',compact('meals','cash_in','cash_out','rest'));
    }
}
