<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomerController;

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

Route::get('/', function () {
    return view('new/pp');
});


Route::get('/customer/add', [CustomerController::class, 'addCustomer'])->name('customer.add');
Route::post('/customer/add', [CustomerController::class, 'addCustomerSubmit'])->name('customer.add.submit');













Route::get('/customer/getcustomer',[CustomerController::class, 'getCustomer']);
Route::get('/customer/customerList/{name}/{id}',[CustomerController::class, 'customerList']);
Route::get('/customer/customerName/{id}',[CustomerController::class, 'customer']);

Route::get('/customer/{name}/{id}',[CustomerController::class, 'dynamicCustomer']);
