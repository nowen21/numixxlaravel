<?php

namespace App\Http\Controllers\Produccion;

use App\Helpers\AlertasHelper;
use App\Helpers\Cformula\Dataformulario;
use App\Http\Controllers\Controller;
use App\Http\Requests\Produccion\RevisionEditarRequest;
use App\Models\Formulaciones\Cformula;
use App\Models\Sistema\SisEsta;
use App\Traits\Pestanias\ProduccionTrait;
use App\Traits\Produccion\InventarioTrait;
use Illuminate\Support\Facades\Auth;

class AlertaController extends Controller
{
    private $opciones;
    use ProduccionTrait;
    use InventarioTrait;
    public function __construct()
    {
        $this->opciones = [
            'cardhead' => 'Alertas',
            'permisox' => 'alerta',
            'parametr' => [],
            'rutacarp' => 'Alertas.',
            'tituloxx' => 'Lista de Notificaciones',
            'slotxxxx' => 'alerta',
            'carpetax' => 'Alertas',
            'indecrea' => false,
            'esindexx' => false
        ];

        $this->middleware(['permission:' .
            $this->opciones['permisox'] . '-cliente|' .
            $this->opciones['permisox'] . '-revisar|' .
            $this->opciones['permisox'] . '-preparar|' .
            $this->opciones['permisox'] . '-procesar|' .
            $this->opciones['permisox'] . '-terminar']);

        $this->opciones['readonly'] = '';
        $this->opciones['rutaxxxx'] = 'alerta';
        $this->opciones['routnuev'] = 'alerta';
        $this->opciones['routxxxx'] = 'alerta';

        $this->opciones['botoform'] = [
            [
                'mostrars' => true, 'accionxx' => '', 'routingx' => [$this->opciones['routxxxx'], []],
                'formhref' => 2, 'tituloxx' => '', 'clasexxx' => ''
            ],
        ];
    }



    private function view($dataxxxx)
    {
        $this->opciones['alertasx']=AlertasHelper::alertas() ;  //ddd($this->opciones['alertasx']);
        return view($this->opciones['rutacarp'] . 'pestanias', ['todoxxxx' => $this->opciones]);
    }

    public function create()
    {

        $this->opciones['indecrea'] = true;

        // $this->opciones['botoform'][] =
        //     [
        //         'mostrars' => true, 'accionxx' => 'GRABAR', 'routingx' => [$this->opciones['routxxxx'] . '.editar', []],
        //         'formhref' => 1, 'tituloxx' => '', 'clasexxx' => 'btn btn-sm btn-primary'
        //     ];
        // $this->opciones['botoform'][] =
        //     [
        //         'mostrars' => true, 'accionxx' => '', 'routingx' => ['reporpdf.etiquetanpt', [$padrexxx]],
        //         'formhref' => 4, 'tituloxx' => 'VER ETIQUTA', 'clasexxx' => 'btn btn-sm btn-primary'
        //     ];
        return $this->view(['objetoxx' => '', 'accionxx' => 'Crear']);
    }
}
