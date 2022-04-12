<?php

namespace App\Http\Middleware\Notifications;

use Closure;
use Illuminate\Http\Request;
use App\Models\User;

class verification_demande_rsv
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

            if ($request->type_rsv == "Salle") {
                $admin_user = User::where('name' , "yacine")->get();
                $request->session()->put('admin_user' , $admin_user);
            }

            if ($request->type_rsv == "Vehicule") {
                $admin_user = User::where('name' , "ali")->get();
                $request->session()->put('admin_user' , $admin_user);
            }
        

        return $next($request); //vers (sendNotif) route
    }
}
