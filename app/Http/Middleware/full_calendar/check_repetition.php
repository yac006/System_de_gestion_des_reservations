<?php

namespace App\Http\Middleware\full_calendar;

use Closure;
use Illuminate\Http\Request;
use App\Models\Planification;

class check_repetition
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        //Récuperer le dernier enregistrement dan s la table planification
        $last_row = Planification::all()->last();

        $title = Planification::where('title' , $request->title)->get()->first();
        
        //verifier si "title" existe déja
        if ($title !== NULL) { 

                return response()->json("repetition_title");
            
        } else {
            //Verifier si le "num_rsv" de la requete ajax égale au "num_rsv" de dérnier enregistrement 
            if ($last_row['num_rsv'] == $request->num_rsv ){
                
                return response()->json("repetition_num_rsv");

            }else {
                return $next($request);
            };
        };
        
        
    }
}
