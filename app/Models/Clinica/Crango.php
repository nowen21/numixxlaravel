<?php

namespace App\Models\Clinica;

use App\Models\Administracion\Rango;
use App\Models\Sistema\SisEsta;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Crango extends Model
{
    protected $fillable = [
        'sis_clinica_id',
        'rango_id',
        'condicio_id',
        'sis_esta_id',
        'user_crea_id',
        'user_edita_id'
      ];
  
    public function sis_esta() {
      return $this->belongsTo(SisEsta::class);
    }
  
    public function rango() {
      return $this->belongsTo(Rango::class);
    }
  
    public function clinica() {
      return $this->belongsTo(SisClinica::class);
    }
    public static function transaccion($dataxxxx,  $objetoxx)
      {
          $usuariox = DB::transaction(function () use ($dataxxxx, $objetoxx) {
              $dataxxxx['user_edita_id'] = Auth::user()->id;
              if ($objetoxx != '') {
                  $objetoxx->update($dataxxxx);
              } else {
                  $dataxxxx['user_crea_id'] = Auth::user()->id;
                  $objetoxx = Crango::create($dataxxxx);
              }
              return $objetoxx;
          }, 5);
          return $usuariox;
      }
}
