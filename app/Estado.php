<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Estado extends Model {

  public static function combo() {
    foreach (Estado::all() as $key => $value) {
      $lista[$value->id] = $value->nombre;
    }
    return $lista;
  }

}
