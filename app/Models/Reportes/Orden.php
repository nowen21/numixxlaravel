<?php

namespace App\Models\Reportes;

use App\Models\Administracion\Ep;
use App\Models\Administracion\Genero;
use App\Models\Administracion\Servicio;
use App\Models\Clinica\SisClinica;
use App\Models\Medicamentos\Npt;
use App\Models\Sistema\Municipio;
use App\Models\Sistema\SisEsta;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Orden extends Model {

  protected $fillable = [
      'registro',
      'cedula',
      'nombres',
      'apellidos',
      'peso',
      'genero_id',
      'ep_id',
      'cama',
      'fechnaci',
      'municipio_id',
      'npt_id',
      'servicio_id',
      'sis_esta_id',
      'user_crea_id',
      'sis_clinica_id',
      'user_edita_id'
  ];

  public static function transaccion($dataxxxx,  $objetoxx)
    {
        $usuariox = DB::transaction(function () use ($dataxxxx, $objetoxx) {
            $dataxxxx['user_edita_id'] = Auth::user()->id;
            if ($objetoxx != '') {
                $objetoxx->update($dataxxxx);
            } else {
                $dataxxxx['user_crea_id'] = Auth::user()->id;
                $objetoxx = Orden::create($dataxxxx);
            }
            return $objetoxx;
        }, 5);
        return $usuariox;
    }
}
