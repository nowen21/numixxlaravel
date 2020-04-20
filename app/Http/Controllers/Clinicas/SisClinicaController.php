<?php

namespace App\Http\Controllers\Clinicas;

use App\Http\Controllers\Controller;
use App\Http\Requests\Clinica\SisClinicaCrearRequest;
use App\Http\Requests\Clinica\SisClinicaEditarRequest;
use App\Models\Clinica\SisClinica;
use App\Models\Sistema\SisEsta;
use Illuminate\Http\Request;

class SisClinicaController extends Controller
{
    private $opciones;

    public function __construct()
    {
        $this->opciones = [
            'cardhead' => '',// titulo para las pestañas
            'permisox' => 'clinica',
            'parametr' => [],
            'rutacarp' => 'Clinicas.',
            'tituloxx' => 'clinica',
            'slotxxxy' => 'clinica',
            'slotxxxx'=>'clinica',
            'carpetax'=>'Clinica',
            'indecrea'=>false,
            'esindexx'=>false
        ];

        $this->middleware(['permission:' . $this->opciones['permisox'] . '-leer'], ['only' => ['index', 'show']]);
        $this->middleware(['permission:' . $this->opciones['permisox'] . '-crear'], ['only' => ['index', 'show', 'create', 'store', 'view', 'grabar']]);
        $this->middleware(['permission:' . $this->opciones['permisox'] . '-editar'], ['only' => ['index', 'show', 'edit', 'update', 'view', 'grabar']]);
        $this->middleware(['permission:' . $this->opciones['permisox'] . '-borrar'], ['only' => ['index', 'show', 'destroy']]);

        $this->opciones['readonly'] = '';
        $this->opciones['rutaxxxx'] = 'clinica';
        $this->opciones['routnuev'] = 'clinica';
        $this->opciones['routxxxx'] = 'clinica';

        $this->opciones['botoform'] = [
            [
                'mostrars' => true, 'accionxx' => '', 'routingx' => [$this->opciones['routxxxx'], []],
                'formhref' => 2, 'tituloxx' => 'VOLVER A CLINICAS', 'clasexxx' => 'btn btn-sm btn-primary'
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
        $padrexxx='';
        $this->opciones['indecrea']=true;
        $this->opciones['esindexx']=true;
        $this->opciones['accionxx']='index';
        $this->opciones['padrexxx'] = $padrexxx;
        $this->opciones['tablasxx'] = [
            [
                'titunuev' => 'NUEVA CLINICA',
                'titulist' => 'LISTA DE CLINICAS',
                'dataxxxx' => [
                    ['campoxxx' => 'botonesx', 'dataxxxx' => $this->opciones['rutacarp'] . $this->opciones['carpetax'] . '.botones.botonesapi'],
                    ['campoxxx' => 'estadoxx', 'dataxxxx' => 'layouts.components.botones.estadoxx'],
                    ['campoxxx' => 'medicame', 'dataxxxx' => $padrexxx],
                ],
                'vercrear' => true,
                'accitabl' => true,
                'urlxxxxx' => 'api/clinica/clinica',
                'cabecera' =>[
                    ['td' => 'ID'],
                    ['td' => 'CLINICA'],
                    ['td' => 'ESTADO'],
                ],
                'columnsx' => [
                    ['data' => 'botonexx', 'name' => 'botonexx'],
                    ['data' => 'id', 'name' => 'sis_clinica.id'],
                    ['data' => 'clinica', 'name' => 'sis_clinica.clinica'],
                    ['data' => 's_estado', 'name' => 'sis_estas.s_estado'],
                ],
                'tablaxxx' => 'tablaclinicas',
                'permisox' => 'clinica',
                'routxxxx' => 'clinica',
                'parametr' => [$padrexxx],
            ],

        ];
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
    public function create()
    {
        $this->opciones['indecrea']=true;
        $this->opciones['clinicax'] =''; 
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
    public function store(SisClinicaCrearRequest $request)
    {
        $dataxxxx = $request->all();
        return $this->grabar($dataxxxx, '', 'Registro creado con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(SisClinica $objetoxx)
    {
        $this->opciones['cardhead']='CLINICA: '. $objetoxx->clinica;
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
    public function edit(SisClinica $objetoxx)
    {
        $this->opciones['cardhead']='CLINICA: '. $objetoxx->clinica;
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
            ->route($this->opciones['routxxxx'] . '.editar', [SisClinica::transaccion($dataxxxx, $objectx)->id])
            ->with('info', $infoxxxx);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SisClinicaEditarRequest  $request, SisClinica $objetoxx)
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
    public function destroy(SisClinica $objetoxx)
    {
        $this->opciones['parametr'] = [$objetoxx->id];

        $objetoxx->sis_esta_id = ($objetoxx->sis_esta_id == 2) ? 1 : 2;
        $objetoxx->save();
        $activado = $objetoxx->sis_esta_id == 2 ? 'inactivado' : 'activado';

        return redirect()->route($this->opciones['routxxxx'])->with('info', 'Registro ' . $activado . ' con éxito');
    }

    public function dv(Request $request)
    {
        if ($request->ajax()) {
            return response()->json($this->digitoverificacion($request->nitxxxxx));
        }
    }

    public function digitoverificacion($nitxxxxx)
    {
        $primosxx = [3, 7, 13, 17, 19, 23, 29, 37, 41, 43, 47, 53, 59, 67, 71];
        $lengnitx = strlen($nitxxxxx);
        $sumaxxxx = 0;
        for ($i = 0; $i < $lengnitx; $i++) {
            $sumaxxxx += $primosxx[$i] * substr($nitxxxxx, $lengnitx - ($i + 1), 1);
        }
        $moduloxx = fmod($sumaxxxx, 11);
        $digitoxx = 0;
        if ($moduloxx == 0 || $moduloxx == 1) {
            $digitoxx = $moduloxx;
        } else {
            $digitoxx = 11 - $moduloxx;
        }
        return ['digitoxx' => $digitoxx];
    }
}
