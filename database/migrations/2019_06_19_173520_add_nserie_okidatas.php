<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddNserieOkidatas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('okidatas', function (Blueprint $table) {
            $table->string('nserie')->nullable()->after('modelo');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('okidatas', function (Blueprint $table) {
            $table->dropColumn('nserie');
        });
    }
}
