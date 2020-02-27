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
            $table->bigInteger('dinvima_id')->unsigned();
            $table->double('inventar',6,2);
            $table->string('lotexxxx',15);

            $table->foreign('dinvima_id')->references('id')->on('dinvimas');
            $table=CamposMagicos::magicos($table);


        });
        Schema::create('h_dlotes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('fechvenc');
            $table->integer('dinvima_id');
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
