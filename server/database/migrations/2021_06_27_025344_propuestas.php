<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Propuestas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('propuestas',function (Blueprint $table){
           $table->id();
           $table->string('propuesta',400);
           $table->boolean('estado');
           $table->timestamps();
           $table->foreignid('reclamos_id')->constrained();
           $table->foreignId('empleados_id')->constrained();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('propuestas');
    }
}
