<?php

use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Dashboard\FoodController;
use App\Http\Controllers\Dashboard\OrderController;
use App\Http\Controllers\Dashboard\PersoneController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;



// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');


// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });



Route::group(['middleware' => ['auth','verified'] , 'as'=>'dashboard.' , 'prefix' => 'dashboard'],function(){

    Route::get('/',[DashboardController::class,'index'])->name('dashboard');


    Route::get('/persone' ,[PersoneController::class , 'index'])->name('persone');
    Route::post('/persone/store' ,[PersoneController::class , 'store'])->name('persone.store');
    Route::delete('/persone/{id}' ,[PersoneController::class , 'delete'])->name('persone.delete');


    Route::get('/food' ,[FoodController::class , 'index'])->name('food');
    Route::get('/food/create' ,[FoodController::class , 'create'])->name('food.create');
    Route::post('/food/store' ,[FoodController::class , 'store'])->name('food.store');
    Route::post('/food/{id}' ,[FoodController::class , 'edit'])->name('food.edit');
    Route::patch('/food/{id}' ,[FoodController::class , 'update'])->name('food.update');
    Route::delete('/food/{id}' ,[FoodController::class , 'delete'])->name('food.delete');



    Route::get('/order' ,[OrderController::class , 'index'])->name('order');
    Route::post('/order/store' ,[OrderController::class , 'store'])->name('order.store');
    Route::delete('/order/{id}' ,[OrderController::class , 'delete'])->name('order.delete');
    Route::delete('/order/details/{id}' ,[OrderController::class , 'details'])->name('order.details');

});
