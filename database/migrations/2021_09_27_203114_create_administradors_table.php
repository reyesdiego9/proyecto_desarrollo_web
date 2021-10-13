<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdministradorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Administradors', function (Blueprint $table) {
            $table->id();
            $table->string('nombre_completo');
            $table->string('fotografia')->nullable();
            $table->char('correo', 70);
            $table->string('password');
            $table->unsignedBigInteger('id_rol');


            $table->foreign('id_rol')
                ->references('id')->on('rols');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Administradors');
    }
}
