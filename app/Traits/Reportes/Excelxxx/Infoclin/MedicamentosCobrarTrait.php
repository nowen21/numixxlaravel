<?php

namespace App\Traits\Reportes\Excelxxx\Infoclin;

trait MedicamentosCobrarTrait
{
    public function getMedicamentosACobrarMCT($dataxxxx)
    {
        $cobrarxx = [];
        $contarxx=0;
        $cformula = $dataxxxx['cformula'];
        $medicame = $cformula->sis_clinica->medicames;
        foreach ($medicame as $key => $medicamx) {
            if ($medicamx->pivot->cobrsepa == 1) {
                $cobrarxx[] = $medicamx->id;
            }
        }

        foreach ($cformula->dformulas as $key => $value) {
            if (!in_array($value->medicame_id, $cobrarxx)) {
                unset($cformula->dformulas[$key]);
            }else {
                $contarxx++;
            }
        }
        return [$cformula->dformulas, $contarxx == 0 ? 1 : $contarxx];
    }
    public function getCobrarMCT($dataxxxx)
    {
        return $this->getMedicamentosACobrarMCT($dataxxxx);
    }
}
