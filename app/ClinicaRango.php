<?php

namespace App;

use Illuminate\Database\Eloquent\Relations\Pivot;

class ClinicaRango extends Pivot {

  protected $fillable = [
      'clinica_id',
      'rango_id',
      'usercrea',
      'usermodi',
      'estado_id'];

  public function estado() {
    return $this->belongsTo(Estado::class);
  }

  public function rango() {
    return $this->belongsTo(Rango::class);
  }

  public function clinica() {
    return $this->belongsTo(Clinica::class);
  }

}
