<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Formulacionmed extends Model {

  protected $fillable = [
      'formulacione_id',
      'medicamento_id',
      'preparar',
      'cantidad',
      'rtotal',
      'volumen',
      'purga',
      'usercrea',
      'userupda',
  ];

  public static function combo($medicamento) {
    $lista = [];
    $medic = Formulacionmed::whereIn('idformulacion', $medicamento)->get();
    foreach ($medic as $key => $value) {
      $lista[] = [
          'medicamento' => $value->medicamento,
          'cantidad' => $value->cantidad,
          'volumen' => $value->volumen,
      ];
    }
    return $lista;
  }
  public function medicamento() {
    return $this->belongsTo(Medicamento::class);
  }
  public function mlotes() {
    return $this->belongsToMany(Mlote::class);
  }
  public function formulacionmedflote() {
    return $this->hasMany(FormulacionmedMlote::class);
  }
}
