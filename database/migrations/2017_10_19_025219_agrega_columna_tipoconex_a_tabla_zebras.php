<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AgregaColumnaTipoconexATablaZebras extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('zebras', function (Blueprint $table) {
            $table->string('tipo_conexion')->default('Por confirmar');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('zebras', function (Blueprint $table) {
            $table->dropColumn('tipo_conexion');
        });
    }
}
