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

            $table->bigInteger('userevis_id')->unsigned()->nullable()->comment('USUARIO QUE REVISA LA FORMULACION');
            $table->bigInteger('userprep_id')->unsigned()->nullable()->comment('USUARIO QUE PREPARA LA FORMULACION');
            $table->bigInteger('proceso_id')->unsigned()->nullable()->comment('PROCESO DE LA FORMULACION');
            $table->bigInteger('terminado_id')->unsigned()->nullable()->comment('TERMINADO DE LA FORMULACION');
            $table->bigInteger('ordene_id')->unsigned();
           
            $table->foreign('paciente_id')->references('id')->on('pacientes');
            $table->foreign('sis_clinica_id')->references('id')->on('sis_clinicas');
            $table->foreign('userevis_id')->references('id')->on('users');
            $table->foreign('userprep_id')->references('id')->on('users');
            $table->foreign('proceso_id')->references('id')->on('procesos');
            $table->foreign('terminado_id')->references('id')->on('terminados');
            $table->foreign('ordene_id')->references('id')->on('ordenes');
            
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
            $table->integer('userevis_id')->comment('USUARIO QUE REVISA LA FORMULACION');
            $table->integer('userprep_id')->comment('USUARIO QUE PREPARA LA FORMULACION');
            $table->integer('userproc_id')->comment('USUARIO QUE PROCESA LA FORMULACION');
            $table->integer('userlibe_id')->comment('USUARIO QUE LIBERA LA FORMULACION');
            $table->integer('ordene_id');
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
