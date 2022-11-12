<?php

use Illuminate\Support\Facades\Route;

use Illuminate\Support\Facades\Notification;

use App\Notifications\EmailNotification;

use App\Models\User;

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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('/send-notification', function(){
    
    /*
    ///sending mail to the first user
    $user = User::find(1);
    //$user->notify(new EmailNotification());
    Notification::send($user, new EmailNotification());
    return redirect()->back();
    */

    /*
    ///sending mail to all users
    $users = User::all();
    foreach($users as $u){
        Notification::send($u, new EmailNotification());
    }
    return redirect()->back();
    */


    ///sending mail to all users
    $users = User::all();
    foreach($users as $u){
        Notification::send($u, new EmailNotification('Aunoy', 'AIUB'));
    }
    return redirect()->back();
    
});