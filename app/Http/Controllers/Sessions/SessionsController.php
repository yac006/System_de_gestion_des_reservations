<?php

namespace App\Http\Controllers\Sessions;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User ;
use Hamcrest\Arrays\IsArray;




class SessionsController extends Controller
{


    

    public function get_session_data(Request $request){
            
        if ($request->session()->has('email')) {
            //Récuperer les données d'utilisateur dans la session et enregistrer dans une Array 
            $arr =  [
                        'id' => $request->session()->pull('id') ,
                        'name' => $request->session()->pull('name') ,
                        'email' => $request->session()->pull('email'),
                        'is_admin' => $request->session()->pull('is_admin'),
                    ];  
                                    
            if ($arr['is_admin'] == 1) {
                return view('shards-dashboard.admin_panel')->with('arr' , $arr);         
            }
            return view('shards-dashboard.users_account')->with('arr' , $arr);
        }
    }



    public function store_session_data(Request $request){

        if($request->session()->has('email_var')){           
            $email_var = $request->session()->pull('email_var');
            //Récuperer  les données d'utilisateur avec l'email
            $user_data = User::where('email' , $email_var)->get()->first();
            //Stockée les données récuperer dans la session d'utilisateur   
            session([
                        'id'  => $user_data->id ,
                        'name'  => $user_data->name ,
                        'email' => $user_data->email ,
                        'is_admin' => $user_data->is_admin ,      
                    ]);            
            return redirect('getInSession');
        }

        
    }




    public function delete_session_data(){



        
    }



}
