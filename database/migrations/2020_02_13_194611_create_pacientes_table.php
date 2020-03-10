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
            $table->string('cedula',15);
            $table->string('nombres',50);
            $table->string('apellidos',50);
            $table->double('peso', 9, 2);
            $table->integer('cama');
            $table->date('fechnaci');
            $table=CamposMagicos::getForeign($table, 'genero');
            $table=CamposMagicos::getForeign($table, 'ep');
            $table=CamposMagicos::getForeign($table, 'departamento');
            $table=CamposMagicos::getForeign($table, 'municipio');
            $table=CamposMagicos::getForeign($table, 'npt');
            $table=CamposMagicos::getForeign($table, 'sis_clinica');
            $table=CamposMagicos::getForeign($table, 'servicio');
            $table->unique(['cedula','sis_clinica_id']);
            $table=CamposMagicos::magicos($table);
        });
        Schema::create('h_pacientes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('registro');
            $table->string('cedula',15);
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
