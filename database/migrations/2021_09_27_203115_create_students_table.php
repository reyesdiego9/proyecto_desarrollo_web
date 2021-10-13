<?php

use App\Models\Administrador;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('carnet');
            $table->char('nombre', 150);
            $table->char('apellido', 150);
            $table->unsignedBigInteger('dpi');
            $table->date('fechaNacimiento');
            $table->string('foto_estudiante');
            $table->char('correo', 100);
            $table->string('password');
            $table->unsignedBigInteger('id_estado')->nullable();
            $table->unsignedBigInteger('id_administrador');

            $table->foreign('id_estado')
                ->references('id')->on('statuses')
                ->onDelete('set null');

            $table->foreign('id_Administrador')
                ->references('id')->on('Administradors');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('students');
    }
}
