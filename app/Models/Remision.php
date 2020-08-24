<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Remision extends Model {

  protected $fillable = [
      'orden_id', 'usercrea', 'sis_esta_id', 'user_crea_id', 'user_edita_id'
  ];



}
