<?php

namespace App\Traits\Cformula;

use App\Traits\Pdfs\PdfTrait;

trait EtiquetaNptTrait
{
    use PintarFormularioTrait;
    use CalculosTrait;
    use PdfTrait;
    use CalcularEdadTrait;
    public function getEtiquetaNpt($dataxxxx)
    {
        $dataxxxx['formular'] = $this->getPintarFormulario($dataxxxx);

        $dataxxxx['calculos'] = $this->getCalculos($dataxxxx['cformula']);
        $dataxxxx['dnpxxxxx'] = $this->getCalcularDnp($dataxxxx['cformula']);

        $dataxxxx['preparad'] = isset($dataxxxx['cformula']->userprep);
        $dataxxxx['liberado'] = 'w';
        // ddd($dataxxxx['cformula']->paciente);
        $dataxxxx = [
            'vistaurl' => 'Reporte.Etiquetas.veretiquetanpt',
            'dimensio' => [0, 0, 9.5 * 72, 14.9 * 72],
            'tipoxxxx' => 3,
            'nombarch' => 'etiqueta',
            'dataxxxx' => $dataxxxx
        ];

        return $this->getImprimirPdf($dataxxxx);
        // $dnpxxxxx = new Calcularedad;
        // $dnpxxxxx = $dnpxxxxx->calculardnp($datos);
        // $preparad = User::where('id', $datos->userprep)->first()->name;
        // $liberado = User::where('id', $datos->userlibe)->first()->name;
        // $servicio = \App\Servicio::join('paciente_servicio', 'servicios.id', '=', 'paciente_servicio.servicio_id')
        //     ->where('servicios.clinica_id', $datos->clinica_id)
        //     //->where('paciente_servicio.estado_id', 1)
        //     ->where('paciente_servicio.paciente_id', $datos->paciente_id)
        //     ->first()->nombre;
        // $data = $datos;
        // $date = date('Y-m-d');
        // $view = \View::make($vistaurl, compact('data', 'date', 'dnpxxxxx', 'liberado', 'preparad', 'calculos', 'servicio'))->render();
        // $pdf = \App::make('dompdf.wrapper');
        // $pdf->loadHTML($view);
        // $milimetr = 3.7795275591;
        // $pdf->setPaper(array(0, 0, 100 * $milimetr, 150 * $milimetr), "portrait");
        // if ($tipo == 1) {
        //     return $pdf->stream('reporte');
        // }
        // if ($tipo == 2) {
        //     return $pdf->download('reporte.pdf');
        // }
        // if ($tipo == 3) {
        //     return view($vistaurl, compact('data', 'dnpxxxxx', 'liberado'));
        // }
    }
}
