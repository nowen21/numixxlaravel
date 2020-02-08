<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Historialformulacionmed extends Model {

  protected $fillable = [
      'formulacioneshistoriale_id',
      'formulacione_id',
      'formulacionmed_id',
      'medicamento_id',
      'preparar',
      'cantidad',
      'rtotal',
      'volumen',
      'purga',
      'usercreh',
      'usercrea',
      'userupdh',
      'userupda',
      'fechcrea',
      'fechupda',
  ];

  public static function historial($formedic,$padrexxx) {
    Historialformulacionmed::create([
        'formulacioneshistoriale_id'=>$padrexxx,
        'formulacione_id'=>$formedic->formulacione_id,
        'formulacionmed_id'=>$formedic->id,
        'medicamento_id'=>$formedic->medicamento_id,
        'preparar'=>$formedic->preparar,
        'cantidad'=>$formedic->cantidad,
        'rtotal'=>$formedic->rtotal,
        'volumen'=>$formedic->volumen,
        'purga'=>$formedic->purga,
        'usercreh'=>$formedic->usercrea,
        'usercrea'=>auth()->user()->id,
        'userupdh'=>$formedic->userupda,
        'userupda'=>auth()->user()->id,
        'fechcrea'=>$formedic->created_at,
        'fechupda'=>$formedic->updated_at,
    ]);
  }

}
