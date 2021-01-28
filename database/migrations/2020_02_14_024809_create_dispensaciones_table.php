<?php

use App\Camposmagicos\CamposMagicos;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDispensacionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dispensaciones', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('fechaxxx');
            $table->integer('opxxxxxx');
            $table->string('producto');
            $table=CamposMagicos::magicos($table);
        });
        Schema::create('h_dispensaciones', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('fechaxxx');
            $table->integer('opxxxxxx');
            $table->string('producto');
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
        Schema::dropIfExists('h_dispensaciones');
        Schema::dropIfExists('dispensaciones');
    }
}
