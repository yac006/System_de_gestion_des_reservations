<?php

namespace App\Http\Controllers\users_administraion;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;




class users_administration_cont extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $users_data = DB::select('SELECT * FROM employes as e , users as u WHERE e.user_id = u.user_id');                     
        $users_data = $users_data; 
        $request->session()->put("all-users" , $users_data);

        return Redirect('storeInSession');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //check if admin or user
        $id_role = DB::table('users')->where('user_id' , $request->user_id)->get()->first()->id_role;
        //dd($id_role);
        if ($id_role == 7) {
            //bloquer le compte
            DB::table('users')->where('user_id' , $request->user_id)->update(['actif' => False]);
            return response()->json("success");
        }else {
            return response()->json("not_user_account");
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $results = DB::select("select * from users as u , employes as e
                                where u.user_id = e.user_id and u.user_id = ?" , array($id));
        return response()->json($results[0]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
    
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        DB::table('employes')->where('user_id' , $id)->update([
            'nom_emp' => $request->nom,
            'prenom_emp' => $request->prenom,
            'poste' => $request->poste,
            'type' => $request->type,
            'tele' => $request->tele
        ]);

        DB::table('users')->where('user_id' , $id)->update([
            'pseudo' => $request->pseudo,
            'email' => $request->email,
            'password' => Hash::make($request->password) 
        ]);

        return response()->json("success");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('employes')->where('user_id' , $id)->delete();
        DB::table('users')->where('user_id' , $id)->delete();

        return response()->json("success");
    }
}
