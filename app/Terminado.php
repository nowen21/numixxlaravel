<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Terminado extends Model {

  protected $fillable = [
      'completo',
      'proceso_id',
      'particul',
      'integrid',
      'contenid',
      'fugasxxx',
      'miscelas',
      'burbujas',
      'document',
      'teoricox',
      'realxxxx',
      'limitesx',
      'concepto',
      'user_id',
      'estaterm',
      'nopasaxx',
      'estado_id'];

  public function proceso() {
    return $this->belongsTo(Proceso::class);
  }

  public function estado() {
    return $this->belongsTo(Estado::class);
  }

}
