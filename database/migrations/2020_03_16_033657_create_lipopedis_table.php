<?php

use App\CamposMagicos\CamposMagicos;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLipopedisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lipopedis', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->double('inicioxx',4,2);
            $table->double('finalxxx',4,2);
            $table->double('requerim',4,2);
            $table=CamposMagicos::magicos($table);
        });
        Schema::create('h_lipopedis', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->double('inicioxx',4,2);
            $table->double('finalxxx',4,2);
            $table->double('requerim',4,2);
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
        Schema::dropIfExists('h_lipopedis');
        Schema::dropIfExists('lipopedis');
    }
}
