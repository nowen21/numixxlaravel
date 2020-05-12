<?php

namespace App\Http\Controllers\Clinicas;

use App\Helpers\Clinicas;
use App\Http\Controllers\Controller;
use App\Http\Requests\Pacientes\PacienteCrearRequest;
use App\Http\Requests\Pacientes\PacienteEditarRequest;
use App\Models\Administracion\Ep;
use App\Models\Administracion\Genero;
use App\Models\Administracion\Servicio;
use App\Models\Clinica\SisClinica;
use App\Models\Medicamentos\Npt;
use App\Models\Pacientes\Paciente;
use App\Models\Sistema\Departamento;
use App\Models\Sistema\Municipio;
use App\Models\Sistema\SisEsta;
use Illuminate\Support\Facades\Auth;

class PacienteController extends Controller
{
    private $opciones;

    public function __construct()
    {
        $this->opciones = [
            'permisox' => 'paciente',
            'parametr' => [],
            'rutacarp' => 'Clinicas.',
            'tituloxx' => 'Crear: Paciente',
            'slotxxxy' => 'paciente',
            'slotxxxx' => 'paciente',
            'carpetax' => 'Paciente',
            'indecrea' => false,
            'esindexx' => false
        ];

        $this->middleware(['permission:' . $this->opciones['permisox'] . '-leer'], ['only' => ['index', 'show']]);
        $this->middleware(['permission:' . $this->opciones['permisox'] . '-crear'], ['only' => ['index', 'show', 'create', 'store', 'view', 'grabar']]);
        $this->middleware(['permission:' . $this->opciones['permisox'] . '-editar'], ['only' => ['index', 'show', 'edit', 'update', 'view', 'grabar']]);
        $this->middleware(['permission:' . $this->opciones['permisox'] . '-borrar'], ['only' => ['index', 'show', 'destroy']]);

        $this->opciones['readonly'] = '';
        $this->opciones['rutaxxxx'] = 'paciente';
        $this->opciones['routnuev'] = 'paciente';
        $this->opciones['routxxxx'] = 'paciente';

        $this->opciones['botoform'] = [
            [
                'mostrars' => true, 'accionxx' => '', 'routingx' => [$this->opciones['routxxxx'], []],
                'formhref' => 2, 'tituloxx' => 'VOLVER A PACIENTES', 'clasexxx' => 'btn btn-sm btn-primary'
            ],
        ];
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(SisClinica $padrexxx)
    {
        $this->opciones['cardheap'] = 'PACIENTES: ';
        $this->opciones['cardhead'] = 'CLINICA: ' . $padrexxx->clinica;
        $this->opciones['botoform'][0]['routingx'][1] = $padrexxx->id;
        $clinicax = Auth::user()->sis_clinica_id;
        $padrexxx = $padrexxx->id;

        $this->opciones['parametr'] = [$padrexxx];


        // $this->opciones['indecrea']=true;
        //$this->opciones['esindexx']=true;
        $this->opciones['accionxx'] = 'index';
        $this->opciones['padrexxx'] = $padrexxx;
        $this->opciones['tablasxx'] = [
            [
                'titunuev' => 'NUEVO PACIENTE',
                'titulist' => 'LISTA DE PACIENTES',
                'dataxxxx' => [
                    ['campoxxx' => 'botonesx', 'dataxxxx' => $this->opciones['rutacarp'] . $this->opciones['carpetax'] . '.botones.botonesapi'],
                    ['campoxxx' => 'estadoxx', 'dataxxxx' => 'layouts.components.botones.estadoxx'],
                    ['campoxxx' => 'clinicax', 'dataxxxx' => $padrexxx],
                ],
                'vercrear' => true,
                'accitabl' => true,
                'urlxxxxx' => 'api/paciente/paciente',
                'cabecera' => [
                    ['td' => 'ID'],
                    ['td' => 'CEDULA'],
                    ['td' => 'NOMBRES'],
                    ['td' => 'APELLIDOS'],
                    ['td' => 'ESTADO'],
                ],
                'columnsx' => [
                    ['data' => 'botonexx', 'name' => 'botonexx'],
                    ['data' => 'id', 'name' => 'pacientes.id'],
                    ['data' => 'cedula', 'name' => 'pacientes.cedula'],
                    ['data' => 'nombres', 'name' => 'pacientes.nombres'],
                    ['data' => 'apellidos', 'name' => 'pacientes.apellidos'],
                    ['data' => 's_estado', 'name' => 'sis_estas.s_estado'],
                ],
                'tablaxxx' => 'tablapacientes',
                'permisox' => 'paciente',
                'routxxxx' => 'paciente',
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
        $departam = '';
        $this->opciones['estadoxx'] = SisEsta::combo(['cabecera' => false, 'esajaxxx' => false]);
        $this->opciones['accionxx'] = $accionxx;
        // indica si se esta actualizando o viendo
        if ($nombobje != '') {
            $this->opciones[$nombobje] = $objetoxx;
            $objetoxx->departamento_id = $objetoxx->municipio->departamento_id;
            $departam = $objetoxx->departamento_id;
        }
        $this->opciones['municipi'] = Municipio::combo(['cabecera' => true, 'ajaxxxxx' => false, 'departam' => $departam]);
        // Se arma el titulo de acuerdo al array opciones

        return view($vistaxxx, ['todoxxxx' => $this->opciones]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(SisClinica $padrexxx)
    {
        $this->opciones['cardheap'] = 'CREAR PACIENTE';
        $this->opciones['cardhead'] = 'CLINICA: ' . $padrexxx->clinica;

        $clinicax = Auth::user()->sis_clinica_id;
        $padrexxx = $padrexxx->id;
        // if($clinicax==1){
        //     $padrexxx=$clinicax;
        // }
        $this->opciones['botoform'][0]['routingx'][1] = $padrexxx;
        $this->opciones['parametr'] = [$padrexxx];
        // $this->opciones['indecrea']=true;
        $this->opciones['clinicac'] = true;
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
    public function store(PacienteCrearRequest $request, $padrexxx)
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
    public function show(SisClinica $padrexxx, Paciente $objetoxx)
    {
        $this->opciones['cardheap'] = 'EDITAR PACIENTE: ' . $objetoxx->nombres . ' ' . $objetoxx->apellidos;
        $this->opciones['cardhead'] = 'CLINICA: ' . $padrexxx->clinica;

        $clinicax = Auth::user()->sis_clinica_id;
        $padrexxx = $padrexxx->id;
        // if($clinicax==1){
        //     $padrexxx=$clinicax;
        // }
        $this->opciones['botoform'][0]['routingx'][1] = $padrexxx;
        $this->opciones['parametr'] = [$padrexxx, $objetoxx->id];
        $this->opciones['tituloxx'] = 'Editar: Paciente';
        $this->opciones['paciente'] = $objetoxx;
        return $this->view($objetoxx,  'modeloxx', 'Ver', $this->opciones['rutacarp'] . 'pestanias');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(SisClinica $padrexxx, Paciente $objetoxx)
    {
        $this->opciones['cardheap'] = 'EDITAR PACIENTE: ' . $objetoxx->nombres . ' ' . $objetoxx->apellidos;
        $this->opciones['cardhead'] = 'CLINICA: ' . $padrexxx->clinica;

        $clinicax = Auth::user()->sis_clinica_id;
        $padrexxx = $padrexxx->id;
        // if($clinicax==1){
        //     $padrexxx=$clinicax;
        // }
        $this->opciones['botoform'][0]['routingx'][1] = $padrexxx;
        $this->opciones['parametr'] = [$padrexxx, $objetoxx->id];
        $this->opciones['tituloxx'] = 'Editar: Paciente';
        $this->opciones['paciente'] = $objetoxx;
        $this->opciones['botoform'][] =
            [
                'mostrars' => true, 'accionxx' => 'EDITAR', 'routingx' => [$this->opciones['routxxxx'] . '.editar', [$padrexxx, $objetoxx->id]],
                'formhref' => 1, 'tituloxx' => 'kkkk', 'clasexxx' => 'btn btn-sm btn-primary'
            ];
        return $this->view($objetoxx,  'modeloxx', 'Editar', $this->opciones['rutacarp'] . 'pestanias');
    }

    private function grabar($dataxxxx, $objectx, $infoxxxx)
    {
        $paciente = Paciente::transaccion($dataxxxx, $objectx);

        return redirect()
            ->route($this->opciones['routxxxx'] . '.editar', [$paciente->sis_clinica_id, $paciente->id])
            ->with('info', $infoxxxx);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SisClinica $padrexxx, PacienteEditarRequest  $request, Paciente $objetoxx)
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
    public function destroy(Paciente $objetoxx, $padrexxx)
    {
        $this->opciones['parametr'] = [$objetoxx->id];

        $objetoxx->sis_esta_id = ($objetoxx->sis_esta_id == 2) ? 1 : 2;
        $objetoxx->save();
        $activado = $objetoxx->sis_esta_id == 2 ? 'inactivado' : 'activado';

        return redirect()->route($this->opciones['routxxxx'])->with('info', 'Registro ' . $activado . ' con éxito');
    }
}