<?php

namespace App\Http\Controllers\Produccion;

use App\Helpers\Cformula\Dataformulario;
use App\Helpers\Cformula\GrabarFormulacion;
use App\Helpers\Cformula\Validacionesajax;
use App\Http\Controllers\Controller;
use App\Models\Formulaciones\Cformula;
use App\Models\Pacientes\Paciente;
use App\Models\Sistema\SisEsta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RevisionController extends Controller
{
    private $opciones;

    public function __construct()
    {
        $this->opciones = [
            'cardhead'=>'Revisión Formulación',
            'permisox' => 'revision',
            'parametr' => [],
            'rutacarp' => 'Produccion.',
            'tituloxx' => 'Crear: Formulación',
            'slotxxxx' => 'revision',
            'carpetax' => 'revision',
            'indecrea' => false,
            'esindexx' => false
        ];

        $this->middleware(['permission:' . $this->opciones['permisox'] . '-leer'], ['only' => ['index', 'show']]);
        $this->middleware(['permission:' . $this->opciones['permisox'] . '-crear'], ['only' => ['index', 'show', 'create', 'store', 'view', 'grabar']]);
        $this->middleware(['permission:' . $this->opciones['permisox'] . '-editar'], ['only' => ['index', 'show', 'edit', 'update', 'view', 'grabar']]);
        $this->middleware(['permission:' . $this->opciones['permisox'] . '-borrar'], ['only' => ['index', 'show', 'destroy']]);

        $this->opciones['readonly'] = '';
        $this->opciones['rutaxxxx'] = 'revision';
        $this->opciones['routnuev'] = 'revision';
        $this->opciones['routxxxx'] = 'revision';

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
        $this->opciones['accionxx'] = 'index';
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
                'permisox' => 'revision',
                'routxxxx' => 'revision',
                'parametr' => [],
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
        return view($vistaxxx, ['todoxxxx' => $this->opciones]);
    }
    
    
    public function edit(Cformula $objetoxx)
    { 

     
        $this->opciones['tituloxx']='Revisar: Formulación';
        
        
        $paciente= $objetoxx->paciente;

        $this->opciones['cardhead']=$this->opciones['cardhead'].' Paciente: '.$paciente->nombres.' '.$paciente->apellidos;

        $this->opciones['formular'] = Dataformulario::getPintarFormulario(
            [
                'paciente' => $paciente,
                'furmulac' => $objetoxx,
               
            ]
        );
        $this->opciones['paciente'] = $paciente;
      
        $this->opciones['parametr'] = [$objetoxx->id];
        $this->opciones['botoform'][] =
            [
                'mostrars' => true, 'accionxx' => 'EDITAR', 'routingx' => [$this->opciones['routxxxx'] . '.editar', [$objetoxx->id]],
                'formhref' => 1, 'tituloxx' => '', 'clasexxx' => 'btn btn-sm btn-primary'
            ];
       return $this->view($objetoxx,  'modeloxx', 'Editar', $this->opciones['rutacarp'] . 'pestanias');
    }

    private function grabar($dataxxxx, $objectx, $infoxxxx)
    {
        $cformula=Cformula::transaccion($dataxxxx, $objectx);
        return redirect()
            ->route($this->opciones['routxxxx'] . '.editar', [$cformula->id])
            ->with('info', $infoxxxx);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request  $request, Cformula $objetoxx)
    {
        $dataxxxx = ['userevis_id'=>Auth::user()->id];
        return $this->grabar($dataxxxx, $objetoxx, 'Registro actualizado con éxito');
    }

    
}
