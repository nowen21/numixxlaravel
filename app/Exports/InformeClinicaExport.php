<?php

namespace App\Exports;

use App\Models\Formulaciones\Dfmlote;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class InformeClinicaExport implements FromView
{
    private $opciones;

    public function __construct($opciones)
    {
        $this->opciones=$opciones;

    }
    public function view(): View
    {

        return view('Reportes.Excelxxx.Infoclin.Formulario.imprimir',
        ['todoxxxx' => $this->opciones]);
    }
}
