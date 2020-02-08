<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ordene extends Model {

  protected $fillable = [
      'ordeprod','observac'
  ];
  public static function ordendia() {
    $fechahoy= date('Y-m-d', time());
    $ordendia=Ordene::where('created_at','like',"{$fechahoy}%")->first();

    if(!isset($ordendia->id)){
      $fechahoy= explode('-', $fechahoy);
      $ordendia=Ordene::create(['ordeprod'=>$fechahoy[2].$fechahoy[1].substr($fechahoy[0],2,2)]);
    }
    return $ordendia->ordeprod;
  }
  public function formulaciones() {
    return $this->hasMany(Formulacione::class);
  }
}
