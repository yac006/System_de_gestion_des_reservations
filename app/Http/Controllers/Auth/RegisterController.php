<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Events\new_account;
use App\Models\Notification;
use App\Models\User;



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
                        'pseudo' => $request->pseudo,
                        'email' => $request->email,
                        'password' => Hash::make($request->password),
                        'avatar_path' => $request->avatar_path ,
                    ]);
        //Recuperation de user_id et num_secteur dans la table users et la table secteurs                            
        $user = DB::table('users')->where('pseudo' , $request->pseudo)->get()->first(); 
        $depart = DB::table('secteurs')->where('nom_secteur' , $request->depart)->get()->first();                           

        DB::table('employes')->insert([
                                        'nom_emp' => $request->nom_emp ,
                                        'prenom_emp' => $request->prenom_emp ,
                                        'poste' => $request->poste ,
                                        'type' => $request->inlineRadioOptions ,
                                        'tele' => $request->tele ,
                                        'num_secteur' => $depart->num_secteur,
                                        'user_id' => $user->user_id 
                                    ]);

        session(['msg_success' => "Les données a été enregistrer avec succée ...."]);

        return redirect('NotifAdmin');
    }



    protected function notif_admin(Request $request)
    {
        // //recuperation des données de "super admin"
        $super_admin = User::where('id_role', 1)->get()->first();
        // //recuperation des données de "dernier nouveau compte"
        $last_row = DB::table('users')->get()->last();
        // //send notifications (save in Notification table)
        \Illuminate\Support\Facades\Notification::send($super_admin , new \App\Notifications\new_account_notif( $last_row->user_id , $last_row->email , $last_row->created_at ) );
        // //Récuperer le number de notifications qui concerné "Super admin"
        // //count number notification where read_at field = NULL and type = (new_account_notif)
        $notif_row = Notification::where('notifiable_id' , $super_admin->user_id)->where('read_at' , NULL)
        ->where('type' , 'App\Notifications\new_account_notif')->get(); 
        $number_notif = count($notif_row); 
        // //informer le server websokets de nombre notification  
        broadcast(new new_account($number_notif)); 


        return view('auth.register');
    }
}
