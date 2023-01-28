<?php

namespace App\Http\Controllers\Notif;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class user_accounte_notif_cont extends Controller
{
    

    
    public function mark_as_read(Request $request)
    {
        /* récuperer les enregistrements qui concerner "num_emp" qui vien de "requéte Ajax"
        et modifier les champs "read at" vide par le temps et la date actual */
        DB::table('validations')->where('num_emp', $request->num_emp)->where('read_at' , NULL)
        ->where('valider' , True)
        ->orWhere('valider' , False)
        ->update(['read_at' => now()]); 


        //récuperer tout les validation qui concerne "num_emp" qui vien de "requéte Ajax" 
        $list_validations = DB::table('validations')->where('num_emp', $request->num_emp)
                                                    ->where('valider' , True)
                                                    ->orWhere('valider' , False)
                                                    ->get();

        return response()->json($list_validations);
    }



    public function number_notif_badge(Request $request)
    {

        /* Récuperer le number de notifications qui concerné l'utilisateur 
        count number notification where read_at field = NULL and user_id = user_id qui vienne dans la requete ajax */
        $nbr_notif_1 = DB::table('validations')->where('num_emp' , $request->num_emp)
                                            ->where('read_at' , NULL)
                                            ->get()->count();
        $nbr_notif_2 = DB::table('validations')->where('num_emp' , $request->num_emp)
                                            ->where('read_at' , NULL)
                                            ->where('valider' , NULL)
                                            ->get()->count();
        $nbr_notif = $nbr_notif_1 - $nbr_notif_2;
        
        return response()->json($nbr_notif);
    }





}
