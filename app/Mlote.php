<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mlote extends Model {

  protected $fillable = [
      'fechvenc', 'minvima_id', 'inventar', 'lotexxxx', 'estado_id', 'usercrea', 'userupda'
  ];

  public function estado() {
    return $this->belongsTo(Estado::class);
  }

  public function minvima() {
    return $this->belongsTo(Minvima::class);
  }

  /*
   * utilizado para descontar el inventario de la formulación
   * 
   */

  public function formululacionmeds() {
    return $this->belongsToMany(Formulacionmed::class);
  }

  public static function consultarinventario($formmedi) {
    $mlotexxx = Medicamento::select('mlotes.id', 'mlotes.inventar')
                    ->join('marcas', 'medicamentos.id', 'marcas.medicamento_id')
                    ->join('minvimas', 'marcas.id', 'minvimas.marca_id')
                    ->join('mlotes', 'minvimas.id', 'mlotes.minvima_id')
                    ->where('medicamentos.id', $formmedi->medicamento_id)
                    ->where('mlotes.inventar', '>', 0)
                    ->where('mlotes.estado_id', 1)
                    ->orderBy('mlotes.fechvenc', 'asc')->get();
    return $mlotexxx;
  }

  public function inactivarvencidos() {
    $fechahoy = date('Y-m-d', time());
    foreach (Mlote::where('estado_id', 1)->get() as $value) {
      if ($fechahoy >= $value->fechvenc) {
        $value->update(['estado_id' => 2]);
      }
    }
  }

}
