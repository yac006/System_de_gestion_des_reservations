<?php

namespace App\Http\Controllers\Notif;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Notification;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class New_account_notif_cont extends Controller
{



    public function mark_as_read()
    {
        //recuperation des données de "super admin"
        $super_admin = DB::table('users')->where('id_role', 1)->get()->first();
        //Modifier les champs "read at" vide , par le temps et la date actual
        Notification::where('notifiable_id', $super_admin->user_id)->where('read_at', NULL)->where('type', 'App\Notifications\new_account_notif')->update(['read_at' => now()]);
        //response with new list of notification updated 
        $all_notif_rows = Notification::where('notifiable_id', $super_admin->user_id)->where('type', 'App\Notifications\new_account_notif')->get();

        return response()->json($all_notif_rows);
    }



    public function number_notif_badge()
    {
        //recuperation des données de "super admin"
        $super_admin = DB::table('users')->where('id_role', 1)->get()->first();
        //Récuperer le number de notifications qui concerné l'utilisateur "Super admin"
        //count number notification where read_at field = NULL and type = New_account_notif
        $notif_rows = Notification::where('notifiable_id', $super_admin->user_id)->where('read_at', NULL)
            ->where('type', 'App\Notifications\new_account_notif')->get();
        $number_notif = count($notif_rows);

        return response()->json($number_notif);
    }


    

    public function display_notif_data(Request $request)
    {
        //recuperer les données de nouveau utilisateur
        $new_user_data = DB::select('select * from employes as e , users as u where e.user_id = u.user_id and e.user_id = ?' , array($request->new_user_id));
        $new_user_data = $new_user_data[0];
        //dd($new_user_data);
        return response()->json($new_user_data);
    }



    public function compte_activation(Request $request)
    {
        DB::table('users')->where('user_id', $request->new_user_id)->update(['actif' => True]);

        return response()->json("Le compte est désormais actif....");
    }
}
