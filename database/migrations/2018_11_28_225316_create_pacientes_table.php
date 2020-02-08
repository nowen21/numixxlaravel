<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePacientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pacientes',function(Blueprint $table){
          $table->increments('id');
          $table->date('registro');
          $table->integer('nume_lote');
          $table->string('cedula',15);
          $table->string('nombres',50);
          $table->string('apellidos',50);
          $table->integer('peso');
          $table->integer('genero');
          $table->integer('eps');
          $table->integer('cama');
          $table->integer('servicio');
          $table->integer('edad');
          $table->integer('institucion');
          $table->integer('departamento');
          $table->integer('municipio');
          $table->integer('npt');         
          $table->integer('ips');
          $table->integer('estado',4);
          $table->timestamps();
          
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
       Schema::drop('pacientes');
    }
}
