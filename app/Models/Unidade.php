<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Description of Unidade
 *
 * @author Nowen21
 */
class Unidade extends Model {

  protected $fillable = [
      'unidad'
  ];

  public static function combo() {
    $lista = ['' => 'UNIDAD'];
    foreach (Unidade::all() as $key => $value) {
      $lista[$value->id] = $value->nombre;
    }
    return $lista;
  }

}
