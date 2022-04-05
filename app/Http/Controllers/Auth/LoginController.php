<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use App\Models\User;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     * 
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }




    public function checkUsers(Request $request){

        $results = User::where('email' , $request->email)->get();

        if(count($results) == 0){//change
            session(['msg_error' => "Email ou Password incorrect !!"]);
            return view('auth.login');
        }
          ///Reste Si le mot de pass est Faut !!!

        $results = $results->first();
        
        $email_var = $results->email ;           
        //Stocke this variable in session
        session(['email_var' => $email_var]);

        return redirect('storeInSession');
    }



}
