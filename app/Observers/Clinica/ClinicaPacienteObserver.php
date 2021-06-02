<?php

namespace App\Observers\Clinica;

use app\Models\Clinica\ClinicaPaciente;
use App\Models\Clinica\Logs\HClinicaPaciente;
use Illuminate\Support\Facades\Auth;

class ClinicaPacienteObserver
{
    private function getLog($modeloxx)
    {
        $log = [];
        $log['id_old'] = $modeloxx->id;
        $log['clinica_id'] = $modeloxx->clinica_id;
        $log['paciente_id'] = $modeloxx->paciente_id;
        $log['estado_id'] = $modeloxx->estado_id;
        $log['deleted_at'] = $modeloxx->deleted_at;
        $log['user_crea_id'] = $modeloxx->user_crea_id;
        $log['metodoxx'] = request()->method();
        $log['user_edita_id'] = $modeloxx->user_edita_id;
        $log['rutaxxxx'] = request()->fullUrl();
        $log['ipxxxxxx'] = request()->ip();
        return $log;
    } 
    
    public function created(ClinicaPaciente $modeloxx)
    {
        HClinicaPaciente::create($this->getLog($modeloxx));
    }

    /**
     * Handle the ClinicaPaciente "updated" event.
     *
     * @param  \App\Models\Administracion\ClinicaPaciente  $modeloxx
     * @return void
     */
    public function updated(ClinicaPaciente $modeloxx)
    {
        HClinicaPaciente::create($this->getLog($modeloxx));
    }

    /**
     * Handle the ClinicaPaciente "deleted" event.
     *
     * @param  \App\Models\Medicamentos\Unidad\ClinicaPaciente  $modeloxx
     * @return void
     */
    public function deleted(ClinicaPaciente $modeloxx)
    {
        HClinicaPaciente::create($this->getLog($modeloxx));
    }

    /**
     * Handle the ClinicaPaciente "restored" event.
     *
     * @param  \App\Models\Medicamentos\Unidad\ClinicaPaciente  $modeloxx
     * @return void
     */
    public function restored(ClinicaPaciente $modeloxx)
    {
        HClinicaPaciente::create($this->getLog($modeloxx));
    }

    /**
     * Handle the ClinicaPaciente "force deleted" event.
     *
     * @param  \App\Models\Medicamentos\Unidad\ClinicaPaciente  $modeloxx
     * @return void
     */
    public function forceDeleted(ClinicaPaciente $modeloxx)
    {
        HClinicaPaciente::create($this->getLog($modeloxx));
    }
}
