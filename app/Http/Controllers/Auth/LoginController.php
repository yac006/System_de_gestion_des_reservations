<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Controllers\Sessions\SessionsController;

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


    protected $redirectTo = RouteServiceProvider::HOME;



    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }



    public function checkUsers(Request $request){

        $results = User::where('email' , $request->email)->get();

        //Verification si l'email exist dans la bdd
        if(count($results) == 0){//change
            session(['msg_error_email' => "Email ou Mot de pass incorrect !!"]);
            return view('auth.login');
        }

        $results = $results->first();  
    
        //Verification si le mot de pass est correcte
        $check_password = Hash::check($request->password , $results->password);

        if (!$check_password) {
            session(['msg_error_pass' => 'Mot de pass ou Email incorrect !!']);
            return view('auth.login');
        }

        $email_var = $results->email ; 
        //dd($email_var);
        $request->session()->put('email_var', $email_var);

        //pass l'email d'utilisateur pour le controller (SessionsController) "store_session_data func"
        // $inst = new SessionsController;
        // $inst->store_session_data($email_var);

        return redirect('storeInSession');
    }



}
