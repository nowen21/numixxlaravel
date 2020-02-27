<?php

use App\Camposmagicos\CamposMagicos;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServiciosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('servicios', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('servicio',30);
            $table->bigInteger('sis_clinica_id')->unsigned();
            $table->foreign('sis_clinica_id')->references('id')->on('sis_clinicas');
            $table->unique(['sis_clinica_id','servicio']);
            $table=CamposMagicos::magicos($table);
        });
        Schema::create('h_servicios', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('servicio',30);
            $table->integer('sis_clinica_id');
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
        Schema::dropIfExists('h_servicios');
        Schema::dropIfExists('servicios');
    }
}
