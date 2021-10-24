<?php

namespace App\Http\Controllers;

use DB;
use App\Models\CursoIndex;
use Illuminate\Http\Request;

class NotaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $nota = CursoIndex::all()->where('id', '=', $id)->first();

        return \response($nota);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id, Request $request)
    {
        //
        $primer_parcial = $request->input('primer_parcial');
        $segundo_parcial = $request->input('segundo_parcial');
        $zona = $request->input('zona');
        $examen_final = $request->input('examen_final');
        $nota_final = $request->input('nota_final');

        DB::update(
            'update curso_indices set 
            primer_parcial=? , segundo_parcial=?, zona=?, examen_final=?, nota_final=? where id = ?',
            [$primer_parcial, $segundo_parcial, $zona, $examen_final, $nota_final, $id]
        );
        DB::select('call  UPDATE_ESTADO_NOTA(?)', array($id));

        return response()->json("sucess");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
