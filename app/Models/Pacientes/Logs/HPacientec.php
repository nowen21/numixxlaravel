<?php

namespace App\Models\Pacientes\Logs;

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

class HPacientec extends Model {

  protected $fillable = [
      'registro',
      'cedula',
      'nombres',
      'apelldios',
      'peso',
      'genero_id',
      'ep_id',
      'cama',
      'fechnaci',
      'departamento_id',
      'municipio_id',
      'npt_id',
      'servicio_id',
      'sis_clinica_id',
      'user_edita_id', 'user_crea_id',  'id_old',
      'sis_esta_id',
      'rutaxxxx',
      'metodoxx',
      'ipxxxxxx',
  ];


}
