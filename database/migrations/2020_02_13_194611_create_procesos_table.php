<?php

use App\Camposmagicos\CamposMagicos;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProcesosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('procesos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->boolean('coloraci');//coloración normal
            $table->boolean('ausepart');//ausencia de partículas
            $table->boolean('ausefuga');//ausencia de fugas
            $table->boolean('ausemise');//ausencia de miselas/integridad emulsión
            $table->boolean('nopasaxx');//indica si el control en proceso es exitoso o no
            $table->boolean('estaproc');//Estado del proceso
            $table->boolean('listermi');//indica si ya esta terminado
            $table=CamposMagicos::magicos($table); //usuario responsable del proceso
        });

        Schema::create('h_procesos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('id_old');
            $table->boolean('coloraci');//coloración normal
            $table->boolean('ausepart');//ausencia de partículas
            $table->boolean('ausefuga');//ausencia de fugas
            $table->boolean('ausemise');//ausencia de miselas/integridad emulsión
            $table->boolean('nopasaxx');//indica si el control en proceso es exitoso o no
            $table->boolean('estaproc');//Estado del proceso
            $table->boolean('listermi');//indica si ya esta terminado
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
        Schema::dropIfExists('h_procesos');
        Schema::dropIfExists('procesos');
    }
}
