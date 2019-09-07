<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateClientTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('client',function($table){
            $table->string('nomsociete');
            $table->string('image_manager');
            $table->string('phone_number');
            $table->string('email');
            $table->string('message');
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
        Schema::table('client',function($table){
            $table->dropColumn('phone_number');
            $table->dropColumn('email');
            $table->dropColumn('message');
            $table->dropColumn('nomsociete');
            $table->dropColumn('image_manager');
            });
    }
}
