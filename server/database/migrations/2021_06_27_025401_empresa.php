<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Empresa extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('empresa',function(Blueprint $table){
            $table->id();
            $table->string('nit',20);
            $table->string('nombre',100);
            $table->string('correo',300);
            $table->string('representante_legal',45);
            $table->string('clave',100);
            $table->date('fecha_creada');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('empresa');
    }
}
