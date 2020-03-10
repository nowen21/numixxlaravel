<?php

namespace App\Models\Dispositivos;

use App\Models\Sistema\SisEsta;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Dmarca extends Model
{
     protected $fillable = [
      'reginvim',  'sis_esta_id','dmedico_id','marcaxxx','user_crea_id','user_edita_id'
  ];

  public static function combo() {
    $lista = ['' => 'Seleccione'];
    foreach (Dmarca::all() as $key => $value) {
      $lista[$value->id] = $value->marcaxxx;
    }
    return $lista;
  }
  public function sis_esta() {
    return $this->belongsTo(SisEsta::class);
  }
  public function dispmedico() {
    return $this->belongsTo(Dmedico::class);
  }
  public static function transaccion($dataxxxx,  $objetoxx)
  {
    $usuariox = DB::transaction(function () use ($dataxxxx, $objetoxx) {
      $dataxxxx['user_edita_id'] = Auth::user()->id;
      $dataxxxx['marcaxxx'] = strtoupper($dataxxxx['marcaxxx']);
      $dataxxxx['reginvim'] = strtoupper($dataxxxx['reginvim']);
      if ($objetoxx != '') {
        $objetoxx->update($dataxxxx);
      } else {
        $dataxxxx['user_crea_id'] = Auth::user()->id;
        $objetoxx = Dmarca::create($dataxxxx);
      }
      
      return $objetoxx;
    }, 5);
    return $usuariox;
  }
}
