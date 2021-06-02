<?php

namespace App\Observers\Pacientes;


use App\Models\Pacientes\Logs\HPacientec;
use App\Models\Pacientes\Pacientec;
use Illuminate\Support\Facades\Auth;

class PacienteServicioObserver
{
    private function getLog($modeloxx)
    {
        $log = [];
        $log['id_old'] = $modeloxx->id;
        $log['paciente_id'] = $modeloxx->paciente_id;
        $log['servicio_id'] = $modeloxx->servicio_id;
        $log['estado_id'] = $modeloxx->estado_id;
        $log['deleted_at'] = $modeloxx->deleted_at;
        $log['user_crea_id'] = $modeloxx->user_crea_id;
        $log['user_edita_id'] = $modeloxx->user_edita_id;
        return $log;
         } 
    
    public function created(Pacientec $modeloxx)
    {
        HPacientec::create($this->getLog($modeloxx));
    }

    /**
     * Handle the Clinica "updated" event.
     *
     * @param  \App\Models\Administracion\Clinica  $modeloxx
     * @return void
     */
    public function updated(Pacientec $modeloxx)
    {
        HPacientec::create($this->getLog($modeloxx));
    }

    /**
     * Handle the Pacientec "deleted" event.
     *
     * @param  \App\Models\Medicamentos\Unidad\Pacientec  $modeloxx
     * @return void
     */
    public function deleted(Pacientec $modeloxx)
    {
        HPacientec::create($this->getLog($modeloxx));
    }

    /**
     * Handle the Pacientec "restored" event.
     *
     * @param  \App\Models\Medicamentos\Unidad\Pacientec  $modeloxx
     * @return void
     */
    public function restored(Pacientec $modeloxx)
    {
        HPacientec::create($this->getLog($modeloxx));
    }

    /**
     * Handle the Pacientec "force deleted" event.
     *
     * @param  \App\Models\Medicamentos\Unidad\Pacientec  $modeloxx
     * @return void
     */
    public function forceDeleted(Pacientec $modeloxx)
    {
        HPacientec::create($this->getLog($modeloxx));
    }
}
