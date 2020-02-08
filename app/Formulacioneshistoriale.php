<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Formulacioneshistoriale extends Model {

  protected $fillable = [
      'paciente_id',
      'formulacione_id',
      'clinica_id',
      'tiempo',
      'volumen',
      'velocidad',
      'purga',
      'total',
      'peso',
      'userprep',
      'userproc',
      'userlibe',
      'ordeprod',
      'estado_id',
      'usercrea',
      'userupda',
      'usercreh',
      'userupdh',
      'fechcrea',
      'fechupda'
  ];

  public static function historial($formulac) {
    return Formulacioneshistoriale::create([
                'paciente_id' => $formulac->paciente_id,
                'formulacione_id' => $formulac->id,
                'clinica_id' => $formulac->clinica_id,
                'tiempo' => $formulac->tiempo,
                'volumen' => $formulac->volumen,
                'velocidad' => $formulac->velocidad,
                'purga' => $formulac->purga,
                'total' => $formulac->total,
                'peso' => $formulac->peso,
                'userprep' => $formulac->userprep,
                'userproc' => $formulac->userproc,
                'userlibe' => $formulac->userlibe,
                'ordeprod' => $formulac->ordeprod,
                'estado_id' => $formulac->estado_id,
                'usercreh' => $formulac->usercrea,
                'userupdh' => $formulac->userupda,
                'usercrea' => auth()->user()->id,
                'userupda' => auth()->user()->id,
                'fechcrea' => $formulac->created_at,
                'fechupda' => $formulac->updated_at
    ]);
  }

}
