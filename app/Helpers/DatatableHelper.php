<?php

namespace App\Helpers;
class DatatableHelper
{
    public static function getDatatable($queryxxx, $requestx)
    {
        return datatables()
            ->eloquent($queryxxx)
            ->addColumn('botonexx', $requestx->botonesx)
            ->addColumn('s_estado', $requestx->estadoxx)
            ->rawColumns(['botonexx', 's_estado'])
            ->toJson();
    }
    
}
