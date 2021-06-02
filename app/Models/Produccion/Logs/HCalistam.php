<?php

namespace App\Models\Produccion\Logs;

use App\Models\Dispositivos\Dlote;
use App\Models\Formulaciones\Orden;
use App\Models\Medicamentos\Mlote;
use App\Models\Sistema\SisEsta;
use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HCalistam extends Model
{
    protected $fillable = [
        'producto',
        'orden_id',
        'user_edita_id', 'user_crea_id',  'id_old',
        'sis_esta_id',
        'rutaxxxx',
        'metodoxx',
        'ipxxxxxx',
    ];

}
