<?php

use App\CamposMagicos\CamposMagicos;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ItemOrdenes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('itemordenes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('itemxxxx');
            $table->bigInteger('rowspanx')->default(0);
            $table->bigInteger('colspanx')->default(0);
            $table->string('campoxxx')->default(0);
            $table->string('aplicaxx')->default(0);
            $table=CamposMagicos::magicos($table);

            });
    }


    /**
    * 
     * 
     * 
     * 
     * 
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('itemordenes');
    }
}
