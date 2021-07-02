<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Reclamos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reclamos',function(Blueprint $table){
            $table->id();
            $table->string('mensaje',250);
            $table->timestamps();
            $table->boolean('estado')->default(false);
            $table->foreignId('tipos_reclamos_id')->constrained();
            $table->foreignId('clientes_id')->constrained();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reclamos');
    }
}
