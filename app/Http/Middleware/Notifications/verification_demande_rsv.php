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

            if ($request->type_rsv == "Salles") {
                
                $request->session()->put('admin_users' , 
                [
                    'chef' => User::where('id_role' , 5)->get()->first(),
                    'resp' => User::where('id_role' , 6)->get()->first(),
                ]);
            }

            if ($request->type_rsv == "Vehicules") {

                $request->session()->put('admin_users' , 
                [
                    'chef'  => User::where('id_role' , 3)->get()->first(),
                    'resp' => User::where('id_role' , 4)->get()->first(),
                ]);
            }
        
        return $next($request); //vers "insertData" route
    }
}
