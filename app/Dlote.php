<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dlote extends Model {
   protected $fillable = [
      'fechvenc','dinvima_id','inventar','lotexxxx', 'estado_id'
  ];
   public function estado() {
    return $this->belongsTo(Estado::class);
  }
  public function dinvima(){
    return $this->belongsTo(Dinvima::class);
  }
}
