<?php

namespace App\Http\Controllers\Full_calendar;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Planification;

class full_calendar_controller extends Controller
{

    
        public function retrieve(){
            
            $arr = [];

            foreach(Planification::where('num_emp' , 1)->get() as $item){
                $data = [
                            "id_plan" => $item->id_pln ,
                            "title" => $item->title ,
                            "start" => $item->start_date ,
                            "end" => $item->end_date ,
                        ];                                                
                array_push($arr , $data);
            }
            return response()->json($arr); 
        }



        public function store(Request $request){
            //récuperer le "num_emp" qui concérne num_demande qui vien de la requete ajax
            $num_emp = DB::table('demandes')->where('num_demande' , $request->num_demande)->get()->first()->num_emp;

            Planification::create([
                'title' => $request->title ,
                'start_date' => $request->start ,
                'end_date' => $request->end ,
                'num_demande' =>  $request->num_demande ,
                'num_emp' =>  $num_emp,
            ]);

            return response()->json(["success" => "added"]);
        }



        public function update(Request $request){
            $record = Planification::where('title' , $request->title) ;

            $record->update(['start_date' => $request->start ]);
            $record->update(['end_date' => $request->end ]);
        }



        public function delete(Request $request){

            $num_dmnd = intval(str_replace('Demande N:', '', $request->title));
            
            Planification::where('num_demande' , $num_dmnd)->delete() ;
        }



        public function retrieve_list_num_dmnd(Request $request)
        {
            if (($request->user_id_role == 3) or ($request->user_id_role == 4)) {
                $list_dmnd = DB::select('select * from demandes as d , employes as e 
                                        where d.num_emp = e.num_emp and d.type_dmnd = ?' , array('Vehicules'));
            }

            if (($request->user_id_role == 5) or ($request->user_id_role == 6)) {
                $list_dmnd = DB::select('select * from demandes as d , employes as e 
                                        where d.num_emp = e.num_emp and d.type_dmnd = ?' , array('Salles'));
            }

            return response()->json($list_dmnd);  
        }


        public function retrieve_sal_plan_data()
        {
            $results = DB::select("select * from planifications as p , demandes as d  where p.num_demande = d.num_demande and d.type_dmnd='Salles'");
            //dd($results);
            $arr = [];

            foreach($results as $item){
                $data = [
                            "id_plan" => $item->id_pln ,
                            "title" => $item->title ,
                            "start" => $item->start_date ,
                            "end" => $item->end_date ,
                            "num_demande" => $item->num_demande ,
                            "num_emp" => $item->num_emp,
                            "type_dmnd" => $item->type_dmnd,
                            "date_dmnd" => $item->date_dmnd,
                            
                        ];                                                
                array_push($arr , $data);
            }

            return response()->json($arr);
        }

        
        public function retrieve_vech_plan_data()
        {
            $results = DB::select("select * from planifications as p , demandes as d , employes as e  
                                    where p.num_demande = d.num_demande and e.num_emp = d.num_emp and d.type_dmnd ='Vehicules'");
                                    
            //dd($results);
            $arr = [];

            foreach($results as $item){
                $data = [
                            "id_plan" => $item->id_pln ,
                            "title" => $item->title ,
                            "start" => $item->start_date ,
                            "end" => $item->end_date ,
                            "num_demande" => $item->num_demande ,
                            "type_dmnd" => $item->type_dmnd,
                            "date_dmnd" => $item->date_dmnd ,
                            'nom_emp' => $item->nom_emp ,
                            'prenom_emp' => $item->prenom_emp 
                        ];                                                
                array_push($arr , $data);
            }

            return response()->json($arr);
        }

        //--- event form   ---/ 
        public function display_vech_event_detail(Request $request)
        {
            
            $results1 = DB::select("select * from planifications as p , demandes as d , rsv_vehicules as rv , type_vehicules as tv , employes as e , vehicules  as v  
                                where p.num_demande = d.num_demande and rv.num_demande = d.num_demande
                                and tv.id_type = rv.id_type and e.num_emp = d.num_emp and v.id_type = tv.id_type and d.type_dmnd ='Vehicules' and d.num_demande = ?", array($request->num_dmnd));
            
            $results2 = DB::select("select * from rsv_vehicules as rv , type_vehicules as tv , vehicules as v
                                    where tv.id_type = rv.id_type and rv.id_vehc = v.id_vehc and rv.num_demande = ?", array($request->num_dmnd));           
            //dd($results1);
            $results1 = $results1[0];
            $results2 = $results2;
            
            return response()->json(['results1' => $results1 , 'results2' =>  $results2]);        
        }


        public function display_sal_event_detail(Request $request)
        {
            $results = DB::select("select * from  demandes as d , rsv_salles as rs , salles as s , employes as e 
            where rs.num_demande = d.num_demande
            and e.num_emp = d.num_emp and rs.num_sal = s.num_sal and d.type_dmnd ='Salles' and d.num_demande = ?", array($request->num_dmnd));
        
            $results = $results[0];

            return response()->json($results);
        }


        public function update_vech_event_detail(Request $request)
        {
            //Récupérer "id_type" dans la table "type_vehicules" avec le champ "type"
            $id_type = DB::table('type_vehicules')->where('type' , $request->type_vehc)->get()->first()->id_type ;
            //Récupérer "id_vehc" dans la table "vehicules" avec le champ "marque"
            $id_vehc = DB::table('vehicules')->where('marque' , $request->model_vehc)->get()->first()->id_vehc ;

            DB::table('rsv_vehicules')->where('id_rsv_vehc', $request->id_rsv_vehc)
                                        ->update(
                                                    [
                                                        'date_rsv' => $request->date_rsv,
                                                        'motif' => $request->motif,
                                                        'dest' => $request->dest,
                                                        'date_dep' => $request->date_dep,
                                                        'date_est_retour' => $request->date_est_retour,
                                                        'heure_dep' => $request->heure_dep,
                                                        'heure_retr' => $request->heure_retr,
                                                        'chauffeur' => $request->checkbox_status,
                                                        'id_type' => $id_type,
                                                        'id_vehc' => $id_vehc 
                                                    ]
                                                );
            
           // DB::table('vehicules')->where('marque', $request->model_vehc)->update(['num_parc' => $request->num_parc]);

            
            return response()->json(['msg' => "Les données a été modifier avec succée ..."]);  
        }


        public function update_sal_event_detail(Request $request)
        {
            //Récupérer "num_sal" dans la table "salles" avec le champ "designation"
            $num_sal = DB::table('salles')->where('designation' , $request->salle)->get()->first()->num_sal ;

            //dd($num_sal);
            DB::table('rsv_salles')->where('id_rsv_sal', $request->id_rsv_sal)
                                        ->update(
                                                    [
                                                        'theme' => $request->theme,
                                                        'date_rsv' => $request->date_rsv,
                                                        'heur_d' => $request->heure_d,
                                                        'heur_f' => $request->heure_f,
                                                        'num_demande' => $request->num_dmnd,
                                                        'num_sal' => $num_sal
                                                    ]
                                                );
            
            return response()->json(['msg' => "Les données a été modifier avec succée ..."]);  
        }


        //--- form planif dmnd ---/ 
        public function display_vech_dmnd_detail(Request $request)
        {
            $results1 = DB::select("select * from  demandes as d , rsv_vehicules as rv , type_vehicules as tv , employes as e , vehicules  as v  
                                where rv.num_demande = d.num_demande
                                and tv.id_type = rv.id_type and e.num_emp = d.num_emp and v.id_type = tv.id_type and d.type_dmnd ='Vehicules' and d.num_demande = ?", array($request->num_dmnd));
            
            $results2 = DB::select("select * from type_vehicules as tv , rsv_vehicules as rv
                                    where tv.id_type = rv.id_type and rv.num_demande = ?", array($request->num_dmnd));           
            //$type_vehc = $results2[0]->type ;
            //dd($results2);
            $results1 = $results1[0];
            $results2 = $results2[0];

            //dd($results2);

            return response()->json(['results1' => $results1 , 'results2' =>  $results2]);        
        }


        public function get_model_vech_list()
        {
            $list_vehc = DB::table('vehicules')->get();
            return response()->json($list_vehc);
        }


        public function get_type_vech_list()
        {
            $list_types_vehc = DB::table('type_vehicules')->get();
            return response()->json($list_types_vehc);
        }


        public function get_salles_list()
        {
            $list_salles = DB::table('salles')->get();
            return response()->json($list_salles);
        }


        public function display_sal_dmnd_detail(Request $request)
        {
            $results = DB::select("select * from  demandes as d , rsv_salles as rs , salles as s , employes as e 
            where rs.num_demande = d.num_demande
            and e.num_emp = d.num_emp and rs.num_sal = s.num_sal and d.type_dmnd ='Salles' and d.num_demande = ?", array($request->num_dmnd));
        
            $results = $results[0];

            return response()->json($results);

        }


}
