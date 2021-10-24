<?php

namespace App\Http\Controllers;

use DB;
use App\Models\Curso;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\AssignOp\Concat;

class CursoController extends Controller
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
        $asignatura_alumno = DB::table('students')
            ->select([
                'students.id as id_alumno', DB::raw('CONCAT(students.nombre," ",students.apellido) as alumno'),
                'cursos.id as id_curso', 'cursos.nombre as curso', 'primer_parcial', 'segundo_parcial', 'zona',
                'examen_final', 'nota_final', 'course_states.descripcion', 'year', 'registered_careers.ciclo',
                'careers.nombre as carrera', 'curso_indices.id as id_indice'
            ])
            ->join('registered_careers', 'students.id', '=', 'registered_careers.id_alumno')
            ->join('curso_indices', 'students.id', '=', 'curso_indices.id_alumno')
            ->join('cursos', 'curso_indices.id_curso', '=', 'cursos.id')
            ->join('course_states', 'curso_indices.id_estado_curso', '=', 'course_states.id')
            ->join('careers', 'registered_careers.id_carrera', '=', 'careers.id')
            ->where('students.id', '=', $id)
            ->get();
        return \response($asignatura_alumno);
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
