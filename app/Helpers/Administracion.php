<?php

namespace App\Helpers;

use App\Models\Administracion\Ep;
use App\Models\Administracion\Rango;

class Administracion
{
    
    public static function getRangos($request){
        $rangosxx=Rango::select(['rangos.id','rangos.ranginic','rangos.rangfina', 'rangos.sis_esta_id','sis_estas.s_estado'])
        ->join('sis_estas','rangos.sis_esta_id','=','sis_estas.id');
        return DatatableHelper::getDatatable($rangosxx,$request);
    }

    public static function getEps($request){
        $rangosxx=Ep::select(['eps.id','eps.nombre', 'eps.sis_esta_id','sis_estas.s_estado'])
        ->join('sis_estas','eps.sis_esta_id','=','sis_estas.id');
        return DatatableHelper::getDatatable($rangosxx,$request);
    }
}
