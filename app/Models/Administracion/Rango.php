<?php

namespace App\Models\Administracion;

use App\Models\Sistema\SisEsta;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Rango extends Model
{

  protected $fillable = [
    'ranginic',
    'rangfina',
    'usercrea',
    'usermodi',
    'sis_esta_id',
    'user_crea_id',
    'user_edita_id'
  ];

  public function sis_esta()
  {
    return $this->belongsTo(SisEsta::class);
  }

  public static function transaccion($dataxxxx,  $objetoxx)
  {
    $usuariox = DB::transaction(function () use ($dataxxxx, $objetoxx) {
      $dataxxxx['user_edita_id'] = Auth::user()->id;
      if ($objetoxx != '') {
        $objetoxx->update($dataxxxx);
      } else {
        $dataxxxx['user_crea_id'] = Auth::user()->id;
        $objetoxx = Rango::create($dataxxxx);
      }
      return $objetoxx;
    }, 5);
    return $usuariox;
  }
}
