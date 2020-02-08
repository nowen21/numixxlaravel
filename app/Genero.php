<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Genero extends Model {

  protected $fillable = [
      'nombre', 'estado',
  ];

  public static function combo() {
    $lista = ['' => 'Seleccione'];
    foreach (Genero::all() as $key => $value) {
      $lista[$value->id] = $value->nombre;
    }
    return $lista;
  }

}
