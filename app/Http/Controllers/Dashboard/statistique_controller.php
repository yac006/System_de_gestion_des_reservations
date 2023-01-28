<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;



class statistique_controller extends Controller
{
    

    public function count_nbr_rsv_salles()  
    {
        $value_1 = DB::table('rsv_salles')->where('num_sal' , 1)->get()->count();
        $value_2 = DB::table('rsv_salles')->where('num_sal' , 2)->get()->count();
        $value_3 = DB::table('rsv_salles')->where('num_sal' , 3)->get()->count();

        return response()->json([
                                    'value_1' => $value_1 ,
                                    'value_2' => $value_2 ,
                                    'value_3' => $value_3 
                                ]);
    }


    public function count_nbr_rsv_vehicules()  
    {
        $value_1 = DB::table('rsv_vehicules')->where('id_type' , 1)->get()->count();
        $value_2 = DB::table('rsv_vehicules')->where('id_type' , 2)->get()->count();
        $value_3 = DB::table('rsv_vehicules')->where('id_type' , 3)->get()->count();

        return response()->json([
                                    'value_1' => $value_1 ,
                                    'value_2' => $value_2 ,
                                    'value_3' => $value_3 
                                ]);
    }



    public function count_nbr_emp_in_secteur()  
    {
        $value_1 = DB::table('employes')->where('num_secteur' , 1)->get()->count();
        $value_2 = DB::table('employes')->where('num_secteur' , 2)->get()->count();
        $value_3 = DB::table('employes')->where('num_secteur' , 3)->get()->count();
        $value_4 = DB::table('employes')->where('num_secteur' , 4)->get()->count();
        $value_5 = DB::table('employes')->where('num_secteur' , 5)->get()->count();
        $value_6 = DB::table('employes')->where('num_secteur' , 6)->get()->count();
        $value_7 = DB::table('employes')->where('num_secteur' , 7)->get()->count();
        $value_8 = DB::table('employes')->where('num_secteur' , 8)->get()->count();
        $value_9 = DB::table('employes')->where('num_secteur' , 9)->get()->count();
        $value_10 = DB::table('employes')->where('num_secteur' , 10)->get()->count();
        $value_11 = DB::table('employes')->where('num_secteur' , 11)->get()->count();
        $value_12 = DB::table('employes')->where('num_secteur' , 12)->get()->count();

        return response()->json([
                                    'value_1' => $value_1 ,
                                    'value_2' => $value_2 ,
                                    'value_3' => $value_3 ,
                                    'value_4' => $value_4 ,
                                    'value_5' => $value_5 ,
                                    'value_6' => $value_6 ,
                                    'value_7' => $value_7 ,
                                    'value_8' => $value_8 ,
                                    'value_9' => $value_9 ,
                                    'value_10' => $value_10 ,
                                    'value_11' => $value_11 ,
                                    'value_12' => $value_12 ,
                                ]);
    }

    //For Call
    public function get_nbr_vald_valider($dmnds_valider)
    {
        $array_month = [];

        for ($i=0; $i < count($dmnds_valider) ; $i++) { 
            $expld_array = explode('-' , $dmnds_valider[$i]->date_val);
            $arr[$i] = $expld_array[1];

            if ($arr[$i] == '01') {
                $array_month[$i] = 'jan'; 
            }
            if ($arr[$i] == '02') {
                $array_month[$i] = 'fev'; 
            }
            if ($arr[$i] == '03') {
                $array_month[$i] = 'mar'; 
            }
            if ($arr[$i] == '04') {
                $array_month[$i] = 'avr'; 
            }
            if ($arr[$i] == '05') {
                $array_month[$i] = 'mai'; 
            }
            if ($arr[$i] == '06') {
                $array_month[$i] = 'jui'; 
            }
            if ($arr[$i] == '07') {
                $array_month[$i] = 'jul'; 
            }
            if ($arr[$i] == '08') {
                $array_month[$i] = 'aou'; 
            }
            if ($arr[$i] == '09') {
                $array_month[$i] = 'sep'; 
            }
            if ($arr[$i] == '10') {
                $array_month[$i] = 'oct'; 
            }
            if ($arr[$i] == '11') {
                $array_month[$i] = 'nov'; 
            }
            if ($arr[$i] == '12') {
                $array_month[$i] = 'dec'; 
            }

        }//end for

        $v_jan = 0;
        $v_fev = 0;
        $v_mar = 0;
        $v_avr = 0;
        $v_mai = 0;
        $v_jui = 0;
        $v_jul = 0;
        $v_aou = 0;
        $v_sep = 0;
        $v_oct = 0;
        $v_nov = 0;
        $v_dec = 0;


        for ($i=0; $i < count($array_month) ; $i++) {

            if($array_month[$i] == "jan"){
                $v_jan = $v_jan + 1;
            }
            if($array_month[$i] == "fev"){
                $v_fev = $v_fev + 1;
            }
            if($array_month[$i] == "mar"){
                $v_mar  = $v_mar + 1;
            }
            if($array_month[$i] == "avr"){
                $v_avr = $v_avr + 1;
            }
            if($array_month[$i] == "mai"){
                $v_mai = $v_mai + 1;
            }
            if($array_month[$i] == "jui"){
                $v_jui = $v_jui + 1;
            }
            if($array_month[$i] == "jul"){
                $v_jul = $v_jul + 1;
            }
            if($array_month[$i] == "aou"){
                $v_aou = $v_aou + 1;
            }
            if($array_month[$i] == "sep"){
                $v_sep = $v_sep + 1;
            }
            if($array_month[$i] == "oct"){
                $v_oct = $v_oct + 1;
            }
            if($array_month[$i] == "nov"){
                $v_nov = $v_nov + 1;
            }
            if($array_month[$i] == "dec"){
                $v_dec = $v_dec + 1;
            }
        }

        //dd($v_jan);

        return response()->json([
            'v_jan' => $v_jan,
            'v_fev' => $v_fev,
            'v_mar'  => $v_mar,
            'v_avr' => $v_avr,
            'v_mai' => $v_mai,
            'v_jui' => $v_jui,
            'v_jul' => $v_jul,
            'v_aou' => $v_aou,
            'v_sep' => $v_sep,
            'v_oct' => $v_oct,
            'v_nov' => $v_nov,
            'v_dec' => $v_dec,
        ]);

    }


    //For Call
    public function get_nbr_vald_refuser($dmnds_refuser)
    {
        $array_month = [];

        for ($i=0; $i < count($dmnds_refuser) ; $i++) { 
            $expld_array = explode('-' , $dmnds_refuser[$i]->date_val);
            $arr[$i] = $expld_array[1];

            if ($arr[$i] == '01') {
                $array_month[$i] = 'jan'; 
            }
            if ($arr[$i] == '02') {
                $array_month[$i] = 'fev'; 
            }
            if ($arr[$i] == '03') {
                $array_month[$i] = 'mar'; 
            }
            if ($arr[$i] == '04') {
                $array_month[$i] = 'avr'; 
            }
            if ($arr[$i] == '05') {
                $array_month[$i] = 'mai'; 
            }
            if ($arr[$i] == '06') {
                $array_month[$i] = 'jui'; 
            }
            if ($arr[$i] == '07') {
                $array_month[$i] = 'jul'; 
            }
            if ($arr[$i] == '08') {
                $array_month[$i] = 'aou'; 
            }
            if ($arr[$i] == '09') {
                $array_month[$i] = 'sep'; 
            }
            if ($arr[$i] == '10') {
                $array_month[$i] = 'oct'; 
            }
            if ($arr[$i] == '11') {
                $array_month[$i] = 'nov'; 
            }
            if ($arr[$i] == '12') {
                $array_month[$i] = 'dec'; 
            }

        }//end for

        $v_jan = 0;
        $v_fev = 0;
        $v_mar = 0;
        $v_avr = 0;
        $v_mai = 0;
        $v_jui = 0;
        $v_jul = 0;
        $v_aou = 0;
        $v_sep = 0;
        $v_oct = 0;
        $v_nov = 0;
        $v_dec = 0;


        for ($i=0; $i < count($array_month) ; $i++) {

            if($array_month[$i] == "jan"){
                $v_jan = $v_jan + 1;
            }
            if($array_month[$i] == "fev"){
                $v_fev = $v_fev + 1;
            }
            if($array_month[$i] == "mar"){
                $v_mar  = $v_mar + 1;
            }
            if($array_month[$i] == "avr"){
                $v_avr = $v_avr + 1;
            }
            if($array_month[$i] == "mai"){
                $v_mai = $v_mai + 1;
            }
            if($array_month[$i] == "jui"){
                $v_jui = $v_jui + 1;
            }
            if($array_month[$i] == "jul"){
                $v_jul = $v_jul + 1;
            }
            if($array_month[$i] == "aou"){
                $v_aou = $v_aou + 1;
            }
            if($array_month[$i] == "sep"){
                $v_sep = $v_sep + 1;
            }
            if($array_month[$i] == "oct"){
                $v_oct = $v_oct + 1;
            }
            if($array_month[$i] == "nov"){
                $v_nov = $v_nov + 1;
            }
            if($array_month[$i] == "dec"){
                $v_dec = $v_dec + 1;
            }
        }

        //dd($v_jan);

        return response()->json([
            'v_jan' => $v_jan,
            'v_fev' => $v_fev,
            'v_mar'  => $v_mar,
            'v_avr' => $v_avr,
            'v_mai' => $v_mai,
            'v_jui' => $v_jui,
            'v_jul' => $v_jul,
            'v_aou' => $v_aou,
            'v_sep' => $v_sep,
            'v_oct' => $v_oct,
            'v_nov' => $v_nov,
            'v_dec' => $v_dec,
        ]);

    }


    //For Call
    public function get_nbr_created_accounts($comptes_creer)
    {
        $array_month = [];

        for ($i=0; $i < count($comptes_creer) ; $i++) { 
            $expld_array = explode('-' , $comptes_creer[$i]->created_at);
            $arr[$i] = $expld_array[1];

            if ($arr[$i] == '01') {
                $array_month[$i] = 'jan'; 
            }
            if ($arr[$i] == '02') {
                $array_month[$i] = 'fev'; 
            }
            if ($arr[$i] == '03') {
                $array_month[$i] = 'mar'; 
            }
            if ($arr[$i] == '04') {
                $array_month[$i] = 'avr'; 
            }
            if ($arr[$i] == '05') {
                $array_month[$i] = 'mai'; 
            }
            if ($arr[$i] == '06') {
                $array_month[$i] = 'jui'; 
            }
            if ($arr[$i] == '07') {
                $array_month[$i] = 'jul'; 
            }
            if ($arr[$i] == '08') {
                $array_month[$i] = 'aou'; 
            }
            if ($arr[$i] == '09') {
                $array_month[$i] = 'sep'; 
            }
            if ($arr[$i] == '10') {
                $array_month[$i] = 'oct'; 
            }
            if ($arr[$i] == '11') {
                $array_month[$i] = 'nov'; 
            }
            if ($arr[$i] == '12') {
                $array_month[$i] = 'dec'; 
            }

        }//end for

        $v_jan = 0;
        $v_fev = 0;
        $v_mar = 0;
        $v_avr = 0;
        $v_mai = 0;
        $v_jui = 0;
        $v_jul = 0;
        $v_aou = 0;
        $v_sep = 0;
        $v_oct = 0;
        $v_nov = 0;
        $v_dec = 0;


        for ($i=0; $i < count($array_month) ; $i++) {

            if($array_month[$i] == "jan"){
                $v_jan = $v_jan + 1;
            }
            if($array_month[$i] == "fev"){
                $v_fev = $v_fev + 1;
            }
            if($array_month[$i] == "mar"){
                $v_mar  = $v_mar + 1;
            }
            if($array_month[$i] == "avr"){
                $v_avr = $v_avr + 1;
            }
            if($array_month[$i] == "mai"){
                $v_mai = $v_mai + 1;
            }
            if($array_month[$i] == "jui"){
                $v_jui = $v_jui + 1;
            }
            if($array_month[$i] == "jul"){
                $v_jul = $v_jul + 1;
            }
            if($array_month[$i] == "aou"){
                $v_aou = $v_aou + 1;
            }
            if($array_month[$i] == "sep"){
                $v_sep = $v_sep + 1;
            }
            if($array_month[$i] == "oct"){
                $v_oct = $v_oct + 1;
            }
            if($array_month[$i] == "nov"){
                $v_nov = $v_nov + 1;
            }
            if($array_month[$i] == "dec"){
                $v_dec = $v_dec + 1;
            }
        }

        //dd($v_jan);

        return response()->json([
            'v_jan' => $v_jan,
            'v_fev' => $v_fev,
            'v_mar'  => $v_mar,
            'v_avr' => $v_avr,
            'v_mai' => $v_mai,
            'v_jui' => $v_jui,
            'v_jul' => $v_jul,
            'v_aou' => $v_aou,
            'v_sep' => $v_sep,
            'v_oct' => $v_oct,
            'v_nov' => $v_nov,
            'v_dec' => $v_dec,
        ]);

    }


    public function count_nbr_validations_in_month(Request $request)
    {

        if ($request->id_role == 3 or $request->id_role == 4) {
            $dmnds_valider = DB::select("select * from validations as v , demandes as d 
                                    where v.num_demande = d.num_demande and d.type_dmnd = 'Vehicules' and valider = 'True'");
            $dmnds_refuser = DB::select("select * from validations as v , demandes as d 
                                    where v.num_demande = d.num_demande and d.type_dmnd = 'Vehicules' and valider = 'False'");
        
            return response()->json([
                'nbr_vald_valider' => $this->get_nbr_vald_valider($dmnds_valider),
                'nbr_vald_refuser' => $this->get_nbr_vald_refuser($dmnds_refuser)
            ]);                          
        }


        if ($request->id_role == 5 or $request->id_role == 6) {
            $dmnds_valider = DB::select("select * from validations as v , demandes as d 
                                    where v.num_demande = d.num_demande and d.type_dmnd = 'Salles' and valider = 'True'");
            $dmnds_refuser = DB::select("select * from validations as v , demandes as d 
                                    where v.num_demande = d.num_demande and d.type_dmnd = 'Salles' and valider = 'False'");

            return response()->json([
                'nbr_vald_valider' => $this->get_nbr_vald_valider($dmnds_valider),
                'nbr_vald_refuser' => $this->get_nbr_vald_refuser($dmnds_refuser)
            ]);
        
        }


        if ($request->id_role == 1 or $request->id_role == 2) {
            $comptes_creer = DB::table('users')->get();
            return response()->json(['nbr_comptes_creer' => $this->get_nbr_created_accounts($comptes_creer)]);   
        }

    
    }//end func



}



