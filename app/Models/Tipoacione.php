<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tipoacione extends Model {

  public function alertas() {
    return $this->hasMany(Alerta::class);
  }

}