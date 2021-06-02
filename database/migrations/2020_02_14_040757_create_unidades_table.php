<?php

use App\Camposmagicos\CamposMagicos;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUnidadesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('unidades', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('unidad')->unique();
            $table=CamposMagicos::magicos($table);
        });
        Schema::create('h_unidades', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('id_old');
            $table->string('unidad')->unique();
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
        Schema::dropIfExists('h_unidades');
        Schema::dropIfExists('unidades');
    }
}
