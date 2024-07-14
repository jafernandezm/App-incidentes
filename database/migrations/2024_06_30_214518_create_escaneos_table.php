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
            //url
            $table->string('url')->nullable();
            $table->uuid('escaneo_id');
            $table->string('tipo')->nullable();
            $table->date('fecha');
            $table->string('resultado');
            //fecha
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
