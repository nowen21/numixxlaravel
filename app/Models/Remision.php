<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Remision extends Model {

  protected $fillable = [
      'orden_id', 'clinica_id','usercrea', 'sis_esta_id', 'user_crea_id', 'user_edita_id'
  ];

  public static function transaccion($dataxxxx)
  {
      $objetoxx = DB::transaction(function () use ($dataxxxx) {

          $dataxxxx['requestx']->request->add(['user_edita_id' => Auth::user()->id]);
          if ($dataxxxx['modeloxx'] != '') {
              $dataxxxx['modeloxx']->update($dataxxxx['requestx']->all());
          } else {
              $dataxxxx['requestx']->request->add(['user_crea_id' => Auth::user()->id]);
              $dataxxxx['modeloxx'] = Remision::create($dataxxxx['requestx']->all());
          }
          return $dataxxxx['modeloxx'];
      }, 5);
      return $objetoxx;
  }

}
