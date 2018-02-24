<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNotebooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notebooks', function (Blueprint $table) {
            $table->increments('id');
            $table->string('codigo')->nullable();
            $table->string('usuario')->nullable();
            $table->string('marca');
            $table->string('modelo');
            $table->string('pantalla');
            $table->string('procesador');
            $table->string('ram');
            $table->string('hdd');
            $table->string('nserie');
            $table->string('nserie2')->nullable();
            $table->integer('entrega_id')->nullable();
            $table->integer('estado_id')->nullable();
            $table->integer('sistemaoperativo_id')->nullable();
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
        Schema::dropIfExists('notebooks');
    }
}
