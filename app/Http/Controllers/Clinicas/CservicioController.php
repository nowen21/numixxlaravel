<?php

namespace App\Http\Controllers\Clinicas;

use App\Http\Controllers\Controller;
use App\Http\Requests\Clinica\ServicioCrearRequest;
use App\Http\Requests\Clinica\ServicioEditarRequest;
use App\Models\Administracion\Servicio;
use App\Models\Clinica\SisClinica;
use App\Models\Sistema\SisEsta;

class CservicioController extends Controller
{
    private $opciones;

    public function __construct()
    {
        $this->opciones = [
            'permisox' => 'cservicio',
            'parametr' => [],
            'rutacarp' => 'Clinicas.',
            'tituloxx' => 'Crear: Servicio',
            'slotxxxx' => 'cservicio',
            'carpetax' => 'Servicio',
            'indecrea' => false,
            'esindexx' => false
        ];

        $this->middleware(['permission:' . $this->opciones['permisox'] . '-leer'], ['only' => ['index', 'show']]);
        $this->middleware(['permission:' . $this->opciones['permisox'] . '-crear'], ['only' => ['index', 'show', 'create', 'store', 'view', 'grabar']]);
        $this->middleware(['permission:' . $this->opciones['permisox'] . '-editar'], ['only' => ['index', 'show', 'edit', 'update', 'view', 'grabar']]);
        $this->middleware(['permission:' . $this->opciones['permisox'] . '-borrar'], ['only' => ['index', 'show', 'destroy']]);

        $this->opciones['readonly'] = '';
        $this->opciones['rutaxxxx'] = 'cservicio';
        $this->opciones['routnuev'] = 'cservicio';
        $this->opciones['routxxxx'] = 'cservicio';

        $this->opciones['botoform'][] =
            [
                'mostrars' => true, 'accionxx' => '', 'routingx' => [$this->opciones['routxxxx'], []],
                'formhref' => 2, 'tituloxx' => 'VOLVER A SERVICIOS', 'clasexxx' => 'btn btn-sm btn-primary'
            ];
            $this->opciones['botoform'][] =
            [
                'mostrars' => true, 'accionxx' => '', 'routingx' => ['clinica', []],
                'formhref' => 2, 'tituloxx' => 'VOLVER A CLINICAS', 'clasexxx' => 'btn btn-sm btn-primary'
            ];
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($clinica)
    {
        $clinicax = SisClinica::where('id', $clinica)->first();
        $this->opciones['tablasxx'][] =
            [

                'titunuev' => 'NUEVO SERVICIO',
                'titulist' => 'LISTA DE SERVICIOS PARA LA CLINICA: ' . $clinicax->clinica,
                'dataxxxx' => [
                    ['campoxxx' => 'botonesx', 'dataxxxx' => $this->opciones['rutacarp'] . $this->opciones['carpetax'] . '.botones.botonesapi'],
                    ['campoxxx' => 'estadoxx', 'dataxxxx' => 'layouts.components.botones.estadoxx'],
                    ['campoxxx' => 'clinicax', 'dataxxxx' => $clinica],
                ],
                'accitabl' => true,
                'vercrear' => true,
                'urlxxxxx' => 'api/clinica/servicio',
                'cabecera' => [
                    ['td' => 'ID'],
                    ['td' => 'SERVICIO'],
                    ['td' => 'ESTADO'],
                ],
                'columnsx' => [
                    ['data' => 'botonexx', 'name' => 'botonexx'],
                    ['data' => 'id', 'name' => 'servicios.id'],
                    ['data' => 'servicio', 'name' => 'servicios.servicio'],
                    ['data' => 's_estado', 'name' => 'sis_estas.s_estado'],
                ],
                'routxxxx' => 'cservicio',
                'tablaxxx' => 'tablacservicio',
                'permisox' => $this->opciones['permisox'],
                'parametr' => [$clinica],
            ];

        $this->opciones['clinicax'] = $clinica;

        $this->opciones['accionxx'] = 'index';
        return view($this->opciones['rutacarp'] . 'pestanias', ['todoxxxx' => $this->opciones]);
    }
    private function view($objetoxx, $nombobje, $accionxx, $vistaxxx)
    {
        $this->opciones['estadoxx'] = SisEsta::combo(['cabecera' => false, 'esajaxxx' => false]);
        $this->opciones['accionxx'] = $accionxx;
        // indica si se esta actualizando o viendo
        if ($nombobje != '') {
            $this->opciones[$nombobje] = $objetoxx;
        }

        // Se arma el titulo de acuerdo al array opciones
        $this->opciones['tituloxx'] = $this->opciones['accionxx'] . ': ' . $this->opciones['tituloxx'];
        return view($vistaxxx, ['todoxxxx' => $this->opciones]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($clinica)
    {
        $this->opciones['botoform'][0]['routingx'][1] = $clinica;
        $this->opciones['parametr'] = [$clinica];
        $this->opciones['indecrea'] = true;
        $this->opciones['botoform'][] =
            [
                'mostrars' => true, 'accionxx' => 'CREAR', 'routingx' => [$this->opciones['routxxxx'] . '.editar', [$clinica]],
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
    public function store($clinica, ServicioCrearRequest $request)
    {
        $dataxxxx = $request->all();
        $dataxxxx['sis_clinica_id'] = $clinica;

        return $this->grabar($dataxxxx, '', 'Registro creado con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($clinica, Servicio $objetoxx)
    {
        $this->opciones['botoform'][0]['routingx'][1] = $clinica;
        $this->opciones['indecrea'] = false;
        $this->opciones['clinicax'] = $objetoxx->id;
        $this->opciones['parametr'] = [$objetoxx->id];
        return $this->view($objetoxx,  'modeloxx', 'Ver', $this->opciones['rutacarp'] . 'pestanias');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($clinica, Servicio $objetoxx)
    {
        $this->opciones['botoform'][0]['routingx'][1] = $clinica;
        $this->opciones['indecrea'] = false;
        $this->opciones['clinicax'] = $objetoxx->id;
        $this->opciones['parametr'] = [$clinica, $objetoxx->id];
        $this->opciones['botoform'][] =
            [
                'mostrars' => true, 'accionxx' => 'EDITAR', 'routingx' => [$this->opciones['routxxxx'] . '.editar', []],
                'formhref' => 1, 'tituloxx' => '', 'clasexxx' => 'btn btn-sm btn-primary'
            ];
        return $this->view($objetoxx,  'modeloxx', 'Editar', $this->opciones['rutacarp'] . 'pestanias');
    }

    private function grabar($dataxxxx, $objectx, $infoxxxx)
    {
        $servicio = Servicio::transaccion($dataxxxx, $objectx);
        return redirect()
            ->route($this->opciones['routxxxx'] . '.editar', [$servicio->sis_clinica_id, $servicio->id])
            ->with('info', $infoxxxx);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($clinica, ServicioEditarRequest  $request, Servicio $objetoxx)
    {
        $dataxxxx = $request->all();
        $dataxxxx['sis_clinica_id'] = $clinica;
        return $this->grabar($dataxxxx, $objetoxx, 'Registro actualizado con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($clinica, Servicio $objetoxx)
    {
        $this->opciones['parametr'] = [$objetoxx->id];

        $objetoxx->sis_esta_id = ($objetoxx->sis_esta_id == 2) ? 1 : 2;
        $objetoxx->save();
        $activado = $objetoxx->sis_esta_id == 2 ? 'inactivado' : 'activado';

        return redirect()->route($this->opciones['routxxxx'])->with('info', 'Registro ' . $activado . ' con éxito');
    }
}
