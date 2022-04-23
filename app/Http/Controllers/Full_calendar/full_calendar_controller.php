<?php

namespace App\Http\Controllers\Full_calendar;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Planification;

class full_calendar_controller extends Controller
{

    

    
        public function retrieve(){
            
            $arr = [];
            foreach(Planification::all() as $item){
                $data = [
                            "title" => $item->title ,
                            "start" => $item->start_date ,
                            "end" => $item->end_date
                        ];                                                
                array_push($arr , $data);
            }
            return response()->json($arr); 
        }



        public function store(Request $request){

            $evenment = new Planification ;
            $evenment->title = $request->title ;
            $evenment->start_date = $request->start ;
            $evenment->end_date = $request->end ;
            $evenment->type_client = $request->t_client ;
            $evenment->nom = $request->nom ;
            $evenment->prenom = $request->prenom ;
            $evenment->address = $request->address ;
            $evenment->email = $request->email ;
            $evenment->type_rsv = $request->t_rsv ; 
            $evenment->tele = $request->tele ;
            $evenment->save();

            return response()->json(["success" => "added"]);
        }




        public function update(Request $request){
            $record = Planification::where('title' , $request->title) ;

            $record->update(['start_date' => $request->start ]);
            $record->update(['end_date' => $request->end ]);
        }



        public function delete(Request $request){

            Planification::where('title' , $request->title)->delete() ;
        }

}
