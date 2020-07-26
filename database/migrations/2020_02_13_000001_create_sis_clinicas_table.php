<?php

use App\Camposmagicos\CamposMagicos;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSisClinicasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sis_clinicas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nitxxxxx', 50)->unique();
            $table->string('clinica', 50)->unique();
            $table->string('telefono', 50);
            $table->integer('digiveri');
            $table->bigInteger('user_crea_id')->default(1);
            $table->bigInteger('user_edita_id')->default(1);
            $table->bigInteger('sis_esta_id')->unsigned();
            $table->foreign('sis_esta_id')->references('id')->on('sis_estas');
            $table->timestamps();
            $table->softDeletes();
        });
        Schema::create('h_sis_clinicas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('id_old');
            $table->string('nit', 50);
            $table->string('nombre', 50);
            $table->string('telefono', 50);
            $table->integer('digiveri');
            $table->bigInteger('user_crea_id');
            $table->bigInteger('user_edita_id');
            $table->string('rutaxxxx', 50);
            $table->string('ipxxxxxx', 50);
            $table->string('metodoxx', 50);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('h_sis_clinicas');
        Schema::dropIfExists('sis_clinicas');
    }
}
