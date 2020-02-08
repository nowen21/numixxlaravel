<?php

namespace App;


use Illuminate\Database\Eloquent\Relations\Pivot;
class MedicamentoNpt extends Pivot {

  protected $fillable = [
      'medicamento_id',
      'npt_id',
      'estado_id','randesde','ranhasta','rangunid'
  ];

  public function medicamento() {
    return $this->belongsTo(Medicamento::class);
  }
  public function npt() {
    return $this->belongsTo(Npt::class);
  }
  public function estado() {
    return $this->belongsTo(Estado::class);
  }

}
