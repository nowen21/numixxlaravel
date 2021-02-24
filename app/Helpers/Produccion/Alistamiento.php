<?php

namespace App\Helpers\Produccion;

use App\Models\Dispositivos\Dlote;
use App\Models\Medicamentos\Mlote;
use App\Models\Produccion\Dalistam;

class Alistamiento
{


    public static function getMedicame($dataxxxx, $mayorxxx, $registr, $cabecera)
    {
        $idxxxxxx = ($cabecera == 0) ? $cabecera : (isset($registr->id)?$registr->id:0);
        $valorxxx = Dalistam::select('unidad')->where('calistam_id', $cabecera)
            ->where('campo_id', 'medic_' . $idxxxxxx)->first();
        $dataxxxx['medicamm'] = ($mayorxxx == true) ? $registr->minvima->mmarca->medicame->nombgene : ($registr == '' ? '' : $registr->minvima->mmarca->medicame->nombgene);
        $dataxxxx['value_me'] = isset($valorxxx->unidad)?$valorxxx->unidad:0;
        $dataxxxx['lotexxxm'] = ($mayorxxx == true) ? $registr->lotexxxx : ($registr == '' ? '' : $registr->lotexxxx);
        $dataxxxx['reginvim'] = ($mayorxxx == true) ? $registr->minvima->reginvim : ($registr == '' ? '' : $registr->minvima->reginvim);
        $dataxxxx['fechvenm'] = ($mayorxxx == true) ? $registr->fechvenc : ($registr == '' ? '' : $registr->fechvenc);
        $dataxxxx['medic_id'] = ($mayorxxx == true) ? 'medic_' . $registr->id : ($registr == '' ? '' : 'medic_' . $registr->id);
        return $dataxxxx;
    }
    public static function getDisposit($dataxxxx, $mayorxxx, $registr, $cabecera)
    {
        $idxxxxxx = ($cabecera == 0) ? $cabecera : (isset($registr->id)?$registr->id:0);
        $valorxxx = Dalistam::select('unidad')->where('calistam_id', $cabecera)
            ->where('campo_id', 'dispo_' . $idxxxxxx)->first();
        $dataxxxx['medicamd'] =
            ($mayorxxx == true) ? $registr->dmarca->dmedico->nombrexx : ($registr == '' ? '' : $registr->dmarca->dmedico->nombrexx);

        $dataxxxx['value_di'] = isset($valorxxx->unidad)?$valorxxx->unidad:0;
        $dataxxxx['lotexxxd'] = ($mayorxxx == true) ? $registr->lotexxxx : ($registr == '' ? '' : $registr->lotexxxx);
        $dataxxxx['reginvid'] = ($mayorxxx == true) ? $registr->dmarca->reginvim : ($registr == '' ? '' : $registr->dmarca->reginvim);
        $dataxxxx['fechvend'] = ($mayorxxx == true) ? $registr->fechvenc : ($registr == '' ? '' : $registr->fechvenc);
        $dataxxxx['dispo_id'] = ($mayorxxx == true) ? 'dispo_' . $registr->id : ($registr == '' ? '' : 'dispo_' . $registr->id);

        return $dataxxxx;
    }
    public static function getMlotes()
    {
        $mlotexxx = Mlote::
        join('minvimas','mlotes.minvima_id','=','minvimas.id')
        ->join('mmarcas','minvimas.mmarca_id','=','mmarcas.id')
        ->join('medicames','mmarcas.medicame_id','=','medicames.id')
        ->where('fechvenc', '>', date('Y-m-d', time()))
            ->where('inventar', '>', 0)
            ->where('mlotes.sis_esta_id',  1)
            ->orderBy('medicames.nombgene','ASC')
            ->get();
        return $mlotexxx;
    }
    public static function getDlotes()
    {
        $dispmedi = Dlote::
        join('dmarcas','dlotes.dmarca_id','=','dmarcas.id')
        ->join('dmedicos','dmarcas.dmedico_id','=','dmedicos.id')
        ->where('fechvenc', '>', date('Y-m-d', time()))
            ->where('inventar', '>', 0)
            ->where('dlotes.sis_esta_id',  1)
            ->orderBy('dmedicos.nombrexx','ASC')
            ->get();
        return $dispmedi;
    }
    public static function getMlotesDlotes($opcionxx)
    {
        $medicame = Alistamiento::getMlotes();
        $dispmedi = Alistamiento::getDlotes();
        $mayorxxx = true;
        $dataxxxx = $medicame;
        $medicant = count($medicame);
        $dispcant = count($dispmedi);
        /**
         * si la cantida de registros de dlotes es mayor a mlotes
         * entonces dlotes pasa a ser la data principal
         */
        if ($dispcant > $medicant) {
            $dataxxxx = $dispmedi;
            $mayorxxx = false;
        }
        $dispensa = [];
        foreach ($dataxxxx as $key => $registr) {
            $dataxxxy = [];
            if ($mayorxxx) {

                $dataxxxy = Alistamiento::getMedicame($dataxxxy, $mayorxxx, $registr, $opcionxx);
                $dispensa[] = Alistamiento::getDisposit($dataxxxy, false, ($key < $medicant) ? $dispmedi[$key] : '', $opcionxx);
            } else {
                $dataxxxy = Alistamiento::getDisposit($dataxxxy, true, $registr, $opcionxx);
                $dispensa[] = Alistamiento::getMedicame($dataxxxy, $mayorxxx, ($key < $medicant) ? $medicame[$key] : '', $opcionxx);
            }
        }
        return $dispensa;
    }
}
