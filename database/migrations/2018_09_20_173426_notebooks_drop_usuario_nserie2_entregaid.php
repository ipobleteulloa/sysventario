<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class NotebooksDropUsuarioNserie2Entregaid extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('notebooks', function($table) {
            $table->dropColumn('usuario');
            $table->dropColumn('nserie2');
            $table->dropColumn('entrega_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('notebooks', function ($table) {
            $table->string('usuario')->nullable();
            $table->string('nserie2')->nullable();
            $table->integer('entrega_id')->nullable();
        });
    }
}
