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



    public function retrieve_all_notif()
    {

        // $all_notif_rows = Notification::where('notifiable_id' , $request->user_id)
        // ->where('type' , 'App\Notifications\first_notif')->get();

        // return response()->json($all_notif_rows);
    }


    public function display_notif_data(Request $request)
    {
        //recuperer les données de nouveau utilisateur
        $new_user_data = DB::table('employes')->join('users','num_emp','=','users.user_id')
                                                ->where('num_emp', $request->new_user_id)
                                                ->get()->first();
        return response()->json($new_user_data);
    }



    public function compte_activation(Request $request)
    {
        DB::table('users')->where('user_id', $request->new_user_id)->update(['actif' => 1]);

        return response()->json("Le compte a été Activer avec succée ....");
    }
}
