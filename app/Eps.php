<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Eps extends Model {

  protected $fillable = [
       'nombre', 'estado'
  ];

  public static function combo() {
    $lista = ['' => 'Seleccione'];
    foreach (Eps::all() as $key => $value) {
      $lista[$value->id] = $value->nombre;
    }
    return $lista;
  }

}
