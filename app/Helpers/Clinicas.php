<?php

namespace App\Helpers;

use App\Models\Administracion\Rango;
use App\Models\Administracion\Servicio;
use App\Models\Clinica\Crango;
use App\Models\Clinica\SisClinica;
use App\Models\Medicamentos\Medicame;
use App\Models\Pacientes\Paciente;

class Clinicas
{
    public static function asignarMedicam($request)
    {
        return SisClinica::find($request->clinicax)->medicames()->attach(
            [$request->medicame => ['user_crea_id' => 1, 'user_edita_id' => 1, 'sis_esta_id' => 1]]
        );
    }

    public static function getMedicametos($request)
    {
        $notinxxx = [];
        $clinicas = Medicame::select('medicames.id')
            ->join('medicame_sis_clinica', 'medicames.id', '=', 'medicame_sis_clinica.medicame_id')
            ->where('medicame_sis_clinica.sis_clinica_id', $request->clinicax)
            ->get();
        foreach ($clinicas as $clinicax) {
            $notinxxx[] = $clinicax->id;
        }

        $paciente = Medicame::select('medicames.id', 'medicames.nombgene', 's_estado', 'medicames.sis_esta_id')
            ->join('sis_estas', 'medicames.sis_esta_id', '=', 'sis_estas.id')
            ->whereNotIn('medicames.id', $notinxxx)
            ->where('medicames.sis_esta_id', 1);

        return DatatableHelper::getDatatable($paciente, $request);
    }
    public static function getMedicamentosAsignados($request)
    {
        $paciente = Medicame::select('medicames.id', 'medicames.nombgene', 's_estado', 'medicames.sis_esta_id')
            ->join('medicame_sis_clinica', 'medicames.id', '=', 'medicame_sis_clinica.medicame_id')
            ->join('sis_estas', 'medicames.sis_esta_id', '=', 'sis_estas.id')
            ->where('medicame_sis_clinica.sis_clinica_id', $request->clinicax);
        return DatatableHelper::getDatatable($paciente, $request);
    }

    public static function getPacientesAsignados($request)
    {
        $paciente = Paciente::select(
            'pacientes.id',
            'pacientes.nombres',
            'pacientes.apellidos',
            's_estado',
            'pacientes.sis_esta_id'
        )
            ->join('paciente_sis_clinica', 'pacientes.id', '=', 'paciente_sis_clinica.paciente_id')
            ->join('sis_estas', 'pacientes.sis_esta_id', '=', 'sis_estas.id')
            ->where('paciente_sis_clinica.sis_clinica_id', $request->clinicax);
        return DatatableHelper::getDatatable($paciente, $request);
    }

    public static function getPacientes($request)
    {
        $notinxxx = [];
        $paciente = Paciente::select('pacientes.id')
            ->join('paciente_sis_clinica', 'pacientes.id', '=', 'paciente_sis_clinica.paciente_id')
            ->where('paciente_sis_clinica.sis_clinica_id', $request->clinicax)->get();

        foreach ($paciente as $pacientx) {
            $notinxxx[] = $pacientx->id;
        }

        $paciente = Paciente::select('pacientes.id', 'pacientes.nombres', 'pacientes.apellidos', 's_estado', 'pacientes.sis_esta_id')
            ->join('sis_estas', 'pacientes.sis_esta_id', '=', 'sis_estas.id')
            ->whereNotIn('pacientes.id', $notinxxx)
            ->where('pacientes.sis_esta_id', 1);

        return DatatableHelper::getDatatable($paciente, $request);
    }
    public static function asignarPaciente($request)
    {

        return SisClinica::find($request->clinicax)->pacientes()->attach(
            [$request->paciente => ['user_crea_id' => 1, 'user_edita_id' => 1, 'sis_esta_id' => 1]]
        );
    }



    public static function getRangosAsignados($request)
    {
        $paciente = Crango::select(
            'crangos.id',
            'rangos.ranginic',
            'rangos.rangfina',
            'condicios.condicio',
            'crangos.sis_clinica_id',
            's_estado',
            'crangos.sis_esta_id'
        )
            ->join('rangos', 'crangos.rango_id', '=', 'rangos.id')
            ->join('condicios', 'crangos.condicio_id', '=', 'condicios.id')
            ->join('sis_estas', 'rangos.sis_esta_id', '=', 'sis_estas.id')
            ->where('crangos.sis_clinica_id', $request->clinicax);
        return DatatableHelper::getDatatable($paciente, $request);
    }

    public static function getRangos($request)
    {
        
        $paciente = Rango::select(['rangos.id','rangos.ranginic','rangos.rangfina','rangos.sis_esta_id','sis_estas.s_estado'])
            ->join('sis_estas', 'rangos.sis_esta_id', '=', 'sis_estas.id')
            ->where('rangos.sis_esta_id', 1);

        return DatatableHelper::getDatatable($paciente, $request);
    }
    public static function asignarRango($request)
    {

        return SisClinica::find($request->clinicax)->rangos()->attach(
            [$request->rangoxxx => ['user_crea_id' => 1, 'user_edita_id' => 1, 'sis_esta_id' => 1]]
        );
    }

    public static function getServicios($request)
    {
        $paciente = Servicio::select(
            'servicios.id',
            'servicios.servicio',
            's_estado',
            'servicios.sis_esta_id')
            ->join('sis_estas', 'servicios.sis_esta_id', '=', 'sis_estas.id');
        return DatatableHelper::getDatatable($paciente, $request);
    }
}
