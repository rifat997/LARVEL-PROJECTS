<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AdminController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\AuthorController;

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
    return view('welcome');
});

Route::get('/admin/dashboard',[AdminController::class,'dashboard'])->name('admon.dashboard');

Route::get('/front-end',[FrontController::class,'front'])->name('front');
Route::get('/create/blog',[FrontController::class,'createBlog']);
Route::post('/create/blog',[FrontController::class,'createBlogSubmit'])->name('create.blog');
Route::get('/front/home',[FrontController::class,'home'])->name('front.home');

Route::get('/login',[AuthorController::class,'login']);
Route::post('/login',[AuthorController::class,'loginsubmit'])->name('login.submit');