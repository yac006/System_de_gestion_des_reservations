<?php

namespace App\Http\Controllers\Validation;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Events\new_notif_validation;
use App\Models\Planification;



class validation_controller extends Controller
{

    

    public function get_validation_data(Request $request)
    {

        if ($request->id_role == 3 or $request->id_role == 4) {

            $results = DB::select("select v.num_demande , d.type_dmnd ,v.date_val , e.num_emp , e.nom_emp , v.valider, e.prenom_emp 
                                    from validations as v , employes as e , demandes as d 
                                    where e.num_emp = v.num_emp and v.num_demande = d.num_demande and d.type_dmnd = ?" , array('Vehicules'));
                
            return response()->json($results);
        }


        if ($request->id_role == 5 or $request->id_role == 6) {
            
            $results = DB::select("select v.num_demande , d.type_dmnd ,v.date_val , e.num_emp , e.nom_emp , v.valider, e.prenom_emp 
            from validations as v , employes as e , demandes as d 
            where e.num_emp = v.num_emp and v.num_demande = d.num_demande and d.type_dmnd = ?" , array('Salles'));
            
            return response()->json($results);
        } 
        
    }

    
    public function validate_demande(Request $request)
    {
        DB::table('validations')->where('num_demande' , $request->num_dmnd)->update([
            'date_val' => now(),
            'valider' => True,
            'num_emp' => $request->num_emp,
            'num_demande' => $request->num_dmnd,
            // 'created_at' => NULL,
        ]);
        /* Store var(num_emp) in session for use it in "broadcast_nbr_notif" function and in
         "planif_auto" function */
        session(['num_emp' => $request->num_emp]);
        //Store var(num_dmnd) in session for use it in "planif_auto" function
        session(['num_dmnd' => $request->num_dmnd]);
        session(['title' => "Validation de demande"]);

        //$title = "Validation de demande";
        //$body = "Votre demande de réservation a été valider par les adminstrateurs de SGR-BL";


        
        return redirect('broadcastNbrNotifusers') ;
        // return redirect()->route('broadcastNbrNotifusers', ['num_emp' => $request->num_emp]);
        //return redirect()->route('prpSendMail', ['num_emp' => $request->num_emp , 'title' => $title , 'body' => $body]);
    }


    
    public function reject_demande(Request $request)
    {
        DB::table('validations')->where('num_demande' , $request->num_dmnd)->update([
            'date_val' => now(),
            'valider' => False,
            'num_emp' => $request->num_emp,
            'num_demande' => $request->num_dmnd,
            // 'created_at' => NULL,
        ]);
        //Store var(num_emp) in session for use it in broadcast_nbr_notif function
        session(['num_emp' => $request->num_emp]);
        session(['title' => "Refuse de demande"]);
        
        //$title = "Refuse de demande";
        //$body = "Votre demande de réservation a été refuser par les adminstrateurs de SGR-BL";

        return redirect('broadcastNbrNotifusers') ;

        //return redirect()->route('broadcastNbrNotifusers', ['num_emp' => $request->num_emp]);
        //return redirect()->route('prpSendMail', ['num_emp' => $request->num_emp , 'title' => $title , 'body' => $body]);

    }

    

    // public function prepare_send_mail(Request $request)
    // {
    //     //recuperer l'email d'utilisateur
    //     $results = DB::select('select * from employes as e , users as u where 
    //                             u.user_id = e.user_id and e.num_emp = ?' , array($request->num_emp));
    //     $user_email = $results[0]->email ; 
    
    //     //Rediriger vers (Mail Controller)
    //     return redirect()->route('sendMail' , ['user_email' => $user_email , 'title' => $request->title , 'body' =>$request->body]);
    // }



    public function broadcast_nbr_notif_users(Request $request)
    { 
        $nbr_notif = DB::table('validations')->where('num_emp' , $request->session()->get('num_emp'))
                                ->where('read_at' , null)->get()->count();

        broadcast(new new_notif_validation($nbr_notif , $request->num_emp));

        return response()->json("success");


        // //verifier le genre de l'opération (validate or reject) 
        if ($request->session()->get('title') == "Validation de demande") {
            //return redirect('planifAuto');
            return response()->json("success");
        }

        if ($request->session()->get('title') == "Refuse de demande") {
            //return redirect('checkAndDeletePlan');
            return response()->json("reject");
        }
        
    }



    // public function planif_auto(Request $request)
    // {
    //     //récupérer type_dmnd dans la table "demandes" ;
    //     $type_dmnd = DB::table('demandes')->where('num_demande' , $request->session()->get('num_dmnd'))
    //                                         ->get()->first()->type_dmnd ;   

    //     if ($type_dmnd == "Vehicules") {
    //         //récupération des dates
    //         $dates = DB::table('rsv_vehicules')->where('num_demande' , $request->session()->get('num_dmnd'))
    //                                                 ->get()->first() ;
    //         $start_date = $dates->date_dep ;
    //         $end_date = $dates->date_est_retour ;

    //         //planifier
    //         DB::table('planifications')->insert([
    //             'title' => "Demande N: ".$request->session()->get('num_dmnd') ,
    //             'start_date' => $start_date ,
    //             'end_date' => $end_date ,
    //             'num_demande' => $request->session()->get('num_dmnd') ,
    //             'num_emp' => $request->session()->get('num_emp') 
    //         ]);
    //     }                   

    //     if ($type_dmnd == "Salles") {
    //         //récupération de la date rsv
    //         $date_rsv = DB::table('rsv_salles')->where('num_demande' , $request->session()->get('num_dmnd'))
    //                                             ->get()->first()->date_rsv ;
    //         //planifier
    //         DB::table('planifications')->insert([
    //             'title' => "Demande N: ".$request->session()->get('num_dmnd') ,
    //             'start_date' => $date_rsv ,
    //             'end_date' => $date_rsv ,
    //             'num_demande' => $request->session()->get('num_dmnd') ,
    //             'num_emp' => $request->session()->get('num_emp') 
    //         ]);
    //     }


    //     return response()->json("success");
    // }
    
    
    // public function check_and_delete_plan(Request $request)
    // {
    //     $results = Planification::where('num_demande' , $request->session()->get('num_dmnd'))->exists();

    //     if ($results == true) {
    //         Planification::where('num_demande' , $request->session()->get('num_dmnd'))->delete();
    //     } 

    //     return response()->json("success");
    // }


}
