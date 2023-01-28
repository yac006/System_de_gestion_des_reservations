<?php

namespace App\Http\Controllers\Gestion_employes;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;





class Gest_employes_controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $list_emp = DB::table('employes')->get();
        //session(['list_emp' => $list_emp]);

        return response()->json($list_emp);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        
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
        $user_id = DB::table('employes')->where('num_emp' , $request->num_emp)->get()->first()->user_id;
        $id_role = DB::table('users')->where('user_id' , $user_id)->get()->first()->id_role;
        //dd($id_role);
        if ($id_role == 7) {
            //bloquer le compte
            DB::table('users')->where('user_id' , $user_id)->update(['actif' => False]);
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
        $results = DB::table('employes')->where('num_emp' , $id)->get()->first();
        return response()->json($results);
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

        DB::table('employes')->where('num_emp' , $id)->update([
            'nom_emp' => $request->nom,
            'prenom_emp' => $request->prenom,
            'poste' => $request->poste,
            'type' => $request->type,
            'tele' => $request->tele,
            
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
        $user_id = DB::table('employes')->where('num_emp' , $id)->get()->first()->user_id;

        DB::table('employes')->where('num_emp' , $id)->delete();
        DB::table('users')->where('user_id' , $user_id)->delete();

        return response()->json("success");
    }
}
