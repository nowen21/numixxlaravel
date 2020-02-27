<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Camposmagicos\CamposMagicos;

class CreateAlertasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alertas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('tipoalerta_id')->unsigned();
            $table->bigInteger('tipoacione_id')->unsigned();
            $table->bigInteger('cformula_id')->unsigned();
            $table->bigInteger('sis_clinica_id')->unsigned();
            $table->boolean('leidaxxx');

            $table->foreign('cformula_id')->references('id')->on('cformulas');
            $table->foreign('sis_clinica_id')->references('id')->on('sis_clinicas');
            $table->foreign('tipoacione_id')->references('id')->on('tipoaciones');
            $table->foreign('tipoalerta_id')->references('id')->on('tipoalertas');

            $table=CamposMagicos::magicos($table);
        });
       Schema::create('h_alertas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('tipoalerta_id');
            $table->integer('tipoacione_id');
            $table->integer('cformula_id');
            $table->integer('sis_clinica_id');
            $table->boolean('leidaxxx');

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
        //Schema::dropIfExists('h_alertas');
        Schema::dropIfExists('alertas');
    }
}
