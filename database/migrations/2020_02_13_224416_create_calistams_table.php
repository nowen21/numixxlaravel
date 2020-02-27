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
            $table->string('ordepres',50);
            $table=CamposMagicos::magicos($table);
        });
        Schema::create('h_calistams', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('producto',50);
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
