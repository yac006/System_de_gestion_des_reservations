<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Sessions\SessionsController;
use App\Http\Controllers\Notif\NotifController;
use App\Http\Controllers\MultiPages\MultipagesController;
use App\Http\Controllers\Full_calendar\full_calendar_controller;




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

Route::get('/', function () { return view('welcome') ;});

Auth::routes();
/*--------------------------- Auth Routes ----------------------------*/
Route::view('Login' , 'auth.login')->name('Login');
Route::view('Register' , 'auth.register')->name('Register');

Route::post('Login' , [ LoginController::class ,'checkUsers']);
Route::post('Register' , [ RegisterController::class ,'create']);


/*--------------------------- Sessions Routes ----------------------------*/
Route::get('storeInSession' , [ SessionsController::class  , 'store_session_data']);
Route::get('deleteInSession' , [ SessionsController::class  , 'delete_session_data'])->name('logout');


/*--------------------------- Notifications Routes ----------------------------*/
Route::post('sendNotif' , [ NotifController::class ,'send_demande'])->middleware('verification_demande_rsv')->name('sendNotif');
Route::get('markAsRead' , [NotifController::class ,'mark_as_read']);
//Route::get('retriveNumNotif' , [NotifController::class ,'retrieve_notif_number']);
Route::get('retriveAllNotif' , [NotifController::class ,'retrieve_all_notif']);


//---------- Full-Calendar -------------//
Route::get('calendar_view' , function(){ return view('full_calendar.calendar'); })->name('calendar_view');
        
Route::get('getData' , [ full_calendar_controller::class ,'retrieve']);
Route::get('storeData' , [ full_calendar_controller::class , 'store']);
Route::put('updateData' , [  full_calendar_controller::class, 'update']);
Route::delete('deleteData' , [ full_calendar_controller::class ,'delete']);



//---------- Multi pages  -------------//
Route::get('multiPages/{param}' , [MultipagesController::class , 'verification'] )->name('multiPages');





















