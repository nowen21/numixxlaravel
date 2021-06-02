<?php

use App\CamposMagicos\CamposMagicos;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCondiciosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('condicios', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('consinli');
            $table->string('condicio')->uniqued();
           $table=CamposMagicos::magicos($table);
        });
        Schema::create('h_condicios', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('id_old');
            $table->integer('consinli');
            $table->string('condicio')->uniqued();
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
        Schema::dropIfExists('condicios');
        Schema::dropIfExists('h_condicios');
    }
}
