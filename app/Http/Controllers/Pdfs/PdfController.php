<?php

namespace App\Http\Controllers\Pdfs;

use App\Helpers\Pdfs\Pdfs;
use App\Helpers\Produccion\Alistamiento;
use App\Http\Controllers\Controller;
use App\Models\Produccion\Calistam;

class PdfController extends Controller
{
    public function getPdfExpUsuarios(Calistam $objetoxx)
    {
        $dataxxxx = [
            'vistaurl' => 'Produccion.Alistamiento.pdf.alistami',
            'dimensio' => [0, 0, 9.5 * 72, 14.9 * 72],
            'tipoxxxx' => 1,
            'nombarch' => 'alistamiento',
            'dataxxxx' => ['cabecera'=>$objetoxx,'detallex'=>Alistamiento::getMlotesDlotes($objetoxx->id)]
        ];
        return Pdfs::getImprimirPdf($dataxxxx);
    }
}
