<?php

namespace App\Http\Controllers\MultiPages;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MultipagesController extends Controller
{
    
    //For Call
    public function store_in_session($dashboard,$Planifications,$administration,$suivi_rsv,$contact,$Demandes
                                    ,$gest_employes,$admin_rsv,$gest_sal,$gest_vehc)
    {
        session([   
            'dashboard' => $dashboard ,
            'Planifications' => $Planifications ,
            'administration' => $administration ,
            'suivi_rsv' => $suivi_rsv ,
            'contact' => $contact ,
            'Demandes' => $Demandes ,
            'gest_employes' => $gest_employes ,
            'admin_rsv' => $admin_rsv,
            'gest_salles' => $gest_sal,
            'gest_vehicules' => $gest_vehc
        ]); 
    }


    //Verifivation de type de lien cliquer 
    public function verification($param)
    {
        
        if ($param == "accueil") {
            $this->store_in_session(true,false,false,false,false,false,false,false,false,false);
    
        }elseif($param == "Planifications"){
            $this->store_in_session(false,true,false,false,false,false,false,false,false,false);

        }elseif($param == "administration"){
            $this->store_in_session(false,false,true,false,false,false,false,false,false,false);
            return redirect('getAllUsers');
            
        }elseif($param == "suivi_rsv"){
            $this->store_in_session(false,false,false,true,false,false,false,false,false,false);

        }elseif($param == "contact"){
            $this->store_in_session(false,false,false,false,true,false,false,false,false,false);
            
        }elseif($param == "Demandes"){
            $this->store_in_session(false,false,false,false,false,true,false,false,false,false);
        }
        elseif($param == "gst_employes"){
            $this->store_in_session(false,false,false,false,false,false,true,false,false,false);
        }
        elseif($param == "réservation"){
            $this->store_in_session(false,false,false,false,false,false,false,true,false,false);
        }
        elseif($param == "gst_salles"){
            $this->store_in_session(false,false,false,false,false,false,false,false,true,false);
        }
        elseif($param == "gst_vehicules"){
            $this->store_in_session(false,false,false,false,false,false,false,false,false,true);
        }

        return redirect('storeInSession');

    }//end of function
}
