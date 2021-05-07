<?php

use App\Camposmagicos\CamposMagicos;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMedicameSisClinicaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medicame_sis_clinica', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('sis_clinica_id')->unsigned();
            $table->bigInteger('medicame_id')->unsigned();
            $table->integer('cobrsepa')->default(2);

            $table->foreign('sis_clinica_id')->references('id')->on('sis_clinicas');
            $table->foreign('medicame_id')->references('id')->on('medicames');
            $table=CamposMagicos::magicos($table);
        });
        Schema::create('h_medicame_sis_clinica', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('sis_clinica_id');
            $table->integer('cobrsepa')->default(2);
            $table->integer('medicame_id');
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
        Schema::dropIfExists('h_medicame_sis_clinica');
        Schema::dropIfExists('medicame_sis_clinica');
    }
}
