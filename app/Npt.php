<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Npt extends Model {

  public static function combo($multiple=false) {
    $lista=[];
    if(!$multiple){
      $lista = ['' => 'Seleccione'];
    }
    
    foreach (Npt::all() as $key => $value) {
      $lista[$value->id] = $value->nombre;
    }
    return $lista;
  }

}
