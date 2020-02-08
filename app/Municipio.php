<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Municipio extends Model {

  protected $fillable = [
      'nombre',
      'estado_id'];

  public static function combowhere($id) {
    $lista = [['id' => '', 'nombre' => 'Seleccione']];
    foreach (Municipio::where('departamento_id', $id)->orderByRaw('nombre','ASC')->get() as $key => $value) {
      $lista[] = ['id' => $value->id, 'nombre' => $value->nombre];
    }
    return $lista;
  }

  public function departamento() {
    return $this->belongsTo(Departamento::class);
  }

}
