<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Medicamento extends Model {

  protected $fillable = [
      'nombgene',
      'concentr',
      'unidmedi',
      'estado_id',
      'casa_id',
      'clinica_id',
  ];

  public static function combo($casa, $medicamento) {
    $medic = '';
    $lista = ['' => 'Seleccione'];
    if (count($medicamento) > 0) {
      $medic = Medicamento::whereIn('id', $medicamento)->get();
    } else {
      $medic = Medicamento::where(['casa_id' => $casa])->get();
    }
    foreach ($medic as $key => $value) {
      $lista[$value->id] = $value->nombregen;
    }
    return $lista;
  }

  public static function combomarca() {
    $lista = ['' => 'Seleccione'];
    $medic = Medicamento::select('medicamentos.id', 'medicamentos.nombgene', 'npts.nombre')
            ->join('medicamento_npt', 'medicamentos.id', '=', 'medicamento_npt.medicamento_id')
            ->join('npts', 'medicamento_npt.npt_id', '=', 'npts.id')
            ->where('medicamento_npt.estado_id', 1)
            ->where('medicamentos.estado_id', 1)
            ->get();
    foreach ($medic as $key => $value) {
      $lista[$value->id] = $value->nombgene . ' (' . $value->nombre . ')';
    }
    return $lista;
  }

  public static function combo1($casaidxx, $tipocomb, $nptidxxx, $dataxxxx) {
    $lista = [];
    $error = '';
    if ($casaidxx == 9) {
      $error = '';
    }
    $medic = Medicamento::select('medicamentos.id' . $error, 'medicamentos.nombgene', 'medicamentos.unidmedi')
            ->join('medicamento_npt', 'medicamentos.id', '=', 'medicamento_npt.medicamento_id')
            ->where('medicamento_npt.estado_id', 1)
            ->where('medicamento_npt.npt_id', $nptidxxx->npt_id)
            ->where('medicamentos.casa_id', $casaidxx)
            ->get();
    $unidadxx = '';
    foreach ($medic as $key => $value) {
      if ($tipocomb) {
        $unidadxx = $value->unidmedi;
        if ($dataxxxx['selectxx']) {
          $existexx = Formulacionmed::where('formulacione_id', $dataxxxx['formulac'])->where('medicamento_id', $value->id)->first();
          if (count($existexx) > 0) {
            $lista[$value->id] = $value->nombgene;
          }
        } else {
          $inventar = Marca::verificarinventario($value->id);
          if (count($inventar) > 0 || $dataxxxx['editarxx']) { // solo traer los que tienen inventario o si es edicicion
            $lista[$value->id] = $value->nombgene;
          }
        }
      } else {
        $lista[] = $value->id;
      }
    }
    return ['listaxxx' => $lista, 'unidadxx' => $unidadxx];
  }

  public function estado() {
    return $this->belongsTo(Estado::class);
  }

//  public function casa() {
//    return $this->belongsTo(Casa::class);
//  }

  public function npts() {
    return $this->belongsToMany(Npt::class);
  }

  public function marcas() {
    return $this->hasMany(Marca::class);
  }

  public function casa() {
    return $this->belongsTo(Casa::class);
  }
  public function clinica() {
    return $this->belongsTo(Clinica::class);
  }
  public function casas() {
    return $this->belongsToMany(Casa::class);
  }

}
