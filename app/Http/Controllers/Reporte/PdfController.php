<?php

namespace App\Http\Controllers\Reporte;

use App\Helpers\Cformula\Dataformulario;
use App\Helpers\Pdfs\Pdfs;
use App\Helpers\Produccion\Alistamiento;
use App\Http\Controllers\Controller;
use App\Models\Formulaciones\Cformula;
use App\Models\Produccion\Calistam;
use App\Traits\Cformula\CalcularEdadTrait;
use App\Traits\Cformula\CalculosTrait;
use App\Traits\Cformula\PintarFormularioTrait;
use App\Traits\Pdfs\PdfTrait;

class PdfController extends Controller
{
    use CalculosTrait;
    use PdfTrait;
    use CalcularEdadTrait;

    public function getPdfExpUsuarios(Calistam $objetoxx)
    {
        $dataxxxx = [
            'vistaurl' => 'Produccion.Alistamiento.pdf.alistami',
            'dimensio' => [0, 0, 9.5 * 72, 14.9 * 72],
            'tipoxxxx' => 1,
            'nombarch' => 'alistamiento',
            'dataxxxx' => ['cabecera' => $objetoxx, 'detallex' => Alistamiento::getMlotesDlotes($objetoxx->id)]
        ];
        return Pdfs::getImprimirPdf($dataxxxx);
    }

    public function imprimirEtiquetaNpt($padrexxx)
    {
        $dataxxxx['cformula']=Cformula::find($padrexxx);
        $dataxxxx['formular']  = Dataformulario::getPintarFormulario(
            [
                'paciente' => $dataxxxx['cformula']->paciente,
                'furmulac' =>$dataxxxx['cformula'],

            ]
        );

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


        // return $this->getEtiquetaNpt(['cformula' => ]);
    }
}
