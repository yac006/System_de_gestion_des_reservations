<?php

namespace App\Http\Controllers\Gestion_vehicules;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class Gest_vehicules_controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $results = DB::select("select * from vehicules as v , type_vehicules as tv where v.id_type = tv.id_type");
        return response()->json($results);
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
        $id_type_v = DB::table('type_vehicules')->where('type' , $request->type_vech)->get()->first()->id_type;

        DB::table('vehicules')->insert([
            'marque' => $request->marque,
            'immat' => $request->immat,
            'num_parc' => $request->num_parc,
            'id_type' => $id_type_v
        ]);

        return response()->json("success");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //dd('ok');
        $results = DB::table('type_vehicules')->get();
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
        //
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
        $id_type_v = DB::table('type_vehicules')->where('type' , $request->type_vech)->get()->first()->id_type;

        DB::table('vehicules')->where('id_vehc' , $id)->update([
            'marque' => $request->marque,
            'immat' => $request->immat,
            'num_parc' => $request->num_parc,
            'id_type' => $id_type_v
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
        $results = DB::table('vehicules')->where('id_vehc' , $id)->delete();

        if (!$results) {//si il ya un conflit FK
            return response()->json("conflit_fk");
        } else {
            return response()->json("success");
        }
    }
}
