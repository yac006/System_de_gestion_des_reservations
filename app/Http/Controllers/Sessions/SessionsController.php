<?php

namespace App\Http\Controllers\Sessions;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User ;
use App\Models\Notification ;
use App\Models\Numbre_notif ;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;




class SessionsController extends Controller
{




    public function store_session_data(){
        
            if (Session::has('email_var')) {
                //Récuperer  les données d'utilisateur avec l'email
                $user_data = DB::table('employes')->join('users','num_emp','=','users.user_id')
                                                    ->where('email' , Session::get('email_var'))
                                                    ->get()->first();
                //passer l'email d'utilisateur pour fonction  "get_session_data"
                Session::put('user_email', $user_data->email) ;                
                //Stockée les données récuperer dans la session d'utilisateur
                Session::put($user_data->email , [
                                                'id'  => $user_data->user_id ,
                                                'name'  => $user_data->prenom_emp ,
                                                'email' => $user_data->email ,
                                                'id_role' => $user_data->id_role ,
                                                'actif' => $user_data->actif , 
                                                'all_fields_user' =>  $user_data 
                                            ]);
                //dd(Session::all());                                                    
                if ($user_data->id_role == 1 or $user_data->id_role == 2) {
                        return view('shards-dashboard.panneau_admin');         
                }
                return view('shards-dashboard.compte_utilisateurs');
            }       
    }




    public function delete_session_data(Request $request){
    
        if (Session::has('user_email')) {

                $request->session()->flush();                    
                // dd($request->session()->all());                      
                return redirect('Login');           
        }    
    }
}
