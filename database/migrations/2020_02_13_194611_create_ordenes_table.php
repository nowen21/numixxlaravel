<?php

use App\Camposmagicos\CamposMagicos;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdenesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ordenes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('ordeprod');
            $table->string('observac')->nullable();
            $table=CamposMagicos::magicos($table);
        });
        Schema::create('h_ordenes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('ordeprod');
            $table->string('observac')->nullable();
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
        Schema::dropIfExists('h_ordenes');
        Schema::dropIfExists('ordenes');
    }
}
