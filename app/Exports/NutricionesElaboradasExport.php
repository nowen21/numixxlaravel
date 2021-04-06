<?php

namespace App\Exports;


use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class NutricionesElaboradasExport implements FromView
{
    private $opciones;

    public function __construct($opciones)
    {
        $this->opciones=$opciones;

    }
    public function view(): View
    {
        return view('Reportes.Excelxxx.Nutrelab.Formulario.imprimir',
        ['todoxxxx' =>$this->opciones]);
    }
}
