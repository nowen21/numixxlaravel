<?php

namespace App\Models\Medicamentos;

use App\Models\Sistema\SisEsta;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Casa extends Model
{

  protected $fillable = [
    'casa', 'sis_esta_id', 'ordecasa', 'nameidxx','unidmedi', 'user_edita_id', 'user_crea_id'
  ];

  public static function casascombo()
  {
    $lista = ['' => 'Seleccione'];
    foreach (Casa::where('sis_esta_id', 1)->get() as $key => $value) {
      $lista[$value->id] = $value->nombre;
    }
    return $lista;
  }
  public static function combo($dataxxxx)
  {
      $comboxxx = [];
      if ($dataxxxx['cabecera']) {
          if ($dataxxxx['ajaxxxxx']) {
              $comboxxx[] = ['valuexxx' => '', 'optionxx' => 'Seleccione'];
          } else {
              $comboxxx = ['' => 'Seleccione'];
          }
      }
      $activida = Casa::where('sis_esta_id',1)->get();
      foreach ($activida as $registro) {
          if ($dataxxxx['ajaxxxxx']) {
              $comboxxx[] = ['valuexxx' => $registro->id, 'optionxx' => $registro->casa];
          } else {
              $comboxxx[$registro->id] = $registro->casa;
          }
      }
      return $comboxxx;
  }

  public function sis_esta()
  {
    return $this->belongsTo(SisEsta::class);
  }
  public function medicames()
  {
    return $this->hasMany(Medicame::class);
  }

  public static function orden($newoldxx)
  {
    $odencasa = [];
    if ($newoldxx) {
      $odencasa = ['SI' => 'POSICIÓN NUEVA'];
    }
    $totacasa = Casa::all();
    for ($key = 1; $key <= count($totacasa); $key++) {
      $odencasa[$key] = 'POSICIÓN ' . $key;
    }
    return $odencasa;
  }
  public static function asignaorden($ordecasa, $pcasaxxx, $newoldxx)
  {
    $casasxxx = Casa::all();
    //ddd($pcasaxxx->ordecasa .' => '.$ordecasa);
    foreach ($casasxxx as $value) {
      $casaxxxx = Casa::where('id', $value->id)->first();
      if ($newoldxx) { // se esta editando  
        if ($pcasaxxx->ordecasa != $ordecasa) {
          if ($pcasaxxx->ordecasa < $value->ordecasa && $value->ordecasa <= $ordecasa) { // pasar de una posicion menor a una mayor
            $casaxxxx->update(['ordecasa' => $value->ordecasa - 1]);
          } else if ($pcasaxxx->ordecasa > $value->ordecasa && $value->ordecasa >= $ordecasa) { // pasar de una posicion mayor a una menor

            $casaxxxx->update(['ordecasa' => $value->ordecasa + 1]);
          }
        }
      } else if ($value->ordecasa >= $ordecasa) { // es nuevo
        $casaxxxx->update(['ordecasa' => $value->ordecasa + 1]);
      }
    }
  }

  public static function transaccion($dataxxxx,  $objetoxx)
  {
    $usuariox = DB::transaction(function () use ($dataxxxx, $objetoxx) {
      $dataxxxx['user_edita_id'] = Auth::user()->id;
      $dataxxxx['casa'] = strtoupper($dataxxxx['casa']);
      $maximoxx = Casa::max('ordecasa');

      if ($objetoxx != '') {
        if ($dataxxxx['ordecasa'] != 'SI') {
          Casa::asignaorden($dataxxxx['ordecasa'],  $objetoxx, true);
        }
        $objetoxx->update($dataxxxx);
      } else {
        if ($dataxxxx['ordecasa'] == 'SI') {
          $dataxxxx['ordecasa'] = $maximoxx + 1;
        }
        Casa::asignaorden($dataxxxx['ordecasa'], '', false);
        $dataxxxx['user_crea_id'] = Auth::user()->id;
        $objetoxx = Casa::create($dataxxxx);
      }
      return $objetoxx;
    }, 5);
    return $usuariox;
  }
}
