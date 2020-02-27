<?php

use App\Camposmagicos\CamposMagicos;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTipoalertasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tipoalertas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('tituloxx',50)->unique();
            $table->text('cuerpoxx');
            $table=CamposMagicos::magicos($table);
        });
        Schema::create('h_tipoalertas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('tituloxx',50);
            $table->text('cuerpoxx');
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
        Schema::dropIfExists('h_tipoalertas');
        Schema::dropIfExists('tipoalertas');
    }
}
