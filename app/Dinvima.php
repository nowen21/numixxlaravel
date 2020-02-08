<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dinvima extends Model {

  protected $fillable = [
      'reginvim','dmarca_id', 'estado_id'
  ];

   public static function combo() {
    $lista = ['' => 'Seleccione'];
    foreach (Dinvima::all() as $key => $value) {
      $lista[$value->id] = $value->reginvim;
    }
    return $lista;
  }
  public function estado() {
    return $this->belongsTo(Estado::class);
  }
  public function dmarca() {
    return $this->belongsTo(Dmarca::class);
  }
}
