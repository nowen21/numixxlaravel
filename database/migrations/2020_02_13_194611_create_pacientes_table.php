<?php

use App\Camposmagicos\CamposMagicos;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePacientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pacientes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('registro');
            $table->string('cedula',15)->unique();
            $table->string('nombres',50);
            $table->string('apellidos',50);
            $table->double('peso', 9, 2);
            $table->bigInteger('genero_id')->unsigned();
            $table->bigInteger('ep_id')->unsigned();
            $table->integer('cama');
            $table->date('fechnaci');
            $table->bigInteger('municipio_id')->unsigned();
            $table->bigInteger('npt_id')->unsigned();
            $table->bigInteger('sis_clinica_id')->unsigned();
            $table->bigInteger('servicio_id')->unsigned(); 
            $table->foreign('servicio_id')->references('id')->on('servicios');
            $table->foreign('genero_id')->references('id')->on('generos');
            $table->foreign('sis_clinica_id')->references('id')->on('sis_clinicas');
            $table->foreign('ep_id')->references('id')->on('eps');
            $table->foreign('municipio_id')->references('id')->on('municipios');
            $table->foreign('npt_id')->references('id')->on('npts');
            $table=CamposMagicos::magicos($table);
        });
        Schema::create('h_pacientes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('registro');
            $table->string('cedula',15)->unique();
            $table->string('nombres',50);
            $table->string('apellidos',50);
            $table->double('peso', 9, 2);
            $table->integer('genero_id');
            $table->integer('ep_id');
            $table->integer('servicio_id'); 
            $table->integer('cama');
            $table->date('fechnaci');
            $table->integer('municipio_id');
            $table->integer('npt_id');
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
        Schema::dropIfExists('h_pacientes');
        Schema::dropIfExists('pacientes');
    }
}
