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
        Schema::create('html_infectados', function (Blueprint $table) {
            $table->id();
            //escaneo_id, html_infectado,descripcion
            //$table->foreignId('escaneo_id')->constrained();
            //$table->integer('escaneo_id');
            $table->string('html_infectado');
            $table->text('descripcion');
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
        Schema::dropIfExists('html_infectados');
    }
};
