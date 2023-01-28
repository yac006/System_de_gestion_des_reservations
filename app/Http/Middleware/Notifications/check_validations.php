<?php

namespace App\Http\Middleware\Notifications;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class check_validations
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
        
        //verifier si la demande a été deja valider ou deja refuser
        $valider = DB::table('validations')->where('num_demande' , $request->num_dmnd)->get()->first()->valider;
       
        
        if ($valider == NUll) {  
            return $next($request);
        }        

        if ($valider == 1) {  
            return response()->json("exists_tr");
        }

        if ($valider == 0) { 
            return response()->json("exists_fl");
        }

        
    }// end func
        

}
