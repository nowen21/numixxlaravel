<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Minvima extends Model {

  protected $fillable = [
      'reginvim', 'marca_id', 'estado_id'
  ];

  public static function combo() {
    $lista = ['' => 'Seleccione'];

    $minvimas = Minvima::select('minvimas.id', 'minvimas.reginvim')
                    ->join('marcas', 'minvimas.marca_id', '=', 'marcas.id')
                    ->join('medicamentos', 'marcas.medicamento_id', '=', 'medicamentos.id')
                    ->join('medicamento_npt', 'medicamentos.id', '=', 'medicamento_npt.medicamento_id')
                    ->join('casa_medicamento', 'medicamentos.id', '=', 'casa_medicamento.medicamento_id')
                    ->join('npts', 'medicamento_npt.npt_id', '=', 'npts.id')
                    ->where('casa_medicamento.estadoxx', 'A')
                    ->where('medicamento_npt.estado_id', 1)
                    ->where('medicamentos.estado_id', 1)
                    ->where('marcas.estado_id', 1)
                    ->where('minvimas.estado_id', 1)->get();
    foreach ($minvimas as $key => $value) {
      $lista[$value->id] = $value->reginvim;
    }
    return $lista;
  }

  public function marca() {
    return $this->belongsTo(Marca::class);
  }

  public function estado() {
    return $this->belongsTo(Estado::class);
  }

  public function mlotes() {
    return $this->hasMany(Mlote::class);
  }

}
