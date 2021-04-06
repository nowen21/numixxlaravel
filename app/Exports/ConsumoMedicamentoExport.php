<?php

namespace App\Exports;

use App\Models\Formulaciones\Dfmlote;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class ConsumoMedicamentoExport implements FromView
{
    private $requestx;

    public function __construct($requestx)
    {
        $this->requestx=$requestx;

    }
    public function view(): View
    {
        $modeloxx['modeloxx']=Dfmlote::whereBetween('created_at', ["{$this->requestx->fechdesd} 00:00:00", "{$this->requestx->fechasta} 23:59:59"])->get();
        return view('Reportes.Excelxxx.Consmedi.Formulario.imprimir',
        ['todoxxxx' => $modeloxx]);
    }
}
