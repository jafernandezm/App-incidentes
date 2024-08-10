<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('resultados__escaneos', function (Blueprint $table) {
            $table->id();
            //escaneo_id
            $table->string('url');
            $table->json('data')->nullable();  // Cambiado a tipo JSON
            $table->text('detalle')->nullable();
            $table->uuid('escaneo_id'); // Define como UUID
            $table->foreign('escaneo_id')->references('id')->on('escaneos')->onDelete('cascade');
            $table->timestamps();
        });
    }
    public function down()
    {
        Schema::dropIfExists('resultados__escaneos');
    }
};
