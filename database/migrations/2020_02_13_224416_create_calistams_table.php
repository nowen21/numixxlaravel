<?php

use App\Camposmagicos\CamposMagicos;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCalistamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('calistams', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('producto',50);
            $table->bigInteger('ordene_id')->unsigned()->comment('ORDEN DE PRODUCCION');
            $table->foreign('ordene_id')->references('id')->on('ordenes');
            $table=CamposMagicos::magicos($table);
        });
        Schema::create('h_calistams', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('ordene_id');
            $table->string('ordepres',50);
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
        Schema::dropIfExists('h_calistams');
        Schema::dropIfExists('calistams');
    }
}
