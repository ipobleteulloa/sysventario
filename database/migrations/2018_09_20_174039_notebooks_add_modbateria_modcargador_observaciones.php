<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class NotebooksAddModbateriaModcargadorObservaciones extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('notebooks', function ($table) {
            $table->string('mod_bateria')->nullable();
            $table->string('mod_cargador');
            $table->text('observaciones')->nullable();
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
            $table->dropColumn('mod_bateria');
            $table->dropColumn('mod_cargador');
            $table->dropColumn('observaciones');
        });
    }
}
