<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('escaneos', function (Blueprint $table) {
            $table->id();
            //sitio_id, tipo, fecha, resultado
            $table->foreignId('sitio_id')->constrained();
            $table->string('tipo');
            $table->date('fecha');
            $table->string('resultado');
            
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
        Schema::dropIfExists('escaneos');
    }
};
