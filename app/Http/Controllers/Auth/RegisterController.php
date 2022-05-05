<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use App\Models\Lasts_record;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;


class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;


    protected $redirectTo = RouteServiceProvider::HOME;

    

    public function __construct()
    {
        $this->middleware('guest');
    }


    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */


    protected function create(Request $request )
    {
        User::create([
            'name' => $request->name ,
            'email' => $request->email ,
            'password' => Hash::make($request->password),
            'remember_token' => $request->_token ,
            'is_admin' => 0 ,
            'avatar_path' => $request->avatar_path ,
        ]);

        session(['msg_success' => "Les données a été enregistrer avec succée ...."]);

        return redirect('NotifAdmin');

    }



     protected function notif_admin(Request $request )
    {
        //recuperation des données de "super admin"
        $super_admin = User::where('name' , "yacine")->get();

       //send notifications
       \Illuminate\Support\Facades\Notification::send($super_admin, new \App\Notifications\new_account_notif($super_admin->id , $super_admin->name , $super_admin->email ));  

       $last_row = User::all()->last();

       Lasts_record::create(['id_user' => $last_row->id ]);



       dd("success ...");

       return view('auth.register');
       
    }
}
