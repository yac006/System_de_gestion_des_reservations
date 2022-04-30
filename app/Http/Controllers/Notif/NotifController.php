<?php

namespace App\Http\Controllers\Notif;

use App\Http\Controllers\Controller;
use App\Models\Notification as ModelsNotification;
use Illuminate\Support\Facades\Auth;
use PhpParser\Node\Stmt\Echo_;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Notification;
use Illuminate\Support\Facades\Session;
use App\Events\new_demande_rsv ;






class NotifController extends Controller
{
    



    public function send_demande(Request $request){

        if ($request->session()->has('admin_user')) {
            //récuperer les données qui viens dans la requete ajax
            $id_user = $request->user_id ;
            $nom_exped = $request->nom_expd;
            $rsv_type = $request->type_rsv ;
            //Envoyer la demande et enregistrer les donneés dans la bdd
            $admin_user = $request->session()->get('admin_user');

            \Illuminate\Support\Facades\Notification::send($admin_user, new \App\Notifications\first_notif($nom_exped , $id_user , $rsv_type));
        
           //Récuperer le number de notifications qui concerné l'utilisateur "admin"
            $user_data = $request->session()->get('admin_user'); 
            //count number notification where read_at field = NULL
            $notif_row = Notification::where('notifiable_id' , $user_data['id'])->where('read_at' , NULL)->get();                                       
            $number_notif = count($notif_row); 
            
            //informer le server websokets de cette nouvelle notification 
            broadcast(new new_demande_rsv($number_notif));

            
        
        }

    }



    public function mark_as_read(Request $request){
        
        // récuperer les enregistrements qui concerner "id" d'utilisateur qui vien de "requéte Ajax"
        // et modifier les champs "read at" vide par le temps et la date actual
        Notification::where('notifiable_id' , $request->user_id)->where('read_at' , NULL)
                    ->update(['read_at' => now()]);

        //response with new list of notification updated 
        $all_notif_rows = Notification::where('notifiable_id' , $request->user_id)->get();                                       
                                    

        return response()->json($all_notif_rows);

    }




    public function number_notif_badge(Request $request){

        //Récuperer le number de notifications qui concerné l'utilisateur "admin"
        //count number notification where read_at field = NULL
        $notif_rows = Notification::where('notifiable_id' , $request->user_id)->where('read_at' , NULL)->get();                                       
        $number_notif = count($notif_rows); 

        return response()->json($number_notif);

    }



    public function retrieve_all_notif(Request $request)
    {
        
        $all_notif_rows = Notification::where('notifiable_id' , $request->user_id)->get();
        
        return response()->json($all_notif_rows);
    }

    

}