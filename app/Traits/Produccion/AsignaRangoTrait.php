<?php

namespace App\Traits\Produccion;

use App\Models\Clinica\Crango;

trait AsignaRangoTrait
{

    public function getLipidosART($dataxxxx)
    {
        $lipidoxx = null;
        // identificar si la formulación tiene lípidos
        foreach ($dataxxxx['cformula']->dformulas as $key => $dformula) {
            $lipidoxy = $dformula->medicame->casa->where('id', 16)->first();
            if (isset($lipidoxy->id)) {
                $lipidoxx = $lipidoxy;
            }
        }
        // armar los parametros de consulta para el rango
        $consinli = [3];
        if ($lipidoxx!=null) {
            $consinli = [1, 2];
        }
        return $consinli;
    }
    public function getConsultarRangosART($dataxxxx)
    {
        // Consulta del rango para la formulación
        $registro = Crango::select('crangos.id', 'rangos.ranginic', 'rangos.rangfina','condicios.condicio')
            ->join('rcodigos', 'crangos.rcodigo_id', '=', 'rcodigos.id')
            ->join('rcondicis', 'rcodigos.rcondici_id', '=', 'rcondicis.id')
            ->join('condicios', 'rcondicis.condicio_id', '=', 'condicios.id')
            ->join('rnpts', 'rcondicis.rnpt_id', '=', 'rnpts.id')
            ->join('rangos', 'rnpts.rango_id', '=', 'rangos.id')
            ->where('rangos.ranginic', '<', $dataxxxx['cformula']->total)
            ->where('rangos.rangfina', '>', $dataxxxx['cformula']->total)
            ->where('crangos.sis_clinica_id', $dataxxxx['cformula']->sis_clinica_id)
            ->where('rnpts.npt_id', $dataxxxx['cformula']->paciente->npt_id)
            ->where('crangos.sis_esta_id', 1)
            ->whereIn('condicios.consinli', $this->getLipidosART($dataxxxx))
            ->orderBy('rangos.ranginic', 'DESC')
            ->get();
        return $registro;
    }
    public function getRangosART($dataxxxx)
    {
       return $this->getConsultarRangosART($dataxxxx);
    }
}
