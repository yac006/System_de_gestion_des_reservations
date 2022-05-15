<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Events\new_account;


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


    protected function create(Request $request)
    {
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'remember_token' => $request->_token,
            'is_admin' => 0,
            'avatar_path' => $request->avatar_path,
        ]);

        session(['msg_success' => "Les données a été enregistrer avec succée ...."]);

        return redirect('NotifAdmin');
    }



    protected function notif_admin(Request $request)
    {
        //recuperation des données de "super admin"
        $super_admin = User::where('name', "yacine")->get()->first();
        //recuperation des données de "dernier nouveau compte"
        $last_row = User::all()->last();
        //send notifications (save in Notification table)
        \Illuminate\Support\Facades\Notification::send($super_admin , new \App\Notifications\new_account_notif( $last_row->id , $last_row->email , $last_row->created_at ) );
        //Récuperer le number de notifications qui concerné "Super admin"
        //count number notification where read_at field = NULL and type = (new_account_notif)
        $notif_row = Notification::where('notifiable_id' , $super_admin['id'])->where('read_at' , NULL)
        ->where('type' , 'App\Notifications\new_account_notif')->get(); 
        $number_notif = count($notif_row); 
        //informer le server websokets de nombre notification  
        broadcast(new new_account($number_notif)); 


        return view('auth.register');
    }
}
