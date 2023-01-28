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
use App\Events\new_demande_rsv;
use Illuminate\Notifications\Notification as NotificationsNotification;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;


class NotifController extends Controller
{
    


    public function store_data(Request $request)
    {

        DB::table('demandes')->insert([
            'type_dmnd' => $request->type_rsv ,
            'date_dmnd' => date('Y-m-d H:i:s') ,
            'num_emp'   => $request->num_employe ,
            //'created_at' => now()
        ]);


        DB::table('validations')->insert([
            'date_val' => NULL ,
            'valider' => NULL ,
            'num_emp'   => $request->num_employe ,
            'num_demande' => DB::table('demandes')->get()->last()->num_demande
            //'created_at' => now()
        ]);


        //Si radio button "Salles" a été choisir , inserer les données dans la table "rsv_salles" 
        if ($request->type_rsv == "Salles") {

            $num_demande = DB::table('demandes')->get()->last()->num_demande ;
            $num_sal = DB::table('salles')->where('designation' , $request->salle)->get()->first()->num_sal ;
            
            DB::table('rsv_salles')->insert([
                'theme' => $request->theme ,
                'date_rsv' => $request->date ,
                'heur_d' => $request->hr_debut ,
                'heur_f' =>  $request->hr_fin ,
                'num_demande' => $num_demande ,
                'num_sal' => $num_sal ,
                //'created_at' => now()
            ]);
        };

        //Si radio button Vehicule a été choisir , inserer les données dans la table "rsv_vehicules" 
        if ($request->type_rsv == "Vehicules") {
            
            $num_demande = DB::table('demandes')->get()->last()->num_demande ;
            $id_type = DB::table('type_vehicules')->where('type' , $request->vehicule)->get()->first()->id_type;
            // $id_vehc = DB::table('vehicules')->where('' , $request->)->get()->first()->;

            DB::table('rsv_vehicules')->insert([
                'motif' => $request->motif ,
                'dest' => $request->destination ,
                'date_rsv' => $request->date_dmnd_v ,
                'date_dep' => $request->date_dep ,
                'date_est_retour' => $request->date_retr ,
                'heure_dep' => $request->heure_dep ,
                'heure_retr' => $request->heure_retr ,
                'chauffeur' => $request->chauffeur ,
                'num_demande' =>  $num_demande ,
                'id_type' => $id_type,
                //'id_vehc' => 
            ]);

        };

        //Store "user_id" et "type_rsv" qui vien dans la requete dans la session
        $request->session()->put('expéd_user' , $request->user_id);
        $request->session()->put('type_rsv' , $request->type_rsv);


        return redirect('sendNotif');
    }



    public function send_demande(Request $request)
    {
        if ($request->session()->has('admin_users')) {
            //Récuperer array qui contien la list des admins que on veux notifier
            $admin_users = $request->session()->get('admin_users');//array

            //Récuperer les données d'utilisateur Expéditeur (qui envoyer la demande )
            $expéd_user = DB::select('select * from users as u , employes as e where e.user_id = u.user_id and u.user_id = ?' , array(Session::get('expéd_user')) ) ; 
            $expéd_user = $expéd_user[0];

            $last_num_dmnd = DB::table('demandes')->get()->last()->num_demande ;

            //Envoyer la demande pour "first admin" et enregistrer les donneés dans la table "notifications";
            \Illuminate\Support\Facades\Notification::send($admin_users['chef'], new \App\Notifications\first_notif($expéd_user->user_id , $expéd_user->nom_emp , $expéd_user->prenom_emp , Session::get('type_rsv') , $expéd_user->avatar_path));
            $last_num_notif = Notification::latest()->get()->first()->num_notif;
            DB::table('notifications')->where('notifiable_id' , $admin_users['chef']->user_id)
                                        ->where('num_notif' , $last_num_notif)
                                        ->update(['num_demande' => $last_num_dmnd]);
            //Envoyer la demande pour "secend admin" et enregistrer les donneés dans la table "notifications"
            \Illuminate\Support\Facades\Notification::send($admin_users['resp'], new \App\Notifications\first_notif($expéd_user->user_id , $expéd_user->nom_emp , $expéd_user->prenom_emp , Session::get('type_rsv') , $expéd_user->avatar_path));
            $last_num_notif = Notification::latest()->get()->first()->num_notif;
            DB::table('notifications')->where('notifiable_id' , $admin_users['resp']->user_id)
                                        ->where('num_notif' , $last_num_notif)              
                                        ->update(['num_demande' => $last_num_dmnd]);
    
            return redirect('broadcastNbrNotif');
        }//end if       
    }



    public function broadcast_nbr_notif(Request $request)
    {
        //Récuperer array qui contien la list des admins que on veux notifier
        $admin_users = $request->session()->get('admin_users');//array contien "chef" and "resp"
        /* Récuperer le number de notifications qui concerné "chef"
        and count number notification where read_at field = NULL */
        $notif_row = Notification::where('notifiable_id' , $admin_users['chef']->user_id)->where('read_at' , NULL)
        ->where('type' , 'App\Notifications\first_notif')->get();                                       
        $chef_nbr_notif = count($notif_row);
        /* Récuperer le number de notifications qui concerné "resp"
        and count number notification where read_at field = NULL */
        $notif_row = Notification::where('notifiable_id' , $admin_users['resp']->user_id)->where('read_at' , NULL)
        ->where('type' , 'App\Notifications\first_notif')->get();                                       
        $resp_nbr_notif = count($notif_row);
        //array contien nombre de notification de chaque admin ("chef" , "resp")
        $admins_nbrNotif_array = [
            "chef" => ['id' => $admin_users['chef']->user_id , 'nbr_notif' => $chef_nbr_notif] ,
            "resp" => ['id' => $admin_users['resp']->user_id , 'nbr_notif' => $resp_nbr_notif] 
        ];
        
        //informer le server websokets de cette nouvelle notification 
        broadcast(new new_demande_rsv($admins_nbrNotif_array)); 
    }



    public function mark_as_read(Request $request)
    {
        // récuperer les enregistrements qui concerner "id" d'utilisateur qui vien de "requéte Ajax"
        // et modifier les champs "read at" vide par le temps et la date actual
        Notification::where('notifiable_id' , $request->user_id)->where('read_at' , NULL)
                    ->where('type' , 'App\Notifications\first_notif')
                    ->update(['read_at' => now()]);
        //response with new list of notification updated 
        $all_notif_rows = Notification::where('notifiable_id' , $request->user_id)
                                        ->where('type' , 'App\Notifications\first_notif')->get();

        //dd($all_notif_rows);

        return response()->json($all_notif_rows);
    }



    public function number_notif_badge(Request $request)
    {
        //Récuperer le number de notifications qui concerné l'utilisateur "admin"
        //count number notification where read_at field = NULL and type = first_notif
        $notif_rows = Notification::where('notifiable_id' , $request->user_id)->where('read_at' , NULL)
        ->where('type' , 'App\Notifications\first_notif')->get();                                       
        $number_notif = count($notif_rows); 

        return response()->json($number_notif);
    }



    public function retrieve_all_notif(Request $request)
    {
        $all_notif_rows = Notification::where('notifiable_id' , $request->user_id)
        ->where('type' , 'App\Notifications\first_notif')->get();
        
        return response()->json($all_notif_rows);
    }


    
    public function display_notif_data(Request $request)
    {
        $num_dmnd = DB::table('notifications')->where('num_notif' , $request->notif_id)->get()->first()->num_demande;

        //récuperer "num_demande" avec le "num_nontif" qui vien dans la requete ajax
        $tb_demande_row = DB::table('demandes')->where('num_demande' , $num_dmnd)->get()->first();


        if ($tb_demande_row->type_dmnd == "Salles") {
            $demande_salle_data = DB::select("select * from demandes as d , rsv_salles as rs , salles as s
            where rs.num_demande = d.num_demande and s.num_sal = rs.num_sal and rs.num_demande = ?" ,array($tb_demande_row->num_demande) );

            return response()->json($demande_salle_data);
        }
        
        
        if ($tb_demande_row->type_dmnd == "Vehicules") {
            $demande_vehc_data = DB::select("select * from demandes as d , rsv_vehicules as rv , type_vehicules as t
            where rv.num_demande = d.num_demande and rv.id_type = t.id_type  and d.num_demande = ?" , array($tb_demande_row->num_demande) );
        
            return response()->json($demande_vehc_data);
        }
        
    }




}
