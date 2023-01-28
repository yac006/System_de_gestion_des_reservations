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
        
            if (Session::has('user_id_var')) {
                //Récuperer  les données d'utilisateur avec l'email                                                
                $user_data = DB::select('SELECT * FROM employes as e , users as u WHERE 
                    e.user_id = u.user_id and e.user_id = ?' , array(Session::get('user_id_var')));          
                $user_data = $user_data[0];                                                                  
                //dd($user_data) ; 
                //Stockée les données récuperer dans la session d utilisateur
                Session::put($user_data->user_id , [ 
                                                'id'  => $user_data->user_id ,
                                                'name'  => $user_data->prenom_emp ,
                                                'email' => $user_data->email ,
                                                'id_role' => $user_data->id_role ,
                                                'actif' => $user_data->actif , 
                                                'all_fields_user' =>  $user_data 
                                            ]);
                //dd(Session::pull($user_data->user_id));
                //dd(Session::all());                                                    
                if ($user_data->id_role == 7) {
                        return view('shards-dashboard.compte_utilisateurs');         
                }else{
                    return view('shards-dashboard.panneau_admin');
                }
                
            }       
    }




    public function delete_session_data(Request $request){
    
        if (Session::has('user_id_var')) {

                $request->session()->flush();                    
                // dd($request->session()->all());                      
                return redirect('Login');           
        }    
    }
}
