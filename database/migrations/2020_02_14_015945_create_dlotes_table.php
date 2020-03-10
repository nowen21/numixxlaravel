<?php

use App\Camposmagicos\CamposMagicos;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDlotesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dlotes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('fechvenc');
            $table->bigInteger('dmarca_id')->unsigned();
            $table->double('inventar',6,2);
            $table->string('lotexxxx',15);

            $table->foreign('dmarca_id')->references('id')->on('dmarcas');
            $table=CamposMagicos::magicos($table);


        });
        Schema::create('h_dlotes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('fechvenc');
            $table->integer('dmarca_id');
            $table->double('inventar',6,2);
            $table->string('lotexxxx',15);


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
        Schema::dropIfExists('h_dlotes');
        Schema::dropIfExists('dlotes');
    }
}
