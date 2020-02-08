<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Servicio extends Model {

  protected $fillable = [
      'nombre', 'estado_id', 'clinica_id', 'usercrea', 'userupda'
  ];

  public static function combo() {
    $lista = [];
    $servicio = Servicio::where('clinica_id', auth()->user()->clinica_id)->get();
    if (count($servicio) > 0) {
      $lista = ['' => 'Seleccione'];
      foreach ($servicio as $key => $value) {
        $lista[$value->id] = $value->nombre;
      }
    }
    return $lista;
  }

  public function clinica() {
    return $this->belongsTo(Clinica::class);
  }

  public function estado() {
    return $this->belongsTo(Estado::class);
  }

}
