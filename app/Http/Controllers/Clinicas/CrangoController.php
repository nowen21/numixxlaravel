<?php

namespace App\Http\Controllers\Clinicas;

use App\Http\Controllers\Controller;
use App\Http\Requests\Clinica\CrangoCrearRequest;
use App\Http\Requests\Clinica\CrangoEditarRequest;
use App\Models\Administracion\Rango\Rcodigo;
use App\Models\Clinica\Crango;
use App\Models\Clinica\SisClinica;
use App\Models\Sistema\SisEsta;

class CrangoController extends Controller
{
    private $opciones;

    public function __construct()
    {

        $this->opciones = [
            'cardhead' => '', // titulo para las pestañas
            'permisox' => 'crango',
            'parametr' => [],
            'rutacarp' => 'Clinicas.',
            'tituloxx' => 'Crear: Rango',
            'slotxxxy' => 'clinica',
            'slotxxxx' => 'crango',
            'carpetax' => 'Rango',
            'indecrea' => false,
            'esindexx' => false
        ];

        $this->middleware(['permission:' . $this->opciones['permisox'] . '-leer'], ['only' => ['index', 'show']]);
        $this->middleware(['permission:' . $this->opciones['permisox'] . '-crear'], ['only' => ['index', 'show', 'create', 'store', 'view', 'grabar']]);
        $this->middleware(['permission:' . $this->opciones['permisox'] . '-editar'], ['only' => ['index', 'show', 'edit', 'update', 'view', 'grabar']]);
        $this->middleware(['permission:' . $this->opciones['permisox'] . '-borrar'], ['only' => ['index', 'show', 'destroy']]);
        $this->opciones['readonly'] = '';
        $this->opciones['rutaxxxx'] = 'crango';
        $this->opciones['routnuev'] = 'crango';
        $this->opciones['routxxxx'] = 'crango';
        $this->opciones['botoform'] = [
            [
                'mostrars' => true, 'accionxx' => '', 'routingx' => [$this->opciones['routxxxx'], []],
                'formhref' => 2, 'tituloxx' => 'VOLVER A RANGO', 'clasexxx' => 'btn btn-sm btn-primary'
            ],

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
        $this->opciones['cardhead'] = 'CLINICA: ' . $clinicax->clinica;
        $this->opciones['tablasxx'][] =
            [

                'titunuev' => 'NUEVO RANGO',
                'titulist' => 'LISTA DE RANGOS',
                'dataxxxx' => [
                    ['campoxxx' => 'botonesx', 'dataxxxx' => $this->opciones['rutacarp'] . $this->opciones['carpetax'] . '.botones.botonesapi'],
                    ['campoxxx' => 'estadoxx', 'dataxxxx' => 'layouts.components.botones.estadoxx'],
                    ['campoxxx' => 'clinicax', 'dataxxxx' => $clinica],
                ],
                'accitabl' => true,
                'vercrear' => true,
                'urlxxxxx' => 'api/clinica/crango',
                'cabecera' => [
                    ['td' => 'ID'],
                    ['td' => 'CODIGO'],
                    ['td' => 'RANGO INCIA'],
                    ['td' => 'RANGO FINALIZA'],
                    ['td' => 'CONDICION'],
                    ['td' => 'ESTADO'],
                ],
                'columnsx' => [
                    ['data' => 'botonexx', 'name' => 'botonexx'],
                    ['data' => 'id', 'name' => 'rcodigos.id'],
                    ['data' => 'codiprod', 'name' => 'rcodigos.codiprod'],
                    ['data' => 'ranginic', 'name' => 'rangos.ranginic'],
                    ['data' => 'rangfina', 'name' => 'rangos.rangfina'],
                    ['data' => 'condicio', 'name' => 'condicios.condicio'],
                    ['data' => 's_estado', 'name' => 'sis_estas.s_estado'],
                ],
                'tablaxxx' => 'tablacrango',
                'permisox' => $this->opciones['permisox'],
                'routxxxx' => 'crango',
                'parametr' => [$clinica],
            ];

        $this->opciones['parametr'] = [$clinica];
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
        $this->opciones['rangoxxx'] = Rcodigo::combo([
            'cabecera' => false, 'ajaxxxxx' => false,
            'clinicax' => $this->opciones['clinicax']
        ]);

        // Se arma el titulo de acuerdo al array opciones
        return view($vistaxxx, ['todoxxxx' => $this->opciones]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($padrexxx)
    {
        $clinicax = SisClinica::where('id', $padrexxx)->first();
        $this->opciones['cardhead'] = 'CLINICA: ' . $clinicax->clinica;
        $this->opciones['parametr'] = [$padrexxx];
        $this->opciones['clinicax'] = $padrexxx;
        $this->opciones['botoform'][0]['routingx'][1] = $this->opciones['parametr'];
        $this->opciones['indecrea'] = false;
        $this->opciones['botoform'][] =
            [
                'mostrars' => true, 'accionxx' => 'CREAR', 'routingx' => [$this->opciones['routxxxx'] . '.editar', [$padrexxx]],
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
    public function store($padrexxx, CrangoCrearRequest $request)
    {

        $dataxxxx = $request->all();
        $dataxxxx['sis_clinica_id'] = $padrexxx;
        return $this->grabar($dataxxxx, '', 'Registro creado con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($padrexxx, Crango $objetoxx)
    {
        $this->opciones['tituloxx'] = 'Ver: Rango';
        $this->opciones['indecrea'] = false;
        $this->opciones['clinicax'] = $padrexxx;
        $this->opciones['parametr'] = [$objetoxx->sis_clinica_id, $objetoxx->id];
        $this->opciones['botoform'][0]['routingx'][1] = $this->opciones['parametr'];


        $this->opciones['botoform'][] =  [
            'mostrars' => true, 'accionxx' => '', 'routingx' => [$this->opciones['routxxxx'] . '.nuevo', $this->opciones['parametr']],
            'formhref' => 2, 'tituloxx' => 'NUEVO RANGO', 'clasexxx' => 'btn btn-sm btn-primary'
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
    public function edit($padrexxx, Crango $objetoxx)
    {
        $this->opciones['tituloxx'] = 'Editar: Rango';
        $this->opciones['indecrea'] = false;
        $this->opciones['clinicax'] = $padrexxx;

        $this->opciones['parametr'] = [$objetoxx->sis_clinica_id, $objetoxx->id];
        $this->opciones['botoform'][0]['routingx'][1] = [$objetoxx->sis_clinica_id];
        $this->opciones['botoform'][] =
            [
                'mostrars' => true, 'accionxx' => 'EDITAR', 'routingx' => [$this->opciones['routxxxx'] . '.editar', $this->opciones['parametr']],
                'formhref' => 1, 'tituloxx' => '', 'clasexxx' => 'btn btn-sm btn-primary'
            ];


        $this->opciones['botoform'][] =  [
            'mostrars' => true, 'accionxx' => '', 'routingx' => [$this->opciones['routxxxx'] . '.nuevo', $this->opciones['parametr']],
            'formhref' => 2, 'tituloxx' => 'NUEVO RANGO', 'clasexxx' => 'btn btn-sm btn-primary'
        ];
        return $this->view($objetoxx,  'modeloxx', 'Editar', $this->opciones['rutacarp'] . 'pestanias');
    }

    private function grabar($dataxxxx, $objectx, $infoxxxx)
    {
        $crangoxx = Crango::transaccion($dataxxxx, $objectx);
        return redirect()
            ->route($this->opciones['routxxxx'] . '.editar', [$crangoxx->sis_clinica_id, $crangoxx->id])
            ->with('info', $infoxxxx);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($padrexxx, CrangoEditarRequest  $request, Crango $objetoxx)
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
    public function destroy($padrexxx, Crango $objetoxx)
    {
        $this->opciones['parametr'] = [$objetoxx->id];

        $objetoxx->sis_esta_id = ($objetoxx->sis_esta_id == 2) ? 1 : 2;
        $objetoxx->save();
        $activado = $objetoxx->sis_esta_id == 2 ? 'inactivado' : 'activado';

        return redirect()->route($this->opciones['routxxxx'])->with('info', 'Registro ' . $activado . ' con éxito');
    }
}
