<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIncidenciasTable extends Migration
{
    public function up()
    {
        Schema::create('incidencias', function (Blueprint $table) {
            $table->id(); // ID autoincremental
            $table->string('titulo'); // Título de la incidencia
            $table->text('descripcion'); // Descripción de la incidencia
            $table->unsignedBigInteger('usuario_id'); // ID del usuario que reporta la incidencia
            $table->timestamps(); // Campos created_at y updated_at

            // Si tienes una tabla de usuarios, puedes agregar una clave foránea
            $table->foreign('usuario_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('incidencias');
    }
}
