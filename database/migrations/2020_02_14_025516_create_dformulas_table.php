<?php

use App\Camposmagicos\CamposMagicos;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDformulasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dformulas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('cformula_id')->unsigned();
            $table->bigInteger('medicame_id')->unsigned();
            $table->boolean('preparar')->default(0);//'indica que fue preparado'
            $table->double('cantidad');
            $table->double('rtotal');
            $table->double('volumen');
            $table->double('purga');
            $table=CamposMagicos::magicos($table);
        });
        Schema::create('h_dformulas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('id_old');
            $table->bigInteger('cformula_id')->unsigned();
            $table->bigInteger('medicame_id')->unsigned();
            $table->boolean('preparar');//'indica que fue preparado'
            $table->double('cantidad');
            $table->double('rtotal');
            $table->double('volumen');
            $table->double('purga');
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
        Schema::dropIfExists('h_dformulas');
        Schema::dropIfExists('dformulas');
    }
}
