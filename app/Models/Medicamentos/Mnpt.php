<?php

namespace App\Models\Medicamentos;

use App\Models\Sistema\SisEsta;
use Illuminate\Database\Eloquent\Model;
class Mnpt extends  Model {

  protected $fillable = [
      'medicame_id',
      'npt_id',
      'sis_esta_id','randesde','ranhasta','rangunid', 'user_crea_id','user_edita_id'
  ];

  public function medicame() {
    return $this->belongsTo(Medicame::class);
  }
  public function npt() {
    return $this->belongsTo(Npt::class);
  }
  public function sis_esta() {
    return $this->belongsTo(SisEsta::class);
  }

}
