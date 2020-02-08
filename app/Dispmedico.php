<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dispmedico extends Model {

  protected $fillable = [
      'nombgene',
      'concentr',
      'unidmedi',
      'estado_id',
  ];

  public function estado() {
    return $this->belongsTo(Estado::class);
  }

  public static function comboinvima() {
    $lista = ['' => 'Seleccione'];
    $medic = Dispmedico::all();
    foreach ($medic as $key => $value) {
      $lista[$value->id] = $value->nombgene;
    }
    return $lista;
  }
  public function marcas() {
    return $this->hasMany(Dmarca::class);
  }
}
