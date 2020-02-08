<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Departamento extends Model {
protected $fillable = [      
      'nombre',
      'estado_id'];
  public static function combo() {
    $lista = ['' => 'Seleccione'];
    foreach (Departamento::all() as $key => $value) {
      $lista[$value->id] = $value->nombre;
    }
    return $lista;
  }

}
