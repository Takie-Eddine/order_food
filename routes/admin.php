<?php

use App\Http\Controllers\Dashboard\CalculationController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Dashboard\ExpencesController;
use App\Http\Controllers\Dashboard\FoodController;
use App\Http\Controllers\Dashboard\OrderController;
use App\Http\Controllers\Dashboard\PermissionController;
use App\Http\Controllers\Dashboard\PersoneController;
use App\Http\Controllers\Dashboard\UserController;
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


    Route::get('/persone' ,[PersoneController::class , 'index'])->middleware('can:persone')->name('persone');
    Route::post('/persone/store' ,[PersoneController::class , 'store'])->middleware('can:persone_create')->name('persone.store');
    Route::delete('/persone/{id}' ,[PersoneController::class , 'delete'])->middleware('can:persone_delete')->name('persone.delete');


    // Route::get('/food' ,[FoodController::class , 'index'])->middleware('can:food')->name('food');
    // // Route::get('/food/create' ,[FoodController::class , 'create'])->middleware('can:food_create')->name('food.create');
    // Route::post('/food/store' ,[FoodController::class , 'store'])->middleware('can:food_store')->name('food.store');
    // Route::post('/food/{id}' ,[FoodController::class , 'edit'])->middleware('can:food_edit')->name('food.edit');
    // Route::patch('/food/{id}' ,[FoodController::class , 'update'])->middleware('can:food_update')->name('food.update');
    // Route::delete('/food/{id}' ,[FoodController::class , 'delete'])->middleware('can:food_delete')->name('food.delete');



    Route::get('/order' ,[OrderController::class , 'index'])->middleware('can:order')->name('order');
    // Route::post('/order/store' ,[OrderController::class , 'store'])->middleware('can:order_store')->name('order.store');
    Route::delete('/order/{id}' ,[OrderController::class , 'delete'])->middleware('can:order_delete')->name('order.delete');
    Route::post('/order/details/{id}' ,[OrderController::class , 'details'])->middleware('can:order_details')->name('order.details');
    Route::get('/order/details/{id}' ,[OrderController::class , 'details'])->middleware('can:order_details')->name('order.details');
    Route::get('/order/person/show/{person}', [CalculationController::class , 'show'])->middleware('can:order_show')->name('order.person.show');
    Route::delete('/order/archive' ,[OrderController::class , 'archive'])->name('order.archive');



    Route::get('/expence' ,[ExpencesController::class , 'index'])->middleware('can:expences')->name('expences');
    Route::get('/expence/create' ,[ExpencesController::class , 'create'])->middleware('can:expences_create')->name('expences.create');
    Route::post('/expence/store' ,[ExpencesController::class , 'store'])->middleware('can:expences_store')->name('expences.store');
    Route::post('/export' , [ExpencesController::class , 'export'])->name('expences.export');
    // Route::post('/expence/{id}' ,[ExpencesController::class , 'edit'])->middleware('can:expences_edit')->name('expences.edit');
    // Route::patch('/expence/{id}' ,[ExpencesController::class , 'update'])->middleware('can:expences_update')->name('expences.update');
    // Route::delete('/expence/{id}' ,[ExpencesController::class , 'delete'])->middleware('can:expences_delete')->name('expences.delete');


    Route::get('/user' ,[UserController::class , 'index'])->middleware('can:users')->name('users');
    // Route::get('/user/create' ,[UserController::class , 'create'])->middleware('can:users')->name('users.create');
    Route::post('/user/store' ,[UserController::class , 'store'])->middleware('can:users_store')->name('users.store');
    // Route::post('/user/{id}' ,[UserController::class , 'edit'])->middleware('can:users')->name('users.edit');
    // Route::patch('/user/{id}' ,[UserController::class , 'update'])->middleware('can:users')->name('users.update');
    Route::delete('/user/{id}' ,[UserController::class , 'delete'])->middleware('can:users_delete')->name('users.delete');



    Route::get('/permission' ,[PermissionController::class , 'index'])->name('permission');
    // Route::get('/permission/create' ,[PermissionController::class , 'create'])->middleware('can:permission')->name('permission.create');
    Route::post('/permission/store' ,[PermissionController::class , 'store'])->name('permission.store');
    // Route::post('/permission/{id}' ,[PermissionController::class , 'edit'])->middleware('can:permission')->name('permission.edit');
    // Route::patch('/permission/{id}' ,[PermissionController::class , 'update'])->middleware('can:permission')->name('permission.update');
    Route::delete('/permission/{id}' ,[PermissionController::class , 'delete'])->name('permission.delete');







});
