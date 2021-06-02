<?php

namespace App\Models\Clinica\Logs;


use Illuminate\Database\Eloquent\Model;


class HCrango extends Model
{
    protected $fillable = [
        'sis_clinica_id',
        'rcodigo_id',
        'user_edita_id', 'user_crea_id',  'id_old',
        'sis_esta_id',    'deleted_at',
        'rutaxxxx',
        'metodoxx',
        'ipxxxxxx',
    ];

   
}
