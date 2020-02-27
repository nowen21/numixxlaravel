<?php

namespace App\Models\Formulaciones;

use App\Models\Medicamentos\Medicame;
use App\Models\Medicamentos\Mlote;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Dformula extends Model {

  protected $fillable = [
      'cformula_id',
      'medicame_id',
      'preparar_id',
      'cantidad',
      'rtotal',
      'volumen',
      'purga',
      'user_crea_id',
      'user_edita_id',
      'sis_esta_id'
  ];

  public static function combo($medicamento) {
    $lista = [];
    $medic = Dformula::whereIn('idformulacion', $medicamento)->get();
    foreach ($medic as $key => $value) {
      $lista[] = [
          'medicamento' => $value->medicamento,
          'cantidad' => $value->cantidad,
          'volumen' => $value->volumen,
      ];
    }
    return $lista;
  }
  public function medicame() {
    return $this->belongsTo(Medicame::class);
  }
  public function mlotes() {
    return $this->belongsToMany(Mlote::class);
  }
  public function dfmlotes() {
    return $this->hasMany(Dfmlote::class);
  }

  public static function transaccion($dataxxxx,  $objetoxx)
  {
    $usuariox = DB::transaction(function () use ($dataxxxx, $objetoxx) {
      $totalxxx = 0;

      foreach ($dataxxxx as $key => $value) {
        $data = explode('_', $key);
        if (isset($data[1]) && $data[1] == 'volu') {
          $totalxxx +=  $dataxxxx[$key];
        }
      }

      $dataxxxx['user_edita_id'] = Auth::user()->id;

      if ($objetoxx != '') {
        $objetoxx->update($dataxxxx);
      } else {
        $dataxxxx['sis_esta_id'] = 1;
        $dataxxxx['user_crea_id'] = Auth::user()->id;
        //ddd( $dataxxxx);
        $objetoxx = Cformula::create($dataxxxx);
      }

      return $objetoxx;
    }, 5);
    return $usuariox;
  }
}
