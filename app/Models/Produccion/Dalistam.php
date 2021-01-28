<?php

namespace App\Models\Produccion;

use App\Models\Sistema\SisEsta;
use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Dalistam extends Model
{

  protected $fillable = [
    'calistam_id',
    'campo_id',
    'unidad',
    'cantcons',
    'diferenc',
    'fechcrea',
    'sis_esta_id',
    'user_crea_id',
    'user_edita_id'
  ];
  public function creador()
  {
    return $this->belongsTo(User::class, 'user_crea_id');
  }
  public function editor()
  {
    return $this->belongsTo(User::class, 'user_edita_id');
  }
  public function sis_esta()
  {
    return $this->belongsTo(SisEsta::class);
  }

  public static function setAlistamiento($objetoxx, $campoxxx, $valorxxx)
  {
    $valorxxy = Dalistam::where('calistam_id', $objetoxx->id)->where('campo_id', 'like', $campoxxx)->first(); //echo 'kkkk '.$valorxxy.'<br>';
    $dataxxxx['user_edita_id'] = Auth::user()->id;
    $dataxxxx['unidad'] = $valorxxx;
    if (isset($valorxxy->id)) {
      $valorxxy->update($dataxxxx);
    } else {
      $dataxxxx['sis_esta_id'] = 1;
      $dataxxxx['user_crea_id'] = Auth::user()->id;
      $dataxxxx['calistam_id'] = $objetoxx->id;
      $dataxxxx['campo_id'] = $campoxxx;
      Dalistam::create($dataxxxx);
    }
  }
  public static function setConciliacion($objetoxx, $campoxxx, $valorxxx)
  {
    $campoxxx=explode('_', $campoxxx);
    $campoxxx=$campoxxx[0].'_'.$campoxxx[1];
    $valorxxy = Dalistam::where('calistam_id', $objetoxx->id)->where('campo_id', 'like', $campoxxx)->first(); //echo 'kkkk '.$valorxxy.'<br>';
    $dataxxxx['user_edita_id'] = Auth::user()->id;

    $dataxxxx['diferenc'] = $valorxxx;
    $dataxxxx['cantcons'] = $valorxxy->unidad -$valorxxx;
    $valorxxy->update($dataxxxx);  
  }
  public static function transaccion($dataxxxx,  $objetoxx)
  {
    $usuariox = DB::transaction(function () use ($dataxxxx,  $objetoxx) {
      foreach ($dataxxxx as $campoxxx => $valorxxx) { 
        $campexpl = explode('_', $campoxxx);
        if (count($campexpl) > 1) {
          $valorxxx = $valorxxx == '' ? 0 : $valorxxx;
          if ($campexpl[0] == 'dispo' || $campexpl[0] == 'medic') { // indica desde donde estan los campos para el detalle, los anteriores son objetoxx
            if ($dataxxxx['dalistax']) {
              Dalistam::setAlistamiento($objetoxx, $campoxxx, $valorxxx);
            } else {
              
              Dalistam::setConciliacion($objetoxx, $campoxxx, $valorxxx);
            }
          }
        }
      }
    }, 5);
    return $usuariox;
  }
}
