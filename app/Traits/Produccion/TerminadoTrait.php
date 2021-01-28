<?php

namespace App\Traits\Produccion;


trait TerminadoTrait
{
    public function getPorcentaje($dataxxxx,$respuest)
    {
        $pesoreal = $dataxxxx['pesoteor'] * $dataxxxx['porcenta'] + $dataxxxx['pesoteor'];
        if ($dataxxxx['pesoreal']  > $pesoreal) {
            $respuest['limitesx']['valuexxx'] = 1;
            $respuest['limitesx']['opcionxx'] = 'NO';
            $respuest['concepto']['valuexxx'] = 1;
            $respuest['concepto']['opcionxx'] = 'RECHAZADO';
        }
        $respuest['limitesx']['messagex'] = "El lpeso real: {$dataxxxx['pesoreal']} es superior al peso teórico : {$dataxxxx['pesoteor']}";
        return $respuest;
    }
    public function validar($dataxxxx)
    {
        $respuest = [
            'limitesx' => [
                'valuexxx' => 2, 'opcionxx' => 'SI', 'campoxxx' => '#limitesx','messagex'=>''
            ],
            'concepto' => [
                'valuexxx' => 2, 'opcionxx' => 'APROBADO', 'campoxxx' => '#concepto'
            ]
        ];

        if ($dataxxxx['pesoreal'] < $dataxxxx['pesoteor']) {
            $respuest['limitesx']['valuexxx'] = 1;
            $respuest['limitesx']['opcionxx'] = 'NO';
            $respuest['concepto']['valuexxx'] = 1;
            $respuest['concepto']['opcionxx'] = 'RECHAZADO';
            $respuest['limitesx']['messagex'] = "El dpeso real: {$dataxxxx['pesoreal']} es inferior al peso teórico : {$dataxxxx['pesoteor']}";
        } elseif ($dataxxxx['pesoteor'] < 1000) { //pediatricos y neonatos
            $dataxxxx['porcenta'] = 0.05;
            $respuest = $this->getPorcentaje(0.05,$respuest);
        } elseif ($dataxxxx['pesoteor'] >= 1000) { // adultos
            $dataxxxx['porcenta'] = 0.1;
            $respuest = $this->getPorcentaje($dataxxxx,$respuest);
        }
        return $respuest;
    }
}
