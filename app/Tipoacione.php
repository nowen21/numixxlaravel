<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tipoacione extends Model {

  public function alertas() {
    return $this->hasMany(Alerta::class);
  }

}
