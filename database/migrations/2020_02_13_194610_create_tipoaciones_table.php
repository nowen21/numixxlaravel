<?php

use App\Camposmagicos\CamposMagicos;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTipoacionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tipoaciones', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('tituloxx',50)->unique();
            $table=CamposMagicos::magicos($table);
        });
        Schema::create('h_tipoaciones', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('tituloxx',50);
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
        Schema::dropIfExists('h_tipoaciones');
        Schema::dropIfExists('tipoaciones');
    }
}
