<?php

namespace App\Helpers\Produccion;

use App\Helpers\DatatableHelper;
use App\Models\Formulaciones\Cformula;
use App\Models\Produccion\Calistam;
use App\Models\Produccion\Proceso;
use App\Models\Produccion\Terminado;

class Produccion
{
    public static function getPacientesCformula($request)
    {
        $paciente = Cformula::select([
            'cformulas.id', 'cformulas.tiempo', 'cformulas.velocidad', 'cformulas.volumen',
            'cformulas.purga', 'cformulas.peso', 'cformulas.total', 'cformulas.sis_esta_id',
            'sis_estas.s_estado', 'cformulas.paciente_id',
        ])
            ->join('sis_estas', 'cformulas.sis_esta_id', '=', 'sis_estas.id');

        return DatatableHelper::getDatatable($paciente, $request);
    }
    public static function getAlistamientos($request)
    {
        $paciente = Calistam::select([
            'calistams.id', 'calistams.producto', 'calistams.ordepres', 'calistams.sis_esta_id',
            'sis_estas.s_estado', 'calistams.created_at'
        ])
            ->join('sis_estas', 'calistams.sis_esta_id', '=', 'sis_estas.id');

        return DatatableHelper::getDatatable($paciente, $request);
    }

    public static function getPacientesPreparacion($request)
    {
        $paciente = Cformula::select([
            'cformulas.id', 'cformulas.sis_esta_id',
            'sis_estas.s_estado',
            'sis_clinicas.clinica','pacientes.nombres','pacientes.apellidos','pacientes.cedula','cformulas.userprep_id'
        ])
            ->join('pacientes', 'cformulas.paciente_id', '=', 'pacientes.id')
            ->join('sis_clinicas', 'cformulas.sis_clinica_id', '=', 'sis_clinicas.id')
            ->join('sis_estas', 'cformulas.sis_esta_id', '=', 'sis_estas.id');

        return DatatableHelper::getDatatable($paciente, $request);
    }

    public static function getControles($request)
    {
        $paciente = Proceso::select([
            'procesos.id', 'procesos.sis_esta_id',
            'sis_estas.s_estado','procesos.cformula_id','procesos.created_at','procesos.updated_at'
        ])        
            ->join('sis_estas', 'procesos.sis_esta_id', '=', 'sis_estas.id');

        return DatatableHelper::getDatatable($paciente, $request);
    }
    public static function getTerminados($request)
    {
        $paciente = Terminado::select([
            'terminados.id', 'terminados.sis_esta_id','terminados.proceso_id',
            'sis_estas.s_estado','procesos.cformula_id','terminados.created_at'
        ])    
        ->join('procesos', 'terminados.proceso_id', '=', 'procesos.id')
            ->join('sis_estas', 'terminados.sis_esta_id', '=', 'sis_estas.id');

        return DatatableHelper::getDatatable($paciente, $request);
    }

    public static function getConciliaciones($request)
    {
        $paciente = Calistam::select([
            'calistams.id', 'calistams.producto', 'calistams.ordepres', 'calistams.sis_esta_id',
            'sis_estas.s_estado', 'calistams.created_at'
        ])
            ->join('sis_estas', 'calistams.sis_esta_id', '=', 'sis_estas.id');

        return DatatableHelper::getDatatable($paciente, $request);
    }
}
