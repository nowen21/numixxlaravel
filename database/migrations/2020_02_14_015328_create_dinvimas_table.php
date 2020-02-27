<?php

use App\Camposmagicos\CamposMagicos;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDinvimasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dinvimas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('reginvim',25);
            $table->bigInteger('dmarca_id')->unsigned();

            $table->foreign('dmarca_id')->references('id')->on('dmarcas');
            $table=CamposMagicos::magicos($table);
        });
        Schema::create('h_dinvimas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('reginvim',25);
            $table->integer('dmarca_id');

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
        Schema::dropIfExists('h_dinvimas');
        Schema::dropIfExists('dinvimas');
    }
}
