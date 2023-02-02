<?php

use App\Http\Controllers\Admin\foodController;
use App\Http\Controllers\Admin\orderController;
use App\Http\Controllers\Admin\tableController;
use App\Http\Controllers\ajaxController;
use App\Http\Controllers\homeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\settingController;
use Illuminate\Support\Facades\Route;

//Panel Routes

Route::middleware('auth')->prefix('panel')->name('panel.')->group(function (){

    //Order Routes
    Route::get('/', [orderController::class,'index'])->name('dashboard');
    Route::get('order/show/{id}',[orderController::class,'show'])->name('order.show');

    //Table Routes
    Route::get('tables',[tableController::class,'index'])->name('tables');
    Route::get('tables/create',[tableController::class,'create'])->name('tables.create');
    Route::post('tables/store',[tableController::class,'store'])->name('tables.store');
    Route::get('tables/edit/{table}',[tableController::class,'edit'])->name('tables.edit');
    Route::put('tables/update/{table}',[tableController::class,'update'])->name('tables.update');
    Route::delete('tables/destroy/{table}',[tableController::class,'destroy'])->name('tables.destroy');

    //Food Routes
    Route::get('food',[foodController::class,'index'])->name('food');
    Route::get('food/create',[foodController::class,'create'])->name('food.create');
    Route::post('food/store',[foodController::class,'store'])->name('food.store');
    Route::get('food/edit/{food}',[foodController::class,'edit'])->name('food.edit');
    Route::put('food/update/{food}',[foodController::class,'update'])->name('food.update');
    Route::delete('food/destroy/{food}',[foodController::class,'destroy'])->name('food.destroy');

    //Setting Routes
    Route::get('setting/edit',[settingController::class,'edit'])->name('setting.edit');
    Route::post('setting/update/{setting}',[settingController::class,'update'])->name('setting.update');
});

//Client Routes
Route::get('/', [homeController::class,'index'])->name('home');
Route::get('/order', [homeController::class,'order'])->name('order');
Route::post('/order/submit', [homeController::class,'submit'])->name('order.submit');
Route::post('/order/pay/{id}', [homeController::class,'pay'])->name('order.pay');
Route::get('/order/cancel/{id}', [homeController::class,'cancel'])->name('order.cancel');
Route::get('ajax/get/food',[ajaxController::class,'getFood']);
Route::get('ajax/order/checkDate',[ajaxController::class,'checkDate']);
//login
Route::middleware('guest')->group(function(){
    Route::get('/login',[LoginController::class,'create'])->name('login.create');
});
Route::post('/login/store',[LoginController::class,'store'])->name('login.store');
Route::middleware('auth')->delete('/logout',[LoginController::class,'destroy'])->name('login.destroy');
