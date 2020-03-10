<?php

use App\Camposmagicos\CamposMagicos;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRangosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rangos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('ranginic');
            $table->string('codiword')->unique();
            $table->integer('rangfina');
            $table=CamposMagicos::magicos($table);
        });
        Schema::create('h_rangos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('ranginic');
            $table->string('codiword');
            $table->integer('rangfina');
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
        Schema::dropIfExists('h_rangos');
        Schema::dropIfExists('rangos');
    }
}
