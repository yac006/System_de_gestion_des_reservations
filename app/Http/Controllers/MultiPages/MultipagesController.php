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
            $administration = false ;
            $suivi_rsv = false ;
            $contact = false ;
            session([   
                'dashboard' => $dashboard ,
                'pln_salle' => $pln_salle ,
                'administration' => $administration ,
                'suivi_rsv' => $suivi_rsv ,
                'contact' => $contact
            ]);
            
            return redirect('storeInSession'); 
    
        }elseif($param == "accueil"){
            $dashboard = true ;
            $pln_salle = false ;
            $administration = false ;
            $suivi_rsv = false ;
            $contact = false ;
            session([   
                'dashboard' => $dashboard ,
                'pln_salle' => $pln_salle ,
                'administration' => $administration ,
                'suivi_rsv' => $suivi_rsv ,
                'contact' => $contact
            ]);

            return redirect('storeInSession'); 

        }elseif($param == "administration"){
            $dashboard = false ;
            $pln_salle = false ;
            $administration = true ;
            $suivi_rsv = false ;
            $contact = false ;
            session([   
                        'dashboard' => $dashboard ,
                        'pln_salle' => $pln_salle ,
                        'administration' => $administration ,
                        'suivi_rsv' => $suivi_rsv ,
                        'contact' => $contact
                    ]);

            return redirect('storeInSession'); 

        }elseif($param == "suivi_rsv"){
            $dashboard = false ;
            $pln_salle = false ;
            $administration = false ;
            $suivi_rsv = true ;
            $contact = false ;
            session([   
                        'dashboard' => $dashboard ,
                        'pln_salle' => $pln_salle ,
                        'administration' => $administration ,
                        'suivi_rsv' => $suivi_rsv ,
                        'contact' => $contact
                    ]);

            return redirect('storeInSession'); 

        }elseif($param == "contact"){
            $dashboard = false ;
            $pln_salle = false ;
            $administration = false ;
            $suivi_rsv = false ;
            $contact = true ;
            session([   
                        'dashboard' => $dashboard ,
                        'pln_salle' => $pln_salle ,
                        'administration' => $administration ,
                        'suivi_rsv' => $suivi_rsv ,
                        'contact' => $contact
                    ]);

            return redirect('storeInSession'); 
        }


    }//end of function
}
