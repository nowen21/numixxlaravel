<?php

use App\Camposmagicos\CamposMagicos;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMnptsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mnpt', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('medicame_id')->unsigned();
            $table->bigInteger('npt_id')->unsigned();
            $table->double('randesde',2);
            $table->double('ranhasta',2);
            $table->string('rangunid');
            $table->foreign('medicame_id')->references('id')->on('medicames');
            $table->foreign('npt_id')->references('id')->on('npts');
            $table=CamposMagicos::magicos($table);
        });
        Schema::create('h_mnpt', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('medicame_id');
            $table->integer('npt_id');
            $table->double('randesde',2);
            $table->double('ranhasta',2);
            $table->string('rangunid');

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
        Schema::dropIfExists('h_mnpt');
        Schema::dropIfExists('mnpt');
    }
}
