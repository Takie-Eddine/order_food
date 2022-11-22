<?php

use App\Http\Controllers\Front\HomeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/' , [HomeController::class ,'index'])->name('home');


Route::post('/store' , [HomeController::class ,'store'])->name('home.store');



require __DIR__ . '/auth.php';
require __DIR__ . '/admin.php';
