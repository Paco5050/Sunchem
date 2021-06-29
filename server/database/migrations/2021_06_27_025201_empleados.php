<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Empleados extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('empleados',function (Blueprint $table){
            $table->id();
            $table->string('documento_identidad');
            $table->string('nombre');
            $table->string('apellido');

            $table->foreignId('estado_empleado_id')
                  ->constrained('estado_empleado');
            $table->foreignId('usuario_id')
                  ->unique()->constrained();

            $table->string('direccion',240);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('empleados');
    }
}
