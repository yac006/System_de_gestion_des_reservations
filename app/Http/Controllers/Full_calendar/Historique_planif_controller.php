<?php

namespace App\Http\Controllers\Full_calendar;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;



class Historique_planif_controller extends Controller
{



    public function show_planifications_vech()
    {
        $results = DB::select("select * from planifications as p , demandes as d , rsv_vehicules as rv
                                where p.num_demande = d.num_demande and rv.num_demande = d.num_demande
                                and d.type_dmnd = 'Vehicules'") ;

        return response()->json($results);
    }




    public function show_planifications_sal()
    {
        $results = DB::select("select * from planifications as p , demandes as d , rsv_salles as rs
                                where p.num_demande = d.num_demande and rs.num_demande = d.num_demande
                                and d.type_dmnd = 'Salles'") ;

        return response()->json($results);
    }
}
