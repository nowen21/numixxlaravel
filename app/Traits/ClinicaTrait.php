<?php
namespace App\Traits;

use App\Models\Clinica\SisClinica;

trait ClinicaTrait{
    use DatatableTrait;

    public function getClinicas($request)
    {
        $paciente = SisClinica::select(['sis_clinicas.id', 'sis_clinicas.clinica', 's_estado', 'sis_clinicas.sis_esta_id'])
        ->join('sis_estas', 'sis_clinicas.sis_esta_id', '=', 'sis_estas.id')
        ->where(function($queryxxx) use($request){
          if($request->padrexxx!=1){
            $queryxxx->where('sis_clinicas.id',$request->padrexxx);
          }

        });
        return $this->getDatatable($paciente, $request);
    }
}