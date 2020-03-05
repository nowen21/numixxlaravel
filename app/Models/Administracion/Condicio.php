<?php

namespace App\Models\Administracion;

use Illuminate\Database\Eloquent\Model;

class Condicio extends Model
{
    protected $fillable = [
        'condicio', 'sis_esta_id', 'user_crea_id', 'user_edita_id'
    ];
    public static function combo($dataxxxx)
    {
        $comboxxx = [];
        if ($dataxxxx['cabecera']) {
            if ($dataxxxx['ajaxxxxx']) {
                $comboxxx[] = ['valuexxx' => '', 'optionxx' => 'Seleccione'];
            } else {
                $comboxxx = ['' => 'Seleccione'];
            }
        }
        $activida = Condicio::get();
        foreach ($activida as $registro) {
            if ($dataxxxx['ajaxxxxx']) {
                $comboxxx[] = ['valuexxx' => $registro->id, 'optionxx' => $registro->condicio];
            } else {
                $comboxxx[$registro->id] = $registro->condicio;
            }
        }
        return $comboxxx;
    }
}
