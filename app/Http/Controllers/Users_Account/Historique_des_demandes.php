<?php

namespace App\Http\Controllers\Users_Account;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class Historique_des_demandes extends Controller
{


    public function get_demandes_data(Request $request)
    {
        $results = DB::select('select * from demandes as d , validations as v 
                                where d.num_demande = v.num_demande and d.num_emp = ?' , array($request->num_emp));
        return response()->json($results);
    }
}
