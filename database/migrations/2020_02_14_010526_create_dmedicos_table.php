<?php

use App\Camposmagicos\CamposMagicos;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDmedicosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dmedicos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nombrexx',100);
            $table=CamposMagicos::magicos($table);
        });
        Schema::create('h_dmedicos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nombrexx',100);
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
        Schema::dropIfExists('h_dmedicos');
        Schema::dropIfExists('dmedicos');
    }
}
