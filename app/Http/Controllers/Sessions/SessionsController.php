<?php

namespace App\Http\Controllers\Sessions;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User ;
use App\Models\Notification ;
use App\Models\Numbre_notif ;
use Illuminate\Support\Facades\Session;




class SessionsController extends Controller
{




    public function get_session_data(){
        
        if (Session::has('user_email')) {
            //recuperer l'email qui a été pass de "store_session_data"
            $email = Session::get('user_email');
            //retrieve array with session key (email)
            $session_arr = Session::get($email);
            //dd($session_arr);
            //Récuperer les données d'utilisateur dans la session et enregistrer dans une Array 
            $arr =  [
                        'id' => $session_arr['id'] ,
                        'name' => $session_arr['name'] ,
                        'email' => $session_arr['email'],
                        'is_admin' => $session_arr['is_admin'],
                        'all_fields_user' => $session_arr['all_fields_user']->first(),                                                                                                           
                    ];
            //convert array to object array        
            $arr = (object)$arr ; 
            
            if ($arr->is_admin == 1) {
                    return view('shards-dashboard.panneau_admin')->with('arr' , $arr);         
            }
            return view('shards-dashboard.compte_utilisateurs')->with('arr' , $arr);
        }
            
    }



    public function store_session_data(){
        
            if (Session::has('email_var')) {
                //Récuperer  les données d'utilisateur avec l'email
                $user_data = User::where('email' , Session::get('email_var'))->get()->first();
                //passer l'email d'utilisateur pour fonction  "get_session_data"
                Session::put('user_email', $user_data->email) ;                
                //Stockée les données récuperer dans la session d'utilisateur
                Session::put($user_data->email , [
                                                'id'  => $user_data->id ,
                                                'name'  => $user_data->name ,
                                                'email' => $user_data->email ,
                                                'is_admin' => $user_data->is_admin ,
                                                'all_fields_user' =>  $user_data  
                                            ]);
                //dd(Session::all());                                                    
                return redirect('getInSession'); 
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
