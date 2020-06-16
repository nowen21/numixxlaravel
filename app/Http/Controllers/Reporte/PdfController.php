<?php

namespace App\Http\Controllers\Reporte;

use App\Helpers\Pdfs\Pdfs;
use App\Helpers\Produccion\Alistamiento;
use App\Http\Controllers\Controller;
use App\Models\Formulaciones\Cformula;
use App\Models\Produccion\Calistam;
use App\Traits\Cformula\EtiquetaNptTrait;

class PdfController extends Controller
{
    use EtiquetaNptTrait;
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
        return $this->getEtiquetaNpt(['cformula' => Cformula::find($padrexxx)]);
    }
}
