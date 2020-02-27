<?php

namespace App\Helpers;

use App\Models\Formulaciones\Cformula;
use App\Models\Pacientes\Paciente;

class Pacientes
{

    public static function getPacientes($request)
    {
        $paciente = Paciente::select([
            'pacientes.id', 'pacientes.nombres', 'pacientes.apellidos', 'pacientes.sis_esta_id',
            'sis_estas.s_estado'
        ])
            ->join('sis_estas', 'pacientes.sis_esta_id', '=', 'sis_estas.id');

        return DatatableHelper::getDatatable($paciente, $request);
    }

    public static function getCalcularedad($request)
    {
        return Fechas::getEdad($request);
    }

    public static function getPacientesCformula($request)
    {
        $paciente = Cformula::select([
            'cformulas.id', 'cformulas.tiempo', 'cformulas.velocidad','cformulas.volumen',
            'cformulas.purga','cformulas.peso', 'cformulas.total','cformulas.sis_esta_id',
            'sis_estas.s_estado','cformulas.paciente_id',
        ])
            ->join('sis_estas', 'cformulas.sis_esta_id', '=', 'sis_estas.id');

        return DatatableHelper::getDatatable($paciente, $request);
    }
}
