<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Alerta extends Model {

  protected $fillable = [
      'clinica_id', 'leidaxxx', 'tipoalerta_id', 'tipoacione_id', 'formulacione_id'
  ];

  public function clinica() {
    return $this->belongsTo(Alerta::class);
  }

  public function formulacione() {
    return $this->belongsTo(Formulacione::class);
  }

  public function tipoacione() {
    return $this->belongsTo(Tipoacione::class);
  }

  public function tipoalerta() {
    return $this->belongsTo(Tipoalerta::class);
  }

}
