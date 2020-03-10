<?php

namespace App\Models\Clinica;

use App\Models\Administracion\Rango;
use App\Models\Medicamentos\Medicame;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SisClinica extends Model
{
    protected $fillable = [
        'nitxxxxx', 'clinica', 'telefono', 'sis_esta_id', 'digiveri', 'user_crea_id', 'user_edita_id'
    ];
    public function medicames()
    {
        return $this->belongsToMany(Medicame::class)->withTimestamps();
    }
    public function rangos()
    {
        return $this->belongsToMany(Rango::class)->withTimestamps();
    }
    public static function transaccion($dataxxxx,  $objetoxx)
    {
        $usuariox = DB::transaction(function () use ($dataxxxx, $objetoxx) {
            $dataxxxx['user_edita_id'] = Auth::user()->id;
            if ($objetoxx != '') {
                $objetoxx->update($dataxxxx);
            } else {
                $dataxxxx['user_crea_id'] = Auth::user()->id;
                $objetoxx = SisClinica::create($dataxxxx);
            }
            return $objetoxx;
        }, 5);
        return $usuariox;
    }


    public static function combo($cabecera, $ajaxxxxx)
    {
        $comboxxx = [];
        if ($cabecera) {
            if ($ajaxxxxx) {
                $comboxxx[] = ['valuexxx' => '', 'optionxx' => 'Seleccione'];
            } else {
                $comboxxx = ['' => 'Seleccione'];
            }
        }
        $activida = SisClinica::get();
        foreach ($activida as $registro) {
            if ($ajaxxxxx) {
                $comboxxx[] = ['valuexxx' => $registro->id, 'optionxx' => $registro->clinica];
            } else {
                $comboxxx[$registro->id] = $registro->clinica;
            }
        }
        return $comboxxx;
    }
}
