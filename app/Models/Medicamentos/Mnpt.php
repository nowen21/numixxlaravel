<?php

namespace App\Models\Medicamentos;

use App\Models\Sistema\SisEsta;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Mnpt extends  Model {

  protected $fillable = [
      'medicame_id',
      'npt_id',
      'sis_esta_id','randesde','ranhasta','rangunid', 'user_crea_id','user_edita_id'
  ];

  public function medicame() {
    return $this->belongsTo(Medicame::class);
  }
  public function npt() {
    return $this->belongsTo(Npt::class);
  }
  public function sis_esta() {
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
        $objetoxx = Mnpt::create($dataxxxx);
      }

      return $objetoxx;
    }, 5);
    return $usuariox;
  }


  public static function combo($dataxxxx)
  {
      $notinxxx=[];
      foreach(Mnpt::where("medicame_id", $dataxxxx["medicame"])->get() as $mnptxxxx){
          if($dataxxxx['selectxx']!=$mnptxxxx->npt_id){
            $notinxxx[]=$mnptxxxx->npt_id;
            }

      };
      if($dataxxxx['cabecera']){
          if($dataxxxx['esajaxxx']){
              $comboxxx[] = ['valuexxx'=>'','optionxx'=>'Seleccione'];
          }else{
              $comboxxx = [''=>'Seleccione'];
          }

      }
      $entidadx=Npt::whereNotIn("id", $notinxxx)->
      //where('medicame_id',$dataxxxx['medicame'])
    //   ->join('medicames','mmarcas.medicame_id','=','medicames.id')
    //   ->where('medicames.sis_esta_id',1)
      get();
      foreach ($entidadx as $entisalu) {
          if($dataxxxx['esajaxxx']){
              $comboxxx[] = ['valuexxx'=>$entisalu->id, 'optionxx'=>$entisalu->nombre];
          }else{
              $comboxxx[$entisalu->id] = $entisalu->nombre;
          }
      }

      return $comboxxx;
  }

}
