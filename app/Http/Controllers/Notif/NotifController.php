<?php

namespace App\Http\Controllers\Notif;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
Use Illuminate\Support\Facades\Notification;

class NotifController extends Controller
{
    



    public function check_demande(Request $request){
        
        if (isset($request->submit)) {

            if ($request->type_rsv = "Salle") {
                $admin_user = User::where('name' , "yacine")->get();
                $request->session()->put('admin_user' , $admin_user);
            }

            if ($request->type_rsv = "Vehicule") {
                $admin_user = User::where('name' , "ali")->get();
                $request->session()->put('admin_user' , $admin_user);
            }

            return redirect('sendNotif');
        }
    


    }




    public function send_demande(Request $request){

        if ($request->session()->has('admin_user')) {
            $admin_user = $request->session()->get('admin_user');
            Notification::send($admin_user, new \App\Notifications\first_notif());

            echo "Notif send with success to db ....";

            redirect('showNotif');

        }
    }





    public function display_notif(Request $request){

        $user = $request->session()->get('admin_user');

        foreach ($user->notifications as $notif) {
            echo $notif->id ;
        }




    }


}
