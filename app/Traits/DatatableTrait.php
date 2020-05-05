<?php
namespace App\Traits;
trait DatatableTrait{

    public function getDatatable($queryxxx, $requestx)
    {
        return datatables()
            ->of($queryxxx)
            ->addColumn(
                'botonexx',
                function ($queryxxx) use ($requestx) {
                    return  view($requestx->botonesx, [
                        'dataxxxx' => $queryxxx,
                        'requestx' => $requestx,
                    ]);
                }
            )
            ->addColumn(
                's_estado',
                function ($queryxxx) use ($requestx) {
                    return  view($requestx->estadoxx, [
                        'sis_esta_id' => $queryxxx->sis_esta_id,
                        's_estado' => $queryxxx->s_estado,
                        'requestx' => $requestx,
                    ]);
                }

            )
            ->rawColumns(['botonexx', 's_estado'])
            ->toJson();
    }
}