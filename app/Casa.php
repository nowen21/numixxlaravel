<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Casa extends Model {

  protected $fillable = [
      'nombre', 'estado','ordecasa','nameidxx'
  ];

  public static function casascombo() {
    $lista = ['' => 'Seleccione'];
    foreach (Casa::where('estado',1)->get() as $key => $value) {
      $lista[$value->id] = $value->nombre;
    }
    return $lista;
  }
  public static function combo() {
    //$lista = ['' => 'Seleccione'];
    foreach (Casa::where('estado',1)->get() as $key => $value) {
      $lista[$value->id] = $value->nombre;
    }
    return $lista;
  }

  public function estado() {
    return $this->belongsTo(Estado::class);
  }
public function medicamentos() {
    return $this->hasMany(Medicamento::class);
  }
}
