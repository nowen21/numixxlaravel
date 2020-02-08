<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Detallealistamiento extends Model {

  protected $fillable = [
      'cabeceralistamiento_id',
      'campo_id',
      'unidad',
      'cantcons',
      'diferenc',
      'fechcrea',
  ];

}