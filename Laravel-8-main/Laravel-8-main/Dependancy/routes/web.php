<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DependancyController;

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

Route::get('/', [DependancyController::class, 'index']);
Route::post('/getState', [DependancyController::class, 'getState']);
Route::post('/getCity', [DependancyController::class, 'getCity']);
