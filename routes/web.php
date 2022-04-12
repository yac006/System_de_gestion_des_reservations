<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Sessions\SessionsController;
use App\Http\Controllers\Notif\NotifController;


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
/*--------------------------- Auth Routes ----------------------------*/
Route::view('Login' , 'auth.login')->name('Login');
Route::view('Register' , 'auth.register')->name('Register');

Route::post('Login' , [ LoginController::class ,'checkUsers']);
Route::post('Register' , [ RegisterController::class ,'create']);


/*--------------------------- Sessions Routes ----------------------------*/
Route::get('getInSession' , [ SessionsController::class  , 'get_session_data']);
Route::get('storeInSession' , [ SessionsController::class  , 'store_session_data']);
Route::get('deleteInSession' , [ SessionsController::class  , 'delete_session_data'])->name('logout');


/*--------------------------- Notifications Routes ----------------------------*/
//Route::post('checkNotif' , [ NotifController::class ,'check_demande'])->name('checkNotif');
Route::post('sendNotif' , [ NotifController::class ,'send_demande'])->middleware('verification_demande_rsv')->name('sendNotif');
Route::get('markAsRead' , [NotifController::class ,'mark_as_read']);
Route::get('retriveNumNotif' , [NotifController::class ,'retrieve_notif_number']);


//---------- test ----------//
Route::view('admin_panel' , 'shards-dashboard.???????');
Route::view('users_account' , 'shards-dashboard.??????');










