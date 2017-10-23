<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOkidatasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('okidatas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('codigo')->nullable();
            $table->string('nombre');
            $table->string('modelo');
            $table->string('ubicacion')->nullable();
            $table->integer('estado_id')->nullable();
            $table->boolean('poseeusb')->nullable();
            $table->string('tipo_conexion')->default('Por confirmar');
            $table->string('sector_id');
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
        Schema::dropIfExists('okidatas');
    }
}
