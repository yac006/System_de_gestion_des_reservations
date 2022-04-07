<?php

namespace App\Http\Controllers\Notif;

use App\Http\Controllers\Controller;
use App\Models\Notification as ModelsNotification;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
Use Illuminate\Support\Facades\Notification;

class NotifController extends Controller
{
    



    public function check_demande(Request $request){
        
        if (isset($request->submit)) {

            if ($request->type_rsv == "Salle") {
                $admin_user = User::where('name' , "yacine")->get();
                $request->session()->put('admin_user' , $admin_user);
            }

            if ($request->type_rsv == "Vehicule") {
                $admin_user = User::where('name' , "ali")->get();
                $request->session()->put('admin_user' , $admin_user);
            }

            return redirect('sendNotif');
        }
    


    }




    public function send_demande(Request $request){

        if ($request->session()->has('admin_user')) {
            $admin_user = $request->session()->pull('admin_user');
            Notification::send($admin_user, new \App\Notifications\first_notif());

            echo "Notif send with success to db ....";

        }
    }





    public function mark_as_read(Request $request){

        //récuperer les notifications qui concerner "id" d'utilisateur
        $user = User::where('id' , $request->user_id)->get();

        foreach ($user->notifications as $notif) {
            $notif->markAsRead();
        }

        echo "Success ...";

    }


}