<?php

namespace Database\Seeders;

use App\Models\Curso;
use Illuminate\Database\Seeder;

class CursosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Cursos de Ingenieria en Sistemas
        $curso = new Curso();
        $curso->nombre = "Calculo 1";
        $curso->creditos = 120;
        $curso->ciclo = 2;
        $curso->id_carrera = 5090;
        $curso->save();

        $curso = new Curso();
        $curso->nombre = "Programacion 1";
        $curso->creditos = 120;
        $curso->ciclo = 2;
        $curso->id_carrera = 5090;
        $curso->save();

        $curso = new Curso();
        $curso->nombre = "Electronica 1";
        $curso->creditos = 120;
        $curso->ciclo = 2;
        $curso->id_carrera = 5090;
        $curso->save();

        //Cursos de Contaduria Publica
        $curso = new Curso();
        $curso->nombre = "Contabilidad 1";
        $curso->creditos = 120;
        $curso->ciclo = 2;
        $curso->id_carrera = 5091;
        $curso->save();

        $curso = new Curso();
        $curso->nombre = "Auditoria";
        $curso->creditos = 120;
        $curso->ciclo = 2;
        $curso->id_carrera = 5091;
        $curso->save();

        $curso = new Curso();
        $curso->nombre = "Administracion";
        $curso->creditos = 120;
        $curso->ciclo = 2;
        $curso->id_carrera = 5091;
        $curso->save();

        //Cursos de Design grafico
        $curso = new Curso();
        $curso->nombre = "Fotografia";
        $curso->creditos = 120;
        $curso->ciclo = 2;
        $curso->id_carrera = 5092;
        $curso->save();

        $curso = new Curso();
        $curso->nombre = "Ilustracion";
        $curso->creditos = 120;
        $curso->ciclo = 2;
        $curso->id_carrera = 5092;
        $curso->save();

        $curso = new Curso();
        $curso->nombre = "Diseño web y movil";
        $curso->creditos = 120;
        $curso->ciclo = 2;
        $curso->id_carrera = 5092;
        $curso->save();

        //Cursos de Derecho
        $curso = new Curso();
        $curso->nombre = "Filosofia";
        $curso->creditos = 120;
        $curso->ciclo = 2;
        $curso->id_carrera = 5093;
        $curso->save();

        $curso = new Curso();
        $curso->nombre = "Introduccion al derecho";
        $curso->creditos = 120;
        $curso->ciclo = 2;
        $curso->id_carrera = 5093;
        $curso->save();

        $curso = new Curso();
        $curso->nombre = "Lenguaje";
        $curso->creditos = 120;
        $curso->ciclo = 2;
        $curso->id_carrera = 5093;
        $curso->save();

        //Cursos de administracion de empresas
        $curso = new Curso();
        $curso->nombre = "Historia Economica";
        $curso->creditos = 120;
        $curso->ciclo = 2;
        $curso->id_carrera = 5094;
        $curso->save();

        $curso = new Curso();
        $curso->nombre = "Contabilidad";
        $curso->creditos = 120;
        $curso->ciclo = 2;
        $curso->id_carrera = 5094;
        $curso->save();

        $curso = new Curso();
        $curso->nombre = "Administracion Financiera";
        $curso->creditos = 120;
        $curso->ciclo = 2;
        $curso->id_carrera = 5094;
        $curso->save();
    }
}
