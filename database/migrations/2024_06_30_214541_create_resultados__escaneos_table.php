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
        Schema::create('resultados__escaneos', function (Blueprint $table) {
            $table->id();
            //escaneo_id
            $table->foreignId('escaneo_id')->constrained()->onDelete('cascade');
            $table->string('url');
            $table->string('infectada')->nullable();
            $table->json('html_infectado')->nullable();  // Cambiado a tipo JSON
            $table->json('html')->nullable(); 
            $table->json('redirecciones')->nullable();   // Cambiado a tipo JSON
            $table->text('detalle')->nullable();
            $table->string('tipo')->nullable();
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
        Schema::dropIfExists('resultados__escaneos');
    }
};
