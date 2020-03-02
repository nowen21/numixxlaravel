<?php

namespace App\Helpers\Medicamentos;

use App\Helpers\DatatableHelper;
use App\Models\Medicamentos\Mnpt;

class Medicames
{
    public static function getNptAsignados($request)
    {
        $paciente = Mnpt::select('mnpts.id', 'npts.nombre', "mnpts.randesde", "mnpts.ranhasta", "mnpts.rangunid",
        's_estado', 'mnpts.sis_esta_id',"mnpts.medicame_id")
            ->join('npts', 'mnpts.npt_id', '=', 'npts.id')
            ->join('sis_estas', 'mnpts.sis_esta_id', '=', 'sis_estas.id')
            ->where('mnpts.medicame_id', $request->medicame);
        return DatatableHelper::getDatatable($paciente, $request);
    }
}
