<?php

namespace App\Traits\Reportes\Excelxxx\Infoclin;

use App\Models\Clinica\Crango;
use App\Models\Formulaciones\Cformula;

/**
 * Este trait permite armar las consultas para ubicacion que arman las datatable
 */
trait DataTrait
{
    private $diferenc;
    public function getArmarData($dataxxxx)
    {

        $excelxxx = $dataxxxx['excelxxx'];
        $formulac = Cformula::select(
            [
                'cformulas.sis_clinica_id',
                'cformulas.volumen',
                'cformulas.crango_id',
                'pacientes.npt_id',
                'pacientes.nombres',
                'pacientes.apellidos',
                'pacientes.cedula'
            ]
        )
            ->join('sis_clinicas', 'cformulas.sis_clinica_id', '=', 'sis_clinicas.id')
            ->join('pacientes', 'cformulas.paciente_id', '=', 'pacientes.id')
            ->where(
                'cformulas.created_at',
                'like',
                $dataxxxx['fechaxxx'] . "%"
            )
            ->where('cformulas.crango_id','!=',null)
            ->where('clinica_id', $dataxxxx['clinicax'])
            ->get();
        $totalxxx = 0;
        foreach ($formulac as $key => $valuexxx) {
            // $rangoxxx = Crango::getRangoclinica([
            //     'clinicax' => $valuexxx->sis_clinica_id,
            //     'nptxxxxx' => $valuexxx->npt_id
            // ]);
            // ddd( $rangoxxx);
            $crangoxx = Crango::find($valuexxx->crango_id)->rcodigo->rcondici->condicio;

            $excelxxx[] = [
                'fechanpt' => $dataxxxx['fechaxxx'],
                'paciente' => $valuexxx->nombres . ' ' . $valuexxx->apellidos,
                'histclin' => $valuexxx->cedula,
                'tiponutr' => $crangoxx->condicio,
                'volulipi' => ($crangoxx->consinli == 1 || $crangoxx->consinli == 2) ? $valuexxx->volumen : '',
                'volsinli' => $crangoxx->consinli == 3 ? $valuexxx->volumen : '',
                'cantinpt' => 1,
                'valornpt' => 0,
                'totalxxx' => ['totalxxx' => 0, 'fechadia' => '']
            ];
            $totalxxx++;
        }
        if ($totalxxx > 0) {
            $excelxxx[] = [
                'totalxxx' => ['totalxxx' => $totalxxx, 'fechadia' => $dataxxxx['fechaxxx']]
            ];
        }

        return  $excelxxx;
    }
    public function getExcel($dataxxxx)
    {
        $excelxxx = [];
        $formulac = Cformula::select(['cformulas.created_at'])
            ->join('sis_clinicas', 'cformulas.sis_clinica_id', '=', 'sis_clinicas.id')
            ->whereBetween(
                'cformulas.created_at',
                [
                    "{$dataxxxx['requestx']->fechdesd} 00:00:00",
                    "{$dataxxxx['requestx']->fechasta} 23:59:59"
                ]
            )
            ->where('cformulas.crango_id','!=',null)
            ->where('clinica_id', $dataxxxx['requestx']->clinica_id)
            ->get();

        $fachasxx = [];
        foreach ($formulac as $key => $valuexxx) {
            $fechaxxy = explode(' ', $valuexxx->created_at)[0];
            if (!in_array($fechaxxy, $fachasxx)) {
                $fachasxx[] = $fechaxxy;
            }
        }
        foreach ($fachasxx as $key => $value) {
            $excelxxx = $this->getArmarData(['fechaxxx' => $value, 'clinicax' => $dataxxxx['requestx']->clinica_id, 'excelxxx' => $excelxxx]);
        }

        return $excelxxx;
    }
}
