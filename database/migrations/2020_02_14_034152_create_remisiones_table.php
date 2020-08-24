<?php

use App\Camposmagicos\CamposMagicos;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRemisionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('remisiones', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('ordeprod');//orden de produccion con la que se genera la remision
            $table->bigInteger('sis_clinica_id')->unsigned();// sis_clinica dueña de la remisión
            $table->bigInteger('rango_id')->unsigned();//rango asignado a la remision
            $table->foreign('sis_clinica_id')->references('id')->on('sis_clinicas');
            $table->foreign('rango_id')->references('id')->on('rangos');
            $table=CamposMagicos::magicos($table);
        });
        Schema::create('h_remisiones', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('ordeprod');//orden de produccion con la que se genera la remision
            $table->integer('sis_clinica_id');// sis_clinica dueña de la remisión
            $table->integer('rango_id');//rango asignado a la remision

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
        Schema::dropIfExists('h_remisiones');
        Schema::dropIfExists('remisiones');
    }
}
