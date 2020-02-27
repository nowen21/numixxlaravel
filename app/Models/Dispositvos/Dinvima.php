<?php

namespace App\Models\Dispositivos;

use App\Models\Sistema\SisEsta;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Dinvima extends Model {

  protected $fillable = [
      'reginvim','dmarca_id', 'sis_esta_id','user_crea_id','user_edita_id'
  ];

   public static function combo() {
    $lista = ['' => 'Seleccione'];
    foreach (Dinvima::all() as $key => $value) {
      $lista[$value->id] = $value->reginvim;
    }
    return $lista;
  }
  public function sis_esta() {
    return $this->belongsTo(SisEsta::class);
  }
  public function dmarca() {
    return $this->belongsTo(Dmarca::class);
  }

  public static function transaccion($dataxxxx,  $objetoxx)
  {
    $usuariox = DB::transaction(function () use ($dataxxxx, $objetoxx) {
      $dataxxxx['user_edita_id'] = Auth::user()->id;
      if ($objetoxx != '') {
        $objetoxx->update($dataxxxx);
      } else {
        $dataxxxx['user_crea_id'] = Auth::user()->id;
        $objetoxx = Dinvima::create($dataxxxx);
      }

      return $objetoxx;
    }, 5);
    return $usuariox;
  }
}
