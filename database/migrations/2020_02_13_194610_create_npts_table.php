<?php

use App\Camposmagicos\CamposMagicos;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNptsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('npts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nombre',30);
            $table=CamposMagicos::magicos($table);
        });
        Schema::create('h_npts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('id_old');
            $table->string('nombre',30);
            $table=CamposMagicos::magicos($table);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('npts');
    }
}
