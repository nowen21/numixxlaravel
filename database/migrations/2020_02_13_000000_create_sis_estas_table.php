<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSisEstasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sis_estas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('s_estado');
            $table->Integer('i_estado');
            $table->Integer('user_crea_id'); 
            $table->Integer('user_edita_id');
            $table->timestamps();
        });
        Schema::create('h_sis_estas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('s_estado');
            $table->Integer('i_estado');
            $table->Integer('user_crea_id'); 
            $table->Integer('user_edita_id');
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
        Schema::dropIfExists('h_sis_estas');
        Schema::dropIfExists('sis_estas');
    }
}
