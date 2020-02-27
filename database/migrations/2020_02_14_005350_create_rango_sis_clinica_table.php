<?php

use App\Camposmagicos\CamposMagicos;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRangoSisClinicaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rango_sis_clinica', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('sis_clinica_id')->unsigned();
            $table->bigInteger('rango_id')->unsigned();
            $table->foreign('sis_clinica_id')->references('id')->on('sis_clinicas');
            $table->foreign('rango_id')->references('id')->on('rangos');
            $table=CamposMagicos::magicos($table);
        });
        Schema::create('h_rango_sis_clinica', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('sis_clinica_id');
            $table->integer('rango_id');
            $table=CamposMagicos::h_magicos($table);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('h_sis_clinica_rango');
        Schema::dropIfExists('sis_clinica_rango');
    }
}
