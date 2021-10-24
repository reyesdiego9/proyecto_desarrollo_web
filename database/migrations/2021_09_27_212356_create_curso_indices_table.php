<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCursoIndicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('curso_indices', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_curso');
            $table->unsignedBigInteger('id_alumno');
            $table->unsignedBigInteger('id_estado_curso');
            $table->unsignedBigInteger('primer_parcial')->nullable();
            $table->unsignedBigInteger('segundo_parcial')->nullable();
            $table->unsignedBigInteger('zona')->nullable();
            $table->unsignedBigInteger('examen_final')->nullable();
            $table->unsignedBigInteger('year')->nullable();
            $table->unsignedBigInteger('nota_final')->nullable();

            $table->foreign('id_curso')
                ->references('id')->on('cursos');

            $table->foreign('id_alumno')
                ->references('id')->on('students');

            $table->foreign('id_estado_curso')
                ->references('id')->on('course_states');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('curso_indices');
    }
}
