<?php

use App\CamposMagicos\CamposMagicos;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHidrpedisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hidrpedis', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->double('inicioxx',4,2);
            $table->double('finalxxx',4,2);
            $table->double('requerim',4,2);
            $table=CamposMagicos::magicos($table);
        });
        Schema::create('h_hidrpedis', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->double('inicioxx',4,2);
            $table->double('finalxxx',4,2);
            $table->double('requerim',4,2);
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
        Schema::dropIfExists('h_hidrpedis');
        Schema::dropIfExists('hidrpedis');
    }
}
