<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dmarca extends Model
{
     protected $fillable = [
      'nombcome', 'osmorali', 'pesoespe', 'formfarm', 'estado_id','dispmedico_id','marcaxxx'
  ];

  public static function combo() {
    $lista = ['' => 'Seleccione'];
    foreach (Dmarca::all() as $key => $value) {
      $lista[$value->id] = $value->nombcome;
    }
    return $lista;
  }
  public function estado() {
    return $this->belongsTo(Estado::class);
  }
  public function dispmedico() {
    return $this->belongsTo(Dispmedico::class);
  }
}
