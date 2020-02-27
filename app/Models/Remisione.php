<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Remisione extends Model {

  protected $fillable = [
      'clinica_rango_id', 'usercrea', 'estado_id', 'usermodi', 'ordeprod'
  ];

  public function clinica_rango() {
    return $this->belongsTo(ClinicaRango::class);
  }

  public function estado() {
    return $this->belongsTo(Estado::class);
  }

}
