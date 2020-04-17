<?php

namespace App\Models\Produccion;

use App\Models\Sistema\SisEsta;
use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Dalistam extends Model {

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
  public function sis_esta() {
    return $this->belongsTo(SisEsta::class);
  }

  

  public static function transaccion($dataxxxx,  $objetoxx)
  {
    $usuariox = DB::transaction(function () use ($dataxxxx,  $objetoxx) {
      foreach ($dataxxxx as $campoxxx => $valorxxx) {
        $campexpl = explode('_', $campoxxx); 
        if ( $campexpl[0]=='dispo'||$campexpl[0]=='medic') {// indica desde donde estan los campos para el detalle, los anteriores son objetoxx
          $valorxxy = Dalistam::where('calistam_id', $objetoxx->id)->where('campo_id', 'like', $campoxxx)->first(); //echo 'kkkk '.$valorxxy.'<br>';
          $dataxxxx['user_edita_id'] = Auth::user()->id;
          $dataxxxx['unidad'] = $valorxxx;
          if (isset($valorxxy->id)) { 
            $valorxxy->update($dataxxxx);
          } else {
            $dataxxxx['user_crea_id'] = Auth::user()->id;
            $dataxxxx['calistam_id'] = $objetoxx->id;
            $dataxxxx['campo_id'] = $campoxxx;
            $dataxxxx['unidad'] = $valorxxx;
            Dalistam::create($dataxxxx);
          }
        }
      }






      
      
      if ($objetoxx != '') {
        $objetoxx->update($dataxxxx);
      } else {
        
        $objetoxx = Calistam::create($dataxxxx);
      }
      return $objetoxx;
    }, 5);
    return $usuariox;
  }



}