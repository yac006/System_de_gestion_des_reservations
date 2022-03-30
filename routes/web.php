<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth ;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Sessions\SessionsController;


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
Route::get('storeInSession/{arr?}' , [ SessionsController::class  , 'store_session_data'])->name('storeInSession');
Route::delete('deleteInSession' , [ SessionsController::class  , 'delete_session_data']);


