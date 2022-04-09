<?php

namespace App\Http\Controllers\Notif;

use App\Http\Controllers\Controller;
use App\Models\Notification as ModelsNotification;
use Illuminate\Support\Facades\Auth;
use PhpParser\Node\Stmt\Echo_;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Notification;






class NotifController extends Controller
{
    



    public function send_demande(Request $request){

        if ($request->session()->has('admin_user')) {
            $admin_user = $request->session()->get('admin_user');
            \Illuminate\Support\Facades\Notification::send($admin_user, new \App\Notifications\first_notif());

            echo "Notif send with success and saved in db ....";
        }
    }



    public function mark_as_read(Request $request){

        // récuperer les enregistrements qui concerner "id" d'utilisateur qui vien de "requéte Ajax"
        // et modifier les champs "read at" vide par le temps et la date actual
        Notification::where('notifiable_id' , $request->user_id)->where('read_at' , NULL)
                    ->update(['read_at' => now()]);

        //response with new number notif who updated 
        $notif_row = Notification::where('notifiable_id' , $request->user_id)->where('read_at' , NULL)->get();                                       
        $new_number_notif = count($notif_row);                              

        return response()->json($new_number_notif);

    }



    public function retrieve_notif_number(Request $request){

        //Récuperer le number de notifications qui concerné l'utilisateur
        $notif_row = Notification::where('notifiable_id' , $request->user_id)->where('read_at' , NULL)->get();                                       
        $number_notif = count($notif_row);   

        return response()->json($number_notif);
    }
            
    
    

}