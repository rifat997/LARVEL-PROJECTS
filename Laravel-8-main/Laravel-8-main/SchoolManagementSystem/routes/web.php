<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\StudentController;

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

//Admin
Route::get('admin/panel',[AdminController::class,'panel'])->name('admin.panel');
Route::get('admin/login',[AdminController::class,'login']);
Route::post('admin/login',[AdminController::class,'loginSubmit'])->name('admin.login');

//Resort
Route::get('resort/list',[AdminController::class,'resortList'])->name('resort.list');

// Route::get('/abc',[AdminController::class,'list']);
// Route::post('abc',[AdminController::class,'listSubmit'])->name('submit');
//Route::get('/show/{id}',[AdminController::class,'attendances'])->name('show');
Route::get('/save',[AdminController::class,'save']);


Route::get('resort/add',[AdminController::class,'addResort']);
Route::post('resort/add',[AdminController::class,'addResortSubmit'])->name('resort.add');
Route::get('resort/delete/{id}',[AdminController::class,'deleteResort'])->name('resort.delete');
Route::get('resort/edit/{id}',[AdminController::class,'editResort'])->name('resort.edit');
Route::post('/resort/edit',[AdminController::class,'editResortSubmit'])->name('resort.edit.submit');

//customer
Route::get('customer/resort/list',[CustomerController::class,'resortList'])->name('customer.resort.list');
Route::get('customer/resort/book',[CustomerController::class,'bookResort']);
Route::post('customer/resort/book',[CustomerController::class,'bookResortSubmit'])->name('customer.resort.book');

Route::get('/student/add',[StudentController::class,'addStudent']);
Route::post('/student/add',[StudentController::class,'addStudentSubmit'])->name('student.add');
Route::get('/stduent/list',[StudentController::class,'stduentList'])->name('student.list');

Route::get('/abc',[StudentController::class,'list']);
Route::post('abc',[StudentController::class,'listSubmit'])->name('submit');

Route::get('/show/{id}',[StudentController::class,'attendances'])->name('show');

