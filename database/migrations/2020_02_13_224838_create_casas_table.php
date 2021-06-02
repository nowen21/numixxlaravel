<?php

use App\Camposmagicos\CamposMagicos;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCasasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('casas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('casa',30)->unique();
            $table->string('nameidxx',9);
            $table->string('unidmedi',15);
            $table->integer('ordecasa');
            $table=CamposMagicos::magicos($table);
        });
        Schema::create('h_casas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('id_old');
            $table->string('casa',30)->unique();
            $table->string('nameidxx',9);
            $table->string('unidmedi',15);
            $table->integer('ordecasa');
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
        Schema::dropIfExists('h_casas');
        Schema::dropIfExists('casas');
    }
}
