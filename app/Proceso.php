<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Proceso extends Model {

  protected $fillable = [
      'coloraci',
      'ausepart',
      'ausefuga',
      'ausemise',
      'estado_id',
      'formulacione_id',
      'user_id',
      'nopasaxx',
      'listermi',
      'estaproc'];

  public static function comboterminado() {
    $lista = ['' => 'Seleccione'];
    foreach (Proceso::where('estaproc', 1)->where('nopasaxx', 1)->where('listermi', 0)->where('created_at','like', date('Y-m-d', time()).'%')->get() as $value) {
      $lista[$value->id] = 'Lote:'.$value->formulacione_id.' Proceso: '.$value->id;
    }
    return $lista;
  }
  public function estado() {
    return $this->belongsTo(Estado::class);
  }
  public function formulacione() {
    return $this->belongsTo(Formulacione::class);
  }
}
