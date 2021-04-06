<?php

namespace App\Traits\Reportes\Excelxxx\Nutrelab;

use App\Exports\NutricionesElaboradasExport;
use App\Http\Requests\Reportes\Excelxxx\ReporteExcelCreateRequest;
use Maatwebsite\Excel\Facades\Excel;

/**
 * Este trait permite armar las consultas para ubicacion que arman las datatable
 */
trait NutricionElaboradaTrait
{
    use DataTrait;
    public function create()
    {
        $this->getBotones(['leerxxxx', [], 1, "{$this->opciones['titucont']}", 'btn btn-sm btn-primary']);
        return $this->view(['modeloxx' => '', 'accionxx' => ['crear', 'formulario'],]);
    }

    public function store(ReporteExcelCreateRequest $request)
    {
        ob_end_clean();
        ob_start();
        $this->opciones['modeloxx'] = $this->getExcel(['requestx'=>$request]);

        return Excel::download(new NutricionesElaboradasExport($this->opciones), 'informe_nutriciones_elaboradas de '.$request->fechdesd.' hasta '.$request->fechasta.'.xlsx');
        // return $this->view(['accionxx' => ['imprimir', 'imprimir'],]);
    }
}
