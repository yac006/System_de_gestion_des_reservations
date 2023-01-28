<?php

namespace App\Http\Controllers\ContactPage;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use App\Mail\contact_users_mail;


class ContactPgController extends Controller
{
    


    public function get_users_list()
    {
        $users_list = DB::select('select e.nom_emp , e.prenom_emp , u.user_id , u.email , u.avatar_path
                                    from users as u , employes as e where u.user_id = e.user_id');
        //dd($users_list);
        return response()->json($users_list);
    }


    public function get_data_of_selected_user(Request $request)
    {
        $user_data = DB::select('select e.nom_emp , e.prenom_emp , u.email 
                                from users as u , employes as e where u.user_id = e.user_id 
                                and u.user_id = ?' , array($request->user_id));
        $user_data = $user_data[0];

        return response()->json($user_data);
    }


    
    public function send_mail(Request $request)
    {
        //Check if internet connexion existe
        $connected = @fsockopen("www.google.com", 80); 
        //website, port  (try 80 or 443)
        if (!$connected){
            return response()->json("no_connexion"); 
            fclose($connected);
        }else {
            //Send Mail
            Mail::to($request->email)->send(new contact_users_mail($request->textarea_msg));
            return response()->json("success");
        }
        
    }

    // public function broadcast_notif(){

    // }

}
