<?php

use App\Camposmagicos\CamposMagicos;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDalistamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dalistams', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('calistam_id')->unsigned();
            $table->string('campo_id',10);
            $table->double('unidad',6,2);
            $table->double('cantcons',6,2);
            $table->double('diferenc',6,2);
            $table->foreign('calistam_id')->references('id')->on('calistams');
            $table=CamposMagicos::magicos($table);
        });
        Schema::create('h_dalistams', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('calistam_id');
            $table->string('campo_id',10);
            $table->double('unidad',6,2);
            $table->double('cantcons',6,2);
            $table->double('diferenc',6,2);
         
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
        Schema::dropIfExists('h_dalistams');
        Schema::dropIfExists('dalistams');
    }
}
