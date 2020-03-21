<?php

namespace App\Helpers\Usuarios;

use App\Helpers\DatatableHelper;
use App\User;

class Usuarios
{
    public static function getUsuarios($request)
    {
        $paciente = User::select(
            'users.id',
            'users.name',
            'users.email',
            'sis_clinicas.clinica',
            's_estado',
            'users.sis_esta_id'
        )
        ->join('sis_clinicas', 'users.sis_clinica_id', '=', 'sis_clinicas.id')
        ->join('sis_estas', 'users.sis_esta_id', '=', 'sis_estas.id');
        return DatatableHelper::getDatatable($paciente, $request);
    }
}