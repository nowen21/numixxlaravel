<?php
namespace App\Traits;

use App\Models\Administracion\Rango;
use App\Models\Clinica\Clinica;
use App\Models\Clinica\Crango;
use App\Models\Clinica\SisClinica;
use App\Models\Medicamentos\Medicame;

trait ClinicaTrait{
    use DatatableTrait;

    public function getListados($request)
    {
        $clinicas = Clinica::select(['clinicas.id', 'clinicas.clinica', 's_estado', 'clinicas.sis_esta_id'])
            ->join('sis_estas', 'clinicas.sis_esta_id', '=', 'sis_estas.id')
            ->where(function ($queryxxx) use ($request) {
                $clinicax=auth()->user()->sis_clinica->clinica_id;
                if ( $clinicax!= 1) {
                    $queryxxx->where('clinicas.id', $clinicax);
                }
            });
        return $this->getDatatable($clinicas, $request);
    }
    public function getSucursales($request)
    {
        $clinicas = SisClinica::select(['sis_clinicas.id','sucursal', 'nombre', 's_estado', 'sis_clinicas.sis_esta_id'])
            ->join('municipios', 'sis_clinicas.sis_esta_id', '=', 'municipios.id')
            ->join('sis_estas', 'sis_clinicas.sis_esta_id', '=', 'sis_estas.id')
            ->where(function ($queryxxx) use ($request) {
                    $queryxxx->where('sis_clinicas.clinica_id', $request->padrexxx);
            });
        return $this->getDatatable($clinicas, $request);
    }

    public function getAsignados($request)
    {
        $paciente = Medicame::select(['medicame_sis_clinica.id', 'medicames.nombgene', 's_estado', 'medicame_sis_clinica.sis_esta_id'])
            ->join('medicame_sis_clinica', 'medicames.id', '=', 'medicame_sis_clinica.medicame_id')
            ->join('sis_estas', 'medicame_sis_clinica.sis_esta_id', '=', 'sis_estas.id')
            ->where('medicame_sis_clinica.sis_clinica_id', $request->padrexxx);
        return $this->getDatatable($paciente, $request);
    }

    public  function getMedicametos($request)
    {
        $clinicas = Medicame::select('medicames.id')
            ->join('medicame_sis_clinica', 'medicames.id', '=', 'medicame_sis_clinica.medicame_id')
            ->where('medicame_sis_clinica.sis_clinica_id', $request->padrexxx)
            ->get();
        $paciente = Medicame::select('medicames.id', 'medicames.nombgene', 's_estado', 'medicames.sis_esta_id')
            ->join('sis_estas', 'medicames.sis_esta_id', '=', 'sis_estas.id')
            ->whereNotIn('medicames.id', $clinicas)
            ->where('medicames.sis_esta_id', 1);

        return $this->getDatatable($paciente, $request);
    }

    public  function getRangosAsignados($request)
    {
        $paciente = Crango::select(
            'crangos.id',
            'rangos.ranginic',
            'rangos.rangfina',
            'condicios.condicio',
            'rcodigos.codiprod',
            'crangos.sis_clinica_id',
            's_estado',
            'crangos.sis_esta_id'
        )
            ->join('rcodigos', 'crangos.rcodigo_id', '=', 'rcodigos.id')
            ->join('rcondicis', 'rcodigos.rcondici_id', '=', 'rcondicis.id')
            ->join('condicios', 'rcondicis.condicio_id', '=', 'condicios.id')
            ->join('rnpts', 'rcondicis.rnpt_id', '=', 'rnpts.id')
            ->join('rangos', 'rnpts.rango_id', '=', 'rangos.id')
            ->join('sis_estas', 'crangos.sis_esta_id', '=', 'sis_estas.id')
            ->where('crangos.sis_clinica_id', $request->padrexxx);
        return $this->getDatatable($paciente, $request);
    }

    public  function getRangos($request)
    {

        $paciente = Rango::select(['rangos.id', 'rangos.ranginic', 'rangos.rangfina', 'rangos.sis_esta_id', 'sis_estas.s_estado'])
            ->join('sis_estas', 'rangos.sis_esta_id', '=', 'sis_estas.id')
            ->where('rangos.sis_esta_id', 1);

        return $this->getDatatable($paciente, $request);
    }
}
