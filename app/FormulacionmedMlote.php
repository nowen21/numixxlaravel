<?php

namespace App;

use Illuminate\Database\Eloquent\Relations\Pivot;

class FormulacionmedMlote extends Pivot {

  protected $fillable = [
      'formulacionmed_id',
      'mlote_id',
      'volumenx',
      'usercrea',
      'userupda',
  ];
}
