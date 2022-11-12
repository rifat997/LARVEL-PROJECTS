<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TagController;

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

Route::get('/', [TagController::class, 'index']);
Route::post('/store', [TagController::class, 'store'])->name('store');
Route::get('/fetchAll', [TagController::class, 'fetchAll'])->name('fetchAll');
Route::delete('/delete', [TagController::class, 'delete'])->name('delete');

Route::get('/edit', [TagController::class, 'edit'])->name('edit');
Route::post('update', [TagController::class, 'update'])->name('update');