<?php

namespace App\Traits\Reportes\Excelxxx\Infopaci;

use App\Exports\InformePacienteExport;
use App\Http\Requests\Reportes\Excelxxx\InformePacienteCreateRequest;
use App\Models\Formulaciones\Dfmlote;
use Maatwebsite\Excel\Facades\Excel;

/**
 * Este trait permite armar las consultas para ubicacion que arman las datatable
 */
trait InformePacienteTrait
{
    use DataTrait;
    public function create()
    {
        $this->getBotones(['leerxxxx', [], 1, "{$this->opciones['titucont']}", 'btn btn-sm btn-primary']);
        return $this->view(['modeloxx' => '', 'accionxx' => ['crear', 'formulario'],]);
    }

    public function store(InformePacienteCreateRequest $request)
    {
        ob_end_clean();
        ob_start();
        $this->opciones['modeloxx'] = $this->getExcel(['requestx'=>$request]);
        return Excel::download(new InformePacienteExport($this->opciones), 'informe_paciente de '.$request->fechdesd.' hasta '.$request->fechasta.'.xlsx');

        // $this->getBotones(['imprimir', [], 1, "GUARDAR {$this->opciones['titucont']}", 'btn btn-sm btn-primary']);
        // return $this->view(['accionxx' => ['imprimir', 'imprimir'],]);
    }
}
