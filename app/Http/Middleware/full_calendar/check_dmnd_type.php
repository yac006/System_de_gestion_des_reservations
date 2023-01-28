<?php

namespace App\Http\Middleware\full_calendar;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class check_dmnd_type
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
        $type_dmnd = DB::table('demandes')->where('num_demande' , $request->num_dmnd)->get()->first()->type_dmnd;


        if ($type_dmnd == "Vehicules") {
            return redirect()->route('displayVechDmndDetail' , ['num_dmnd' => $request->num_dmnd]);
        }


        if ($type_dmnd == "Salles") {
            return redirect()->route('displaySalDmndDetail' , ['num_dmnd' => $request->num_dmnd]);
        }

        return $next($request);
    }
}
