<?php

namespace App\Http\Controllers\Usuario;

use App\Http\Controllers\Controller;
use App\User;

class UrolController extends Controller
{
    private $opciones;

    public function __construct()
    {
        $this->opciones = [
            'permisox' => 'uroles',
            'parametr' => [],
            'rutacarp' => 'Sistema.Usuario.',
            'tituloxx' => 'Crear: Rol',
            'slotxxxx'=>'uroles',
            'carpetax'=>'Urol',
            'indecrea'=>false,
            'esindexx'=>false
        ];

        $this->middleware(['permission:' .
        $this->opciones['permisox'] . '-leer|' .
        $this->opciones['permisox'] . '-crear|' .
        $this->opciones['permisox'] . '-editar|' .
        $this->opciones['permisox'] . '-borrar']);

        $this->opciones['readonly'] = '';
        $this->opciones['rutaxxxx'] = 'uroles';
        $this->opciones['routnuev'] = 'uroles';
        $this->opciones['routxxxx'] = 'uroles';

        $this->opciones['botoform'] = [
            [
                'mostrars' => true, 'accionxx' => '', 'routingx' => [$this->opciones['routxxxx'], []],
                'formhref' => 2, 'tituloxx' => 'VOLVER A ROLES', 'clasexxx' => 'btn btn-sm btn-primary'
            ],
        ];
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($padrexxx)
    {
        $this->opciones['usuariox']=User::where('id',$padrexxx)->first();
        $this->opciones['parametr'] = [$padrexxx];
        $this->opciones['indecrea']=false;
        $this->opciones['esindexx']=false;
        $this->opciones['accionxx']='index';
        $this->opciones['padrexxx'] = $padrexxx;
        $this->opciones['tablasxx'] = [
            [
                'titunuev' => 'NUEVO ROL',
                'titulist' => 'LISTA DE ROLES ASIGNADOS',
                'dataxxxx' => [
                    ['campoxxx' => 'botonesx', 'dataxxxx' => $this->opciones['rutacarp'] . $this->opciones['carpetax'] . '.botones.botonesapi'],
                    ['campoxxx' => 'estadoxx', 'dataxxxx' => 'layouts.components.botones.estadoxx'],
                    ['campoxxx' => 'padrexxx', 'dataxxxx' => $padrexxx],
                ],
                'vercrear' => FALSE,
                'accitabl' => true,
                'urlxxxxx' => 'api/usuario/urol',
                'cabecera' =>[
                    ['td' => 'ID'],
                    ['td' => 'ROL'],
                    ['td' => 'ESTADO'],
                ],
                'columnsx' => [
                    ['data' => 'botonexx', 'name' => 'botonexx'],
                    ['data' => 'id', 'name' => 'uroles.id'],
                    ['data' => 'name', 'name' => 'roles.name'],
                    ['data' => 's_estado', 'name' => 'sis_estas.s_estado'],
                ],
                'tablaxxx' => 'tablauroles',
                'permisox' => 'uroles',
                'routxxxx' => 'uroles',
                'parametr' => [$padrexxx],
            ],
            [
                'titunuev' => 'NUEVO ROL',
                'titulist' => 'SELECCIONE EL PERMISO QUE DESEA ASIGNAR',
                'dataxxxx' => [
                    ['campoxxx' => 'botonesx', 'dataxxxx' => $this->opciones['rutacarp'] . $this->opciones['carpetax'] . '.botones.botonesapi'],
                    ['campoxxx' => 'padrexxx', 'dataxxxx' => $padrexxx],
                ],
                'vercrear' => FALSE,
                'accitabl' => FALSE,
                'urlxxxxx' => 'api/usuario/rol',
                'cabecera' =>[
                    ['td' => 'ID'],
                    ['td' => 'ROL'],
                ],
                'columnsx' => [
                    ['data' => 'id', 'name' => 'roles.id'],
                    ['data' => 'name', 'name' => 'roles.name'],
                ],
                'tablaxxx' => 'tablaroles',
                'permisox' => 'uroles',
                'routxxxx' => 'uroles',
                'parametr' => [$padrexxx],
            ],

        ];
        return view($this->opciones['rutacarp'] . 'pestanias', ['todoxxxx' => $this->opciones]);
    }

}
