<?php

use App\Camposmagicos\CamposMagicos;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCformulasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cformulas', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->bigInteger('paciente_id')->unsigned();
            $table->double('tiempo', 15, 2);
            $table->double('velocidad', 15, 2);
            $table->double('volumen', 15, 2);
            $table->double('purga', 15, 2);
            $table->double('peso', 15, 2);
            $table->double('total', 15, 2);
            $table->bigInteger('sis_clinica_id')->unsigned();

            $table->bigInteger('userprep_id')->unsigned();
            $table->bigInteger('userproc_id')->unsigned()->nullable();
            $table->bigInteger('ordene_id')->unsigned();
            $table->bigInteger('userlibe_id')->unsigned()->nullable();
            $table->foreign('paciente_id')->references('id')->on('pacientes');
            $table->foreign('sis_clinica_id')->references('id')->on('sis_clinicas');

            $table->foreign('userprep_id')->references('id')->on('users');
            $table->foreign('userproc_id')->references('id')->on('users');
            $table->foreign('ordene_id')->references('id')->on('ordenes');
            $table->foreign('userlibe_id')->references('id')->on('users');
            $table=CamposMagicos::magicos($table);

        });
        Schema::create('h_cformulas', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->bigInteger('paciente_id')->unsigned();
            $table->double('tiempo', 15, 2);
            $table->double('velocidad', 15, 2);
            $table->double('volumen', 15, 2);
            $table->double('purga', 15, 2);
            $table->double('peso', 15, 2);
            $table->double('total', 15, 2);
            $table->integer('sis_clinica_id');

            $table->integer('userprep_id');
            $table->integer('userproc_id');
            $table->integer('ordene_id');
            $table->integer('userlibe_id');

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
        Schema::dropIfExists('h_cformulas');
        Schema::dropIfExists('cformulas');
    }
}
