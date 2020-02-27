<?php

use App\Camposmagicos\CamposMagicos;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDmarcasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dmarcas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nombcome',150);
            $table->double('osmorali', 4,2);
            $table->double('pesoespe', 4,2);
            $table->string('formfarm',50);
            $table->bigInteger('dmedico_id')->unsigned();
            $table->string('marcaxxx',50);

            $table->foreign('dmedico_id')->references('id')->on('dmedicos');
            $table=CamposMagicos::magicos($table);
        });
        Schema::create('h_dmarcas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nombcome',150);
            $table->double('osmorali', 4,2);
            $table->double('pesoespe', 4,2);
            $table->string('formfarm',50);
            $table->integer('dmedico_id');
            $table->string('marcaxxx',50);

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
        Schema::dropIfExists('h_dmarcas');
        Schema::dropIfExists('dmarcas');

    }
}
