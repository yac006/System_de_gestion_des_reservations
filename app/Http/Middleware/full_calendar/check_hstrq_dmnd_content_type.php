<?php

namespace App\Http\Middleware\full_calendar;

use Closure;
use Illuminate\Http\Request;

class check_hstrq_dmnd_content_type
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

        if ($request->id_role == 3 or $request->id_role == 4) {
            return redirect('HstrqDmndVehcCont');
        }

        if ($request->id_role == 5 or $request->id_role == 6) {
            return redirect('HstrqDmndSalCont');
        }
        


        return $next($request);
    }
}
