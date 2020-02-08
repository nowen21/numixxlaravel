<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cabeceralistamiento extends Model {

  protected $fillable = [
      'producto',
      'ordepres',
      'estado_id',
  ];
  public function estado() {
    return $this->belongsTo(Estado::class);
  }
}
