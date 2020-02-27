<?php

namespace App\Models\Formulaciones;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Ordene extends Model {

  protected $fillable = [
      'ordeprod','observac','sis_esta_id','user_crea_id','user_edita_id'
  ];
  public static function ordendia() {
    $fechahoy= date('Y-m-d', time());
    $ordendia=Ordene::where('created_at','like',"{$fechahoy}%")->first();

    if(!isset($ordendia->id)){
      $fechahoy= explode('-', $fechahoy);
      $ordendia=Ordene::create(['ordeprod'=>$fechahoy[2].$fechahoy[1].substr($fechahoy[0],2,2),
      'sis_esta_id'=>1,'user_crea_id'=>Auth::user()->id,'user_edita_id'=>Auth::user()->id

      ]);
    }
    return $ordendia->id;
  }
  public function cformulas() {
    return $this->hasMany(Cformula::class);
  }
}
