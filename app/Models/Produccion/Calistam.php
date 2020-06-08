<?php

namespace App\Models\Produccion;

use App\Models\Formulaciones\Ordene;
use App\Models\Sistema\SisEsta;
use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Calistam extends Model
{

  protected $fillable = [
    'producto',
    'ordene_id',
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
  public function ordene()
  {
    return $this->belongsTo(Ordene::class);
  }

  public function dalistams()
  {
    return $this->hasMany(Dalistam::class);
  }
  
  public static function transaccion($dataxxxx,  $objetoxx)
  {
    $usuariox = DB::transaction(function () use ($dataxxxx, $objetoxx) {
      $dataxxxx['user_edita_id'] = Auth::user()->id;
      if ($objetoxx != '') {
        $objetoxx->update($dataxxxx);
      } else {
        $dataxxxx['user_crea_id'] = Auth::user()->id;
        $objetoxx = Calistam::create($dataxxxx);
      }
      return $objetoxx;
    }, 5);
    return $usuariox;
  }
}
