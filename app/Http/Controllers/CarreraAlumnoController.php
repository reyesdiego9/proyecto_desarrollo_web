<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;

class CarreraAlumnoController extends Controller
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
        $curso_alumno = DB::table('registered_careers')
            ->select([
                'careers.id as id_carrera', 'careers.nombre', 'registered_careers.fecha_inscripcion',
                DB::raw('CONCAT(students.nombre," ",students.apellido) as alumno')
            ])
            ->join('careers', 'registered_careers.id_carrera', '=', 'careers.id')
            ->join('students', 'registered_careers.id_alumno', '=', 'students.id')
            ->where('students.id', '=', $id)
            ->get();

        return response($curso_alumno);
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
        //
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
