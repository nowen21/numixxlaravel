<?php

namespace App\Http\Controllers\Reporte;

use App\Http\Controllers\Controller;
use App\Http\Requests\Pacientes\PacienteCrearRequest;
use App\Http\Requests\Pacientes\PacienteEditarRequest;
use App\Models\Administracion\Ep;
use App\Models\Administracion\Genero;
use App\Models\Administracion\Servicio;

use App\Models\Medicamentos\Npt;
use App\Models\Pacientes\Paciente;
use App\Models\Reportes\Orden;
use App\Models\Sistema\Departamento;
use App\Models\Sistema\Municipio;
use App\Models\Sistema\SisEsta;
use App\Traits\Reporte\ControlPFTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ControlPFController extends Controller
{
    use ControlPFTrait;
    private $opciones;

    public function __construct()
    {
        $this->opciones['permisox'] = 'controlpf';
        $this->middleware(['permission:'
            . $this->opciones['permisox'] . '-leer|'
            . $this->opciones['permisox'] . '-crear|'
            . $this->opciones['permisox'] . '-editar|'
            . $this->opciones['permisox'] . '-borrar']);

        $this->opciones['vocalesx'] = ['Á', 'É', 'Í', 'Ó', 'Ú'];
        $this->opciones['pestpadr'] = 1; // darle prioridad a las pestañas
        $this->opciones['tituhead'] = 'dada';
        $this->opciones['routxxxx'] = 'controlpf';
        $this->opciones['slotxxxx'] = 'controlpf';
        $this->opciones['rutacarp'] = 'Reporte.';
        $this->opciones['perfilxx'] = 'sinperfi';
        $this->opciones['parametr'] = [];
        $this->opciones['carpetax'] = 'Control';
        /** botones que se presentan en los formularios */
        $this->opciones['botonesx'] = $this->opciones['rutacarp'] . 'Acomponentes.Botones.botonesx';
        /** informacion que se va a mostrar en la vista */
        $this->opciones['formular'] = $this->opciones['rutacarp'] . $this->opciones['carpetax'] . '.formulario.formulario';
        /** ruta que arma el formulario */
        $this->opciones['rutarchi'] = $this->opciones['rutacarp'] . 'Acomponentes.Acrud.index';



        $this->opciones['tituloxx'] = "INFORMACI{$this->opciones['vocalesx'][3]}N";
        $this->opciones['botoform'] = [
            [
                'mostrars' => true, 'accionxx' => '', 'routingx' => [$this->opciones['routxxxx'], []],
                'formhref' => 2, 'tituloxx' => 'VOLVER A NNAJS', 'clasexxx' => 'btn btn-sm btn-primary'
            ],
        ];
    }

    public function index()
    {


        $this->opciones['tablasxx'] = [
            [
                'titunuev' => 'NUEVO NNAJ',
                'titulist' => 'LISTA DE NNAJS',
                'archdttb' => $this->opciones['rutacarp'] . 'Acomponentes.Adatatable.index',
                'vercrear' => false,
                'accitabl' => true,
                'urlxxxxx' => route($this->opciones['routxxxx'] . '.listaxxx', []),
                'cabecera' =>[
[
                    ['td' => 'ACCIONES', 'widthxxx' => 200, 'rowspanx' => 1, 'colspanx' => 1],
                    ['td' => 'ID', 'widthxxx' => 0, 'rowspanx' => 1, 'colspanx' => 1],
                    
                    ['td' => 'Orden de producción', 'widthxxx' => 0, 'rowspanx' => 1, 'colspanx' => 1],
                    ['td' => 'Observaciónn', 'widthxxx' => 0, 'rowspanx' => 1, 'colspanx' => 1],
                    ['td' => 'ESTADO', 'widthxxx' => 0, 'rowspanx' => 1, 'colspanx' => 1],
                    ]
                 ],
                'columnsx' => [
                    ['data' => 'botonexx', 'name' => 'botonexx'],
                    ['data' => 'id', 'name' => 'ordens.id'],
                    ['data' => 'ordeprod', 'name' => 'ordens.ordeprod'],
                    ['data' => 'observac', 'name' => 'ordens.observac'],
                    ['data' => 's_estado', 'name' => 'ordens.s_estado'],
                ],
                'tablaxxx' => 'datatable',
                'permisox' => $this->opciones['permisox'],
                'routxxxx' => $this->opciones['routxxxx'],
                'parametr' => [],
            ]
        ];
        $this->opciones['ruarchjs'] = [
            ['jsxxxxxx' => $this->opciones['rutacarp'] . $this->opciones['carpetax'] . '.Js.tabla']
        ];
        return view($this->opciones['rutacarp'] . 'pestanias', ['todoxxxx' => $this->opciones]);
    }

    public function getListado(Request $request)
    {
        if ($request->ajax()) {
            $request->routexxx = [$this->opciones['routxxxx']];
           
            $request->botonesx = $this->opciones['rutacarp'] .
                $this->opciones['carpetax'] . '.Botones.botonesapi';
            $request->estadoxx = 'layouts.components.botones.estadosx';
            return $this->getOrdenControlPf($request);
        }
    }
        /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    private function view($dataxxxx)
    {
        $this->opciones['rutarchi'] = $this->opciones['rutacarp'] . 'Acomponentes.Acrud.' . $dataxxxx['accionxx'][0];
        $this->opciones['formular'] = $this->opciones['rutacarp'] . $this->opciones['carpetax'] . '.Formulario.' . $dataxxxx['accionxx'][1];
        $this->opciones['ruarchjs'] = [
            ['jsxxxxxx' => $this->opciones['rutacarp'] . $this->opciones['carpetax'] . '.Js.js']
        ];
        if ($dataxxxx['modeloxx'] != '') {
            $this->opciones['modeloxx'] = $dataxxxx['modeloxx'];
            $this->opciones['parametr'] = [$dataxxxx['modeloxx']->id];
             }
        return view($this->opciones['rutacarp'] . 'pestanias', ['todoxxxx' => $this->opciones]);
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\FiDatosBasico $objetoxx
     * @return \Illuminate\Http\Response
     */
    public function show(Orden $objetoxx)
    {
        return $this->view(['modeloxx' => $objetoxx, 'accionxx' => ['ver', 'formulario']]);
    }

    public function getPdfCalistam(Orden $objetoxx)
    {
        $dataxxxx = [
            'vistaurl' => 'Produccion.Alistamiento.pdf.alistami',
            'dimensio' => [0, 0, 9.5 * 72, 14.9 * 72],
            'tipoxxxx' => 2,
            'nombarch' => 'ControlPF',
            'dataxxxx' => ['cabecera' => $objetoxx, 'detallex' => Orden::getMlotesDlotes($objetoxx->id)]
        ];
        return Pdfs::getImprimirPdf($dataxxxx);
    }
 
}
