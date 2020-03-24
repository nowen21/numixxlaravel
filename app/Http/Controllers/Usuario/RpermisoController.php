<?php

namespace App\Http\Controllers\Usuario;

use App\Http\Controllers\Controller;
use App\Http\Requests\Pacientes\PacienteCrearRequest;
use App\Http\Requests\Pacientes\PacienteEditarRequest;
use App\Models\Administracion\Ep;
use App\Models\Administracion\Genero;
use App\Models\Administracion\Servicio;

use App\Models\Medicamentos\Npt;
use App\Models\Pacientes\Paciente;
use App\Models\Sistema\Departamento;
use App\Models\Sistema\Municipio;
use App\Models\Sistema\SisEsta;
use App\User;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;

class RpermisoController extends Controller
{
    private $opciones;

    public function __construct()
    {
        $this->opciones = [
            'permisox' => 'rpermiso',
            'parametr' => [],
            'rutacarp' => 'Sistema.Rol.',
            'tituloxx' => 'Crear: Rol',
            'slotxxxx'=>'rpermiso',
            'carpetax'=>'Rpermiso',
            'indecrea'=>false,
            'esindexx'=>false
        ];

        $this->middleware(['permission:' . $this->opciones['permisox'] . '-leer'], ['only' => ['index', 'show']]);
        $this->middleware(['permission:' . $this->opciones['permisox'] . '-crear'], ['only' => ['index', 'show', 'create', 'store', 'view', 'grabar']]);
        $this->middleware(['permission:' . $this->opciones['permisox'] . '-editar'], ['only' => ['index', 'show', 'edit', 'update', 'view', 'grabar']]);
        $this->middleware(['permission:' . $this->opciones['permisox'] . '-borrar'], ['only' => ['index', 'show', 'destroy']]);

        $this->opciones['readonly'] = '';
        $this->opciones['rutaxxxx'] = 'rpermiso';
        $this->opciones['routnuev'] = 'rpermiso';
        $this->opciones['routxxxx'] = 'rpermiso';

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
        $this->opciones['cardhead']='ROL: '.Role::find($padrexxx)->name;
        $this->opciones['parametr'] = [$padrexxx];
        $this->opciones['indecrea']=false;
        $this->opciones['esindexx']=false;
        $this->opciones['accionxx']='index';
        $this->opciones['padrexxx'] = $padrexxx;
        $this->opciones['tablasxx'] = [
            [
                'titunuev' => 'NUEVO ROL',
                'titulist' => 'LISTA DE PERMISOS ASIGNADOS',
                'dataxxxx' => [
                    ['campoxxx' => 'botonesx', 'dataxxxx' => $this->opciones['rutacarp'] . $this->opciones['carpetax'] . '.botones.botonesapi'],
                    ['campoxxx' => 'estadoxx', 'dataxxxx' => 'layouts.components.botones.estadoxx'],
                    ['campoxxx' => 'padrexxx', 'dataxxxx' => $padrexxx],
                ],
                'vercrear' => FALSE,
                'accitabl' => true,
                'urlxxxxx' => 'api/rol/rpermisos',
                'cabecera' =>[
                    ['td' => 'ID'],
                    ['td' => 'PERMISO'],
                    ['td' => 'DESCRIPCION'],
                    ['td' => 'ESTADO'],
                ],
                'columnsx' => [
                    ['data' => 'botonexx', 'name' => 'botonexx'],
                    ['data' => 'id', 'name' => 'permissions.id'],
                    ['data' => 'name', 'name' => 'permissions.name'],
                    ['data' => 'descripc', 'name' => 'permissions.descripc'],
                    ['data' => 's_estado', 'name' => 'sis_estas.s_estado'],
                ],
                'tablaxxx' => 'tablarpermisos',
                'permisox' => 'rpermiso',
                'routxxxx' => 'rpermiso',
                'parametr' => [$padrexxx],
            ],
            [
                'titunuev' => 'NUEVO ROL',
                'titulist' => 'SELECCIONE EL ROL QUE DESEA ASIGNAR',
                'dataxxxx' => [
                    ['campoxxx' => 'botonesx', 'dataxxxx' => $this->opciones['rutacarp'] . $this->opciones['carpetax'] . '.botones.botonesapi'],
                    ['campoxxx' => 'padrexxx', 'dataxxxx' => $padrexxx],
                ],
                'vercrear' => FALSE,
                'accitabl' => FALSE,
                'urlxxxxx' => 'api/rol/permisos',
                'cabecera' =>[
                    ['td' => 'ID'],
                    ['td' => 'PERMISO'],
                    ['td' => 'DESCRIPCION'],
                ],
                'columnsx' => [
                    ['data' => 'id', 'name' => 'permissions.id'],
                    ['data' => 'name', 'name' => 'permissions.name'],
                    ['data' => 'descripc', 'name' => 'permissions.descripc'],
                ],
                'tablaxxx' => 'tablapermisos',
                'permisox' => 'rpermiso',
                'routxxxx' => 'rpermiso',
                'parametr' => [$padrexxx],
            ],

        ];
        return view($this->opciones['rutacarp'] . 'pestanias', ['todoxxxx' => $this->opciones]);
    }
}
