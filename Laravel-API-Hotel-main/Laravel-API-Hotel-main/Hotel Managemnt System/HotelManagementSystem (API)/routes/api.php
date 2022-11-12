<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\CustomerController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//Room Book
Route::get('/customer/room/book/list', [CustomerController::class, 'customerRoomBookList']);

Route::post('/customer/room/book', [CustomerController::class, 'customerRoomBook']);
Route::put('/customer/room/book/edit/{id}',[CustomerController::class,'customerRoomBookEdit']);

Route::get('/customer/room/book/delete/{id}',[CustomerController::class,'customerRoomBookDelete']);

//Route::post("save",[CustomerController::class,'testData']);

//Gym
Route::get('/customer/gym/list',[CustomerController::class,'gymList']);

Route::post('/customer/gym/add',[CustomerController::class,'addGym']);
Route::put('/customer/gym/edit/{id}',[CustomerController::class,'customerGymEdit']);

Route::get('/customer/gym/delete/{id}',[CustomerController::class,'customerGymDelete']);

//Spa
Route::get('/customer/spa/list',[CustomerController::class,'spaList']);

Route::post('/customer/spa/add',[CustomerController::class,'addSpa']);
Route::put('/customer/spa/edit/{id}',[CustomerController::class,'customerSpaEdit']);
Route::get('/customer/spa/delete/{id}',[CustomerController::class,'customerSpaDelete']);

//Sign up
Route::post('/customer/signup', [CustomerController::class, 'addCustomer']);
Route::post('/customer/login',[CustomerController::class,'login']);


//review
Route::get('/customer/review/list',[CustomerController::class,'customerReviewList']);