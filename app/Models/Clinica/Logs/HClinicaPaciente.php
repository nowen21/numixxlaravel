<?php

namespace App\Models\Clinica\Logs;


use Illuminate\Database\Eloquent\Relations\Pivot;

class HClinicaPaciente extends Pivot {
protected $fillable = [
      'clinica_id', 'paciente_id', 'estado_id','user_edita_id', 'user_crea_id',  'id_old',
      'sis_esta_id',
      'rutaxxxx',
      'metodoxx',
      'ipxxxxxx',
  ];

}
