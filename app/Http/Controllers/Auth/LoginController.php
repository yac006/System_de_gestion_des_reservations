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
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }




    public function checkUsers(Request $request){

        $results = User::where('email' , $request->email)->get()->first();

        if(!$results){
            session(['msg_error' => "Email ou Password incorrect !!"]);
            return view('auth.login');
        }
        if ($results->is_admin == 1) {
            // $arr =  [
            //             'name' => $results->name ,
            //             'email' => $results->email ,
            //             'token' => $results->_token ,
            // ];
            // return redirect()->route('storeInSession', $arr );

            return view('shards-dashboard.admin_panel');
        }

        return view('shards-dashboard.users_account');
    }



}
