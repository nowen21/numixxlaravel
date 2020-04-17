<?php

namespace App\Http\Controllers\Produccion;

use App\Http\Controllers\Controller;


class ProduccionController extends Controller
{
    private $opciones;

    public function __construct()
    {
        $this->opciones = [
            'cardhead'=>'INGRESO A PRODUCCION',
            'permisox' => 'produccion',
            'parametr' => [],
            'rutacarp' => 'Produccion.',
            'tituloxx' => 'Crear: Formulación',
            'slotxxxx' => 'produccion',
            'carpetax' => 'produccion',
            'indecrea' => false,
            'esindexx' => false
        ];

        $this->middleware(['permission:' . $this->opciones['permisox'] . '-modulo'], ['only' => ['index']]);
        
        $this->opciones['readonly'] = '';
        $this->opciones['rutaxxxx'] = 'produccion';
        $this->opciones['routnuev'] = 'produccion';
        $this->opciones['routxxxx'] = 'produccion';

        $this->opciones['botoform'] = [
            [
                'mostrars' => true, 'accionxx' => '', 'routingx' => [$this->opciones['routxxxx'], []],
                'formhref' => 2, 'tituloxx' => 'VOLVER A FORMULACIONES', 'clasexxx' => 'btn btn-sm btn-primary'
            ],
        ];
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $this->opciones['paciente']='';
        // $this->opciones['botoform'][0]['routingx'][1] = $padrexxx;
        $this->opciones['indecrea'] = false;
        $this->opciones['esindexx'] = false;
        $this->opciones['accionxx'] = 'Modulo';
        // $this->opciones['padrexxx'] = $padrexxx;
        $this->opciones['parametr'] = [];
        $this->opciones['tablasxx'] = [
            [
                'titunuev' => 'NUEVA FORMULACIóN',
                'titulist' => 'LISTA DE FORMULACIONES',
                'dataxxxx' => [
                    ['campoxxx' => 'botonesx', 'dataxxxx' => $this->opciones['rutacarp'] . $this->opciones['carpetax'] . '.botones.botonesapi'],
                    ['campoxxx' => 'estadoxx', 'dataxxxx' => 'layouts.components.botones.estadoxx'],
                ],
                'vercrear' => false,
                'accitabl' => true,
                'urlxxxxx' => 'api/produccion/produccion',
                'cabecera' => [
                    ['td' => 'ID'],
                    ['td' => 'TIMPO INFUSION'],
                    ['td' => 'VELOCIDAD INFUSION'],
                    ['td' => 'VOLUMEN'],
                    ['td' => 'PURGA'],
                    ['td' => 'PESO'],
                    ['td' => 'TOTAL'],
                    ['td' => 'ESTADO'],
                ],
                'columnsx' => [
                    ['data' => 'botonexx', 'name' => 'botonexx'],
                    ['data' => 'id', 'name' => 'cformulas.id'],
                    ['data' => 'tiempo', 'name' => 'cformulas.tiempo'],
                    ['data' => 'velocidad', 'name' => 'cformulas.velocidad'],
                    ['data' => 'volumen', 'name' => 'cformulas.volumen'],
                    ['data' => 'purga', 'name' => 'cformulas.purga'],
                    ['data' => 'peso', 'name' => 'cformulas.peso'],
                    ['data' => 'total', 'name' => 'cformulas.total'],
                    ['data' => 's_estado', 'name' => 'sis_estas.s_estado'],
                ],
                'tablaxxx' => 'tablaformulaciones',
                'permisox' => 'produccion',
                'routxxxx' => 'produccion',
                'parametr' => [],
            ],

        ];
        return view($this->opciones['rutacarp'] . 'pestanias', ['todoxxxx' => $this->opciones]);
    }
    
}
