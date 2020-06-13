<?php

namespace App\Traits\Produccion;


trait TerminadoTrait
{
    public function getPorcentaje($dataxxxx)
    {
        $pesoreal = $dataxxxx['pesoteor'] * $dataxxxx['porcenta'] + $dataxxxx['pesoteor'];
        $respuest['valuexxx'] = 2;
        $respuest['opcionxx'] = 'SI' ;
        if ($dataxxxx['pesoreal']  > $pesoreal) {
            $respuest['valuexxx'] = 1;
            $respuest['opcionxx'] = 'NO';
        }
        $respuest['messagex'] = "El peso real: {$dataxxxx['pesoreal']} es superior al peso teórico : {$dataxxxx['pesoteor']}";
        return $respuest;
    }
    public function validar($dataxxxx)
    {
        $respuest = [];
        $respuest['valuexxx'] = 2;
        $respuest['opcionxx'] = 'SI';
        if ($dataxxxx['pesoreal'] < $dataxxxx['pesoteor']) {
            $respuest['valuexxx'] = 1;
            $respuest['opcionxx'] = 'NO';
            $respuest['messagex'] = "El peso real: {$dataxxxx['pesoreal']} es inferior al peso teórico : {$dataxxxx['pesoteor']}";
        } elseif ($dataxxxx['pesoteor'] < 1000) { //pediatricos y neonatos
            $dataxxxx['porcenta'] = 0.05;
            $respuest = $this->getPorcentaje(0.05);
        } elseif ($dataxxxx['pesoteor'] >= 1000) { // adultos
            $dataxxxx['porcenta'] = 0.1;
            $respuest = $this->getPorcentaje($dataxxxx);
        }
        return $respuest;
    }
}
