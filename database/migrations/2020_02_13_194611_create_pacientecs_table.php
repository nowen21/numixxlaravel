<?php

use App\Camposmagicos\CamposMagicos;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePacientecsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pacientecs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nombres',100);
            $table->string('apelldios',100);
            $table->integer('sis_clinica_id');
            $table->string('cedula',15);
            $table->date('fechnaci');
            $table->double('peso', 9, 2);
            $table->date('registro');
            $table->integer('npt_id');
            $table->integer('cama');
            $table->integer('genero_id');
            $table->integer('ep_id');
            $table->integer('departamento_id');
            $table->integer('municipio_id');
            $table->integer('servicio_id');
            $table->string('apellidos',50);
          
            $table->text('observac');
     
            $table=CamposMagicos::magicos($table);
        });
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
     
        Schema::dropIfExists('pacientecs');
    }
}
