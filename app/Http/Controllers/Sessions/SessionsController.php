<?php

namespace App\Http\Controllers\Sessions;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User ;
use App\Models\Notification ;
use App\Models\Numbre_notif ;




class SessionsController extends Controller
{


    

    public function get_session_data(Request $request){
            
        if ($request->session()->has('email')) {
            //Récuperer les données d'utilisateur dans la session et enregistrer dans une Array 
            $arr =  [
                        'id' => $request->session()->get('id') ,
                        'name' => $request->session()->get('name') ,
                        'email' => $request->session()->get('email'),
                        'is_admin' => $request->session()->get('is_admin'),
                        'my_array' => $request->session()->get('all_user_data'),                                                                                                           
                    ];
            //convert array to object array        
            $arr = (object)$arr ;


            if ($arr->is_admin == 1) {
                return view('shards-dashboard.panneau_admin')->with('arr' , $arr);         
            }
            return view('shards-dashboard.compte_utilisateurs')->with('arr' , $arr);
        }
    }



    public function store_session_data(Request $request){

        if($request->session()->has('email_var')){           
            $email_var = $request->session()->get('email_var');
            //Récuperer  les données d'utilisateur avec l'email
            $user_data = User::where('email' , $email_var)->get()->first();
            //Stockée les données récuperer dans la session d'utilisateur   
            session([
                        'id'  => $user_data->id ,
                        'name'  => $user_data->name ,
                        'email' => $user_data->email ,
                        'is_admin' => $user_data->is_admin ,
                        'all_user_data' =>  $user_data      
                    ]);            
            return redirect('getInSession');
        }

        
    }




    public function delete_session_data(Request $request){

        if ($request->session()->has('email')) {

                $request->session()->forget('id');
                $request->session()->forget('name');
                $request->session()->forget('email');
                $request->session()->forget('is_admin');
                //------------//
                $request->session()->forget('email_var');
                $request->session()->forget('notif_rows'); 
                
                return view('auth.login');
        }
        
    }



}
