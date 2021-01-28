<?php

use App\Camposmagicos\CamposMagicos;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCrangosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('crangos', function (Blueprint $table) {
            $table->bigIncrements('id');
           
            $table=CamposMagicos::getForeign($table,'sis_clinica');
            $table=CamposMagicos::getForeign($table,'rcodigo');
            $table=CamposMagicos::magicos($table);
            $table->unique(['rcodigo_id','sis_clinica_id']);
        });
        Schema::create('h_crangos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('sis_clinica_id');
            $table->integer('rcodigo_id');
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
        Schema::dropIfExists('h_crangos');
        Schema::dropIfExists('crangos');
    }
}
