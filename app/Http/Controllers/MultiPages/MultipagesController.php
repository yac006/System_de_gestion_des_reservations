<?php

namespace App\Http\Controllers\MultiPages;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MultipagesController extends Controller
{
    


    //Verifivation de type de lien cliquer 
    public function verification($param)
    {
        
        if ($param == "pln_salles") {
            $dashboard = false ;
            $pln_salle = true ;
            session(['dashboard' => $dashboard , 'pln_salle' => $pln_salle]);
            //return redirect('getInSession');
            return redirect('storeInSession'); 
    
        }elseif($param == "accueil"){
            $dashboard = true ;
            $pln_salle = false ;
            session(['dashboard' => $dashboard , 'pln_salle' => $pln_salle]);
            //return redirect('getInSession');
            return redirect('storeInSession'); 
        };
    }


}
