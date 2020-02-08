<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Marca extends Model {

  protected $fillable = [
      'nombcome', 'osmorali', 'pesoespe', 'formfarm', 'estado_id', 'marcaxxx', 'medicamento_id'
  ];

  public static function combo() {
    $lista = ['' => 'Seleccione'];
    $marcasxx = Marca::
                    join('medicamentos', 'marcas.medicamento_id', '=', 'medicamentos.id')
                    ->join('medicamento_npt', 'medicamentos.id', '=', 'medicamento_npt.medicamento_id')
                    ->join('casa_medicamento', 'medicamentos.id', '=', 'casa_medicamento.medicamento_id')
                    ->join('npts', 'medicamento_npt.npt_id', '=', 'npts.id')
                    ->where('casa_medicamento.estadoxx', 'A')
                    ->where('medicamento_npt.estado_id', 1)
                    ->where('medicamentos.estado_id', 1)
                    ->where('marcas.estado_id', 1)->get();

    foreach ($marcasxx as $key => $value) {
      $lista[$value->id] = $value->nombcome;
    }
    return $lista;
  }

  public function medicamento() {
    return $this->belongsTo(Medicamento::class);
  }

  public function estado() {
    return $this->belongsTo(Estado::class);
  }

  public function minvimas() {
    return $this->hasMany(Minvima::class);
  }

  public static function verificarinventario($medicame) {
    $error = '';
    if ($medicame == 17) {
      $error = '';
    }
    return Marca::join('minvimas', 'marcas.id' . $error, 'minvimas.marca_id')
                    ->join('mlotes', 'minvimas.id', 'mlotes.minvima_id')
                    ->where('marcas.medicamento_id', $medicame)
                    ->where('mlotes.estado_id', 1)
                    ->get();
  }

}
