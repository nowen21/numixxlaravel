<?php

namespace app\Models\Clinica;

use App\Models\Paciente;
use Illuminate\Database\Eloquent\Relations\Pivot;

class ClinicaPaciente extends Pivot {
protected $fillable = [
      'clinica_id', 'paciente_id', 'estado_id'
  ];
  public function clinica() {
    return $this->belongsTo(Clinica::class);
  }

  public function paciente() {
    return $this->belongsTo(Paciente::class);
  }

}
