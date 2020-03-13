<?php

use App\CamposMagicos\CamposMagicos;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRcodigosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rcodigos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('codiprod')->unique();
            $table=CamposMagicos::getForeign($table, 'rcondici');
            $table=CamposMagicos::magicos($table);
        });
        Schema::create('h_rcodigos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('codiprod');
            $table->integer('rcondici_id');
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
        Schema::dropIfExists('h_rcodigos');
        Schema::dropIfExists('rcodigos');
    }
}
