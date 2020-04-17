<?php

use App\Camposmagicos\CamposMagicos;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTerminadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('terminados', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('proceso_id')->unsigned(); //proceso al que se le va a realizar el terminado
            $table->boolean('completo'); //datos completos y correctos en la etiqueta
            $table->boolean('particul'); //ausencia de partículas
            $table->boolean('integrid'); //integridad de la bolsa o empaque primario
            $table->boolean('contenid'); //contenido/volumen completo
            $table->boolean('fugasxxx'); //ausencia de fugas
            $table->boolean('miscelas'); //ausencia de miscelas/integridad emulsion
            $table->boolean('burbujas'); //ausencia de burbujas
            $table->boolean('document'); //documentacion completa
            $table->integer('teorico_'); //peso teorico
            $table->integer('realxxx_'); //peso real
            $table->boolean('limitesx'); //peso dentro de los limites establecidos
            $table->boolean('concepto'); //Concepto (A) Aprobado (R) Rechazado
            $table->boolean('estaterm'); //estado del terminado
            $table->boolean('nopasaxx'); //indica si el control producto terminado es exitoso o no
            $table->foreign('proceso_id')->references('id')->on('procesos');
            $table=CamposMagicos::magicos($table);
        });
        Schema::create('h_terminados', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('proceso_id'); //proceso al que se le va a realizar el terminado
            $table->boolean('completo'); //datos completos y correctos en la etiqueta
            $table->boolean('particul'); //ausencia de partículas
            $table->boolean('integrid'); //integridad de la bolsa o empaque primario
            $table->boolean('contenid'); //contenido/volumen completo
            $table->boolean('fugasxxx'); //ausencia de fugas
            $table->boolean('miscelas'); //ausencia de miscelas/integridad emulsion
            $table->boolean('burbujas'); //ausencia de burbujas
            $table->boolean('document'); //documentacion completa
            $table->integer('teorico_'); //peso teorico
            $table->integer('realxxx_'); //peso real
            $table->boolean('limitesx'); //peso dentro de los limites establecidos
            $table->boolean('concepto'); //Concepto (A) Aprobado (R) Rechazado
            $table->boolean('estaterm'); //estado del terminado
            $table->boolean('nopasaxx'); //indica si el control producto terminado es exitoso o no
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
        Schema::dropIfExists('h_terminados');
        Schema::dropIfExists('terminados');
    }
}
