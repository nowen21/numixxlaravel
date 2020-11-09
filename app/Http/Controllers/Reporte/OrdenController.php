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
use App\Traits\Reporte\OrdenTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrdenController extends Controller
{
    use OrdenTrait;
    private $opciones;

    public function __construct()
    {
        $this->opciones = [
            'permisox' => 'ordprodu',
            'parametr' => [],
            'rutacarp' => 'Reporte.',
            'tituloxx' => 'Crear: Paciente',
            'slotxxxx'=>'ordprodu',
            'carpetax'=>'Orden',
            'indecrea'=>false,
            'esindexx'=>false
        ];

        $this->middleware(['permission:' .
            $this->opciones['permisox'] . '-leer|' .
            $this->opciones['permisox'] . '-crear|' .
            $this->opciones['permisox'] . '-editar|' .
            $this->opciones['permisox'] . '-borrar']);

        $this->opciones['readonly'] = '';
        $this->opciones['rutaxxxx'] = 'ordprodu';
        $this->opciones['routnuev'] = 'ordprodu';
        $this->opciones['routxxxx'] = 'ordprodu';

        $this->opciones['botoform'] = [
            [
                'mostrars' => true, 'accionxx' => '', 'routingx' => [$this->opciones['routxxxx'], []],
                'formhref' => 2, 'tituloxx' => 'VOLVER A PACIENTES', 'clasexxx' => 'btn btn-sm btn-primary'
            ],
        ];
    }
    public function getListado(Request $request)
    {
        if ($request->ajax()) {
            $request->routexxx = [$this->opciones['routxxxx']];
            $request->botonesx = $this->opciones['rutacarp'] .
                $this->opciones['carpetax'] . '.Botones.botonesapi';
            $request->estadoxx = 'layouts.components.botones.estadosx';
            return $this->getOrden($request);
        }
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $padrexxx='';
        $this->opciones['indecrea']=true;
        $this->opciones['esindexx']=true;
        $this->opciones['accionxx']='index';
        $this->opciones['padrexxx'] = $padrexxx;
        $this->opciones['tablasxx'] = [
            [
                'titunuev' => 'NUEVO PACIENTE',
                'titulist' => 'Listado de Órdenes de Producción',
                'dataxxxx' => [
                    ['campoxxx' => 'botonesx', 'dataxxxx' => $this->opciones['rutacarp'] . $this->opciones['carpetax'] . '.botones.botonesapi'],
                    ['campoxxx' => 'estadoxx', 'dataxxxx' => 'layouts.components.botones.estadoxx'],
                    ['campoxxx' => 'medicame', 'dataxxxx' => $padrexxx],
                ],
                'vercrear' => true,
                'accitabl' => true,
                'urlxxxxx' => 'api/reporte/orden',
                'cabecera' =>[
                    ['td' => 'ID'],
                    ['td' => 'Orden de producción'],
                    ['td' => 'Observaciónn'],
                    ['td' => 'ESTADO'],
                ],
                'columnsx' => [
                    ['data' => 'botonexx', 'name' => 'botonexx'],
                    ['data' => 'id', 'name' => 'ordens.id'],
                    ['data' => 'ordeprod', 'name' => 'ordens.ordeprod'],
                    ['data' => 'observac', 'name' => 'ordens.observac'],
                    ['data' => 's_estado', 'name' => 'sis_estas.s_estado'],
                ],
                'tablaxxx' => 'tabla',
                'permisox' => 'ordprodu',
                'routxxxx' => 'ordprodu',
                'parametr' => [$padrexxx],
            ],

        ];
        return view($this->opciones['rutacarp'] . 'pestanias', ['todoxxxx' => $this->opciones]);
    }
    private function view($objetoxx, $nombobje, $accionxx, $vistaxxx)
    {
        $this->opciones['generoxx'] = Genero::combo(['cabecera' => true, 'ajaxxxxx' => false]);
        $this->opciones['epsxxxxx'] = Ep::combo(['cabecera' => true, 'ajaxxxxx' => false]);
        $this->opciones['nptxxxxx'] = Npt::combo(['cabecera' => true, 'ajaxxxxx' => false]);
        $this->opciones['servicio'] = Servicio::combo(['cabecera' => true, 'ajaxxxxx' => false]);
        $this->opciones['departam'] = Departamento::combo(['cabecera' => true, 'ajaxxxxx' => false]);
        $departam='';
        $this->opciones['estadoxx'] = SisEsta::combo(['cabecera' => false, 'esajaxxx' => false]);
        $this->opciones['accionxx'] = $accionxx;
        // indica si se esta actualizando o viendo
        if ($nombobje != '') {
            $this->opciones[$nombobje] = $objetoxx;
            $objetoxx->departamento_id=$objetoxx->municipio->departamento_id;
            $departam=$objetoxx->departamento_id;
        }
        $this->opciones['municipi'] = Municipio::combo(['cabecera' => true, 'ajaxxxxx' => false,'departam'=>$departam]);
        // Se arma el titulo de acuerdo al array opciones
        $this->opciones['tituloxx'] = $this->opciones['accionxx'] . ': ' . $this->opciones['tituloxx'];
        return view($vistaxxx, ['todoxxxx' => $this->opciones]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->opciones['indecrea']=true;
        $this->opciones['clinicac']=true;
        $this->opciones['botoform'][] =
            [
                'mostrars' => true, 'accionxx' => 'CREAR', 'routingx' => [$this->opciones['routxxxx'] . '.editar', []],
                'formhref' => 1, 'tituloxx' => '', 'clasexxx' => 'btn btn-sm btn-primary'
            ];
        return $this->view(true, '', 'Crear', $this->opciones['rutacarp'] . 'pestanias');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PacienteCrearRequest $request)
    {
        $dataxxxx = $request->all();
        $dataxxxx['sis_clinica_id']=Auth::user()->sis_clinica_id;
        return $this->grabar($dataxxxx, '', 'Registro creado con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Orden $objetoxx)
    {
        $this->opciones['clinicax'] =$objetoxx->id;
        $this->opciones['parametr'] = [$objetoxx->id];
        $this->opciones['botoform'][] =
            [
                'mostrars' => true, 'accionxx' => $objetoxx->sis_esta_id == 1 ? 'INACTIVAR' : 'ACTIVAR', 'routingx' => [$this->opciones['routxxxx'], []], 'formhref' => 1,
                'tituloxx' => '', 'clasexxx' => $objetoxx->sis_esta_id == 1 ? 'btn btn-sm btn-danger' : 'btn btn-sm btn-success'
            ];
        $this->opciones['readonly'] = 'readonly';
        return $this->view($objetoxx,  'modeloxx', 'Ver', $this->opciones['rutacarp'] . 'pestanias');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Orden $objetoxx)
    {
        $this->opciones['clinicax'] =$objetoxx->id;
        $this->opciones['parametr'] = [$objetoxx->id];
        $this->opciones['botoform'][] =
            [
                'mostrars' => true, 'accionxx' => 'EDITAR', 'routingx' => [$this->opciones['routxxxx'] . '.editar', []],
                'formhref' => 1, 'tituloxx' => '', 'clasexxx' => 'btn btn-sm btn-primary'
            ];
        return $this->view($objetoxx,  'modeloxx', 'Editar', $this->opciones['rutacarp'] . 'pestanias');
    }

    private function grabar($dataxxxx, $objectx, $infoxxxx)
    {
        return redirect()
            ->route($this->opciones['routxxxx'] . '.editar', [Paciente::transaccion($dataxxxx, $objectx)->id])
            ->with('info', $infoxxxx);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PacienteEditarRequest  $request, Paciente $objetoxx)
    {
        $dataxxxx = $request->all();
        return $this->grabar($dataxxxx, $objetoxx, 'Registro actualizado con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Paciente $objetoxx)
    {
        $this->opciones['parametr'] = [$objetoxx->id];

        $objetoxx->sis_esta_id = ($objetoxx->sis_esta_id == 2) ? 1 : 2;
        $objetoxx->save();
        $activado = $objetoxx->sis_esta_id == 2 ? 'inactivado' : 'activado';

        return redirect()->route($this->opciones['routxxxx'])->with('info', 'Registro ' . $activado . ' con éxito');
    }


}
