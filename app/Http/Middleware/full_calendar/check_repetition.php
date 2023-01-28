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
        //???????????
        $num_dmnd = intval(str_replace('Demande N:', '', $request->title));
        $results = Planification::where('num_demande' , $num_dmnd)->exists();
        //???????????
        if ($results == true) {
            return response()->json("Existe");
        }else {
            return $next($request);
        }
        
    }
}
