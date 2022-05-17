<?php

namespace App\Http\Middleware\middlewar_auth;

use Closure;
use Illuminate\Http\Request;

class register_validate
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

        $request->validate([
            'pseudo' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:2', 'confirmed'],
        ]);
        
        //verifier si le champ d'image n'pas vide
        if ($request->avatar_path == NULL) {
            $msg = "veuillez sélectionner un avatar !!" ;
            $request->session()->put('img_msg' , $msg);

            return response()->view('auth.register');

        }else{
            //secend container (Validation des champs)

            // $request->validate([
            //     'nom_emp' => ['required', 'string', 'max:255'],
            //     'prenom_emp' => ['required', 'string', 'max:255'],
            // ]);


            return $next($request);
        }

        
    }
}
