<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateParametreTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('parametres', function ($table) {
            $table->dropColumn('nomparametre');
            $table->dropColumn('description');
            $table->string('email');
            $table->string('localisation');
            $table->string('tel');
            $table->string('fax');
            $table->string('horaire');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::table('parametres',function($table){
            $table->string('nomparametre');
            $table->string('description');
            $table->dropColumn('email');
            $table->dropColumn('localisation');
            $table->dropColumn('tel');
            $table->dropColumn('fax');
            $table->dropColumn('horaire');
        });
    }
}
