<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rango extends Model {

  protected $fillable = [
      'ranginic',
      'rangfina',
      'usercrea',
      'usermodi',
      'estado_id'];

  public function estado() {
    return $this->belongsTo(Estado::class);
  }

}
