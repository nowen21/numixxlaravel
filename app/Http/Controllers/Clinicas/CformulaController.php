<?php

namespace App\Http\Controllers\Clinicas;

use App\Helpers\Cformula\Dataformulario;
use App\Helpers\Cformula\GrabarFormulacion;
use App\Helpers\Cformula\Validacionesajax;
use App\Http\Controllers\Controller;
use App\Http\Requests\Formulaciones\CformulaCrearRequest;
use App\Http\Requests\Formulaciones\CformulaEditarRequest;
use App\Models\Clinica\SisClinica;
use App\Models\Formulaciones\Cformula;
use App\Models\Pacientes\Paciente;
use App\Models\Sistema\SisEsta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CformulaController extends Controller
{
    private $opciones;

    public function __construct()
    {
        $this->opciones = [
            'permisox' => 'formular',
            'cardhead' => 'CLINICA :', 
            'cardheap' => 'FORMULACIONES', 
            'parametr' => [],
            'rutacarp' => 'Clinicas.',
            'tituloxx' => 'Crear: Formulación',
            'slotxxxy' => 'paciente',
            'slotxxxx' => 'formular',
            'carpetax' => 'Cformula',
            'indecrea' => false,
            'esindexx' => false
        ];

        $this->middleware(['permission:' . $this->opciones['permisox'] . '-leer'], ['only' => ['index', 'show']]);
        $this->middleware(['permission:' . $this->opciones['permisox'] . '-crear'], ['only' => ['index', 'show', 'create', 'store', 'view', 'grabar']]);
        $this->middleware(['permission:' . $this->opciones['permisox'] . '-editar'], ['only' => ['index', 'show', 'edit', 'update', 'view', 'grabar']]);
        $this->middleware(['permission:' . $this->opciones['permisox'] . '-borrar'], ['only' => ['index', 'show', 'destroy']]);

        $this->opciones['readonly'] = '';
        $this->opciones['rutaxxxx'] = 'formular';
        $this->opciones['routnuev'] = 'formular';
        $this->opciones['routxxxx'] = 'formular';

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
    public function index($clinicax,$padrexxx)
    {

        $this->opciones['cardhead']=$this->opciones['cardhead'].SisClinica::where('id',$clinicax)->first()->clinica;   
        $paciente=Paciente::getPaciente(['padrexxx'=>$padrexxx]);
        $this->opciones['paciente']=$paciente;
        $this->opciones['botoform'][0]['routingx'][1] = [$clinicax,$padrexxx];
        $this->opciones['indecrea'] = false;
        $this->opciones['esindexx'] = false;
        $this->opciones['accionxx'] = 'index';
        $this->opciones['padrexxx'] = $padrexxx;
        $this->opciones['parametr'] = [$clinicax,$padrexxx];
        $this->opciones['tablasxx'] = [
            [
                'titunuev' => 'NUEVA FORMULACIóN',
                'titulist' => 'LISTA DE FORMULACIONES',
                'dataxxxx' => [
                    ['campoxxx' => 'botonesx', 'dataxxxx' => $this->opciones['rutacarp'] . $this->opciones['carpetax'] . '.botones.botonesapi'],
                    ['campoxxx' => 'estadoxx', 'dataxxxx' => 'layouts.components.botones.estadoxx'],
                    ['campoxxx' => 'paciente', 'dataxxxx' => $padrexxx],
                ],
                'vercrear' => true,
                'accitabl' => true,
                'urlxxxxx' => 'api/paciente/formulaciones',
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
                'permisox' => 'formular',
                'routxxxx' => 'formular',
                'parametr' => [$clinicax,$padrexxx],
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
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
   
    public function create($clinicax,$padrexxx)
    {   
        $this->opciones['cardhead']=$this->opciones['cardhead'].SisClinica::where('id',$clinicax)->first()->clinica;  
        $paciente=Paciente::getPaciente(['padrexxx'=>$padrexxx]);
        $this->opciones['cardheap']='FORMULACION PACIENTE: '.$paciente->nombres.' '.$paciente->apellidos;   
        $this->opciones['formular'] = Dataformulario::getPintarFormulario(
            [
                'paciente' => $paciente,
                'furmulac' => '',
            ]
        );
        //ddd($padrexxx);
        
        $this->opciones['paciente'] =$paciente;
        $this->opciones['clinicax'] = [$paciente->sis_clinica->id=>$paciente->sis_clinica->clinica];
        $this->opciones['botoform'][0]['routingx'][1] = [$clinicax,$padrexxx];
        $this->opciones['parametr'] = [$clinicax,$padrexxx];
        $this->opciones['padrexxx'] = $padrexxx;
        $this->opciones['indecrea'] = false;
        $this->opciones['clinicac'] = true;
        $this->opciones['botoform'][] =
            [
                'mostrars' => true, 'accionxx' => 'CREAR', 'routingx' => [$this->opciones['routxxxx'] . '.editar', []],
                'formhref' => 3, 'tituloxx' => '', 'clasexxx' => 'btn btn-sm btn-primary guardarx'
            ];
        return $this->view(true, '', 'Crear', $this->opciones['rutacarp'] . 'pestanias');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store($clinicax,$paciente,CformulaCrearRequest $request)
    {
        $dataxxxx = $request->all();
        $dataxxxx['desdexxx'] =10;
        $dataxxxx['paciente_id'] =$paciente;
        $dataxxxx['sis_clinica_id'] = Auth::user()->sis_clinica_id;
        return $this->grabar($dataxxxx, '', 'Registro creado con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($clinicax,$padrexxx,Cformula $objetoxx)
    {
        $this->opciones['cardhead']=$this->opciones['cardhead'].SisClinica::where('id',$clinicax)->first()->clinica;  
        $this->opciones['tituloxx']='Ver: Formulación';
        $paciente=Paciente::getPaciente(['padrexxx'=>$padrexxx]);
        $this->opciones['cardheap']='FORMULACION PACIENTE: '.$paciente->nombres.' '.$paciente->apellidos;   
        $this->opciones['formular'] = Dataformulario::getPintarFormulario(
            [
                'paciente' => $paciente,
                'furmulac' => $objetoxx,
            ]
        );
        $this->opciones['paciente'] = $paciente;
        $this->opciones['clinicax'] = [$paciente->sis_clinica->id=>$paciente->sis_clinica->clinica];
        $this->opciones['botoform'][0]['routingx'][1] = [$clinicax,$padrexxx];
        $this->opciones['parametr'] = [$clinicax,$objetoxx->id];
        $this->opciones['readonly'] = 'readonly';
        return $this->view($objetoxx,  'modeloxx', 'Ver', $this->opciones['rutacarp'] . 'pestanias');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($clinicax,$padrexxx,Cformula $objetoxx)
    { 
        $this->opciones['cardhead']=$this->opciones['cardhead'].SisClinica::where('id',$clinicax)->first()->clinica;  
        $this->opciones['tituloxx']='Editar: Formulación';
        $paciente=Paciente::getPaciente(['padrexxx'=>$padrexxx]);
        $this->opciones['cardheap']='FORMULACION PACIENTE: '.$paciente->nombres.' '.$paciente->apellidos;   
        $this->opciones['formular'] = Dataformulario::getPintarFormulario(
            [
                'paciente' => $paciente,
                'furmulac' => $objetoxx,
               
            ]
        );
        $this->opciones['paciente'] = $paciente;
        $this->opciones['clinicax'] = [$paciente->sis_clinica->id=>$paciente->sis_clinica->clinica];
        $this->opciones['botoform'][0]['routingx'][1] = [$clinicax,$padrexxx];
        $this->opciones['parametr'] = [$clinicax,$padrexxx,$objetoxx->id];
        $this->opciones['botoform'][] =
            [
                'mostrars' => true, 'accionxx' => 'EDITAR', 'routingx' => [$this->opciones['routxxxx'] . '.editar', [$padrexxx,$objetoxx->id]],
                'formhref' => 1, 'tituloxx' => '', 'clasexxx' => 'btn btn-sm btn-primary'
            ];

            $this->opciones['botoform'][] =[
                'mostrars' => true, 'accionxx' => '', 'routingx' => [$this->opciones['routxxxx'].'.nuevo', [$clinicax,$padrexxx]],
                'formhref' => 2, 'tituloxx' => 'CREAR NUEVO', 'clasexxx' => 'btn btn-sm btn-primary'
            ];
        return $this->view($objetoxx,  'modeloxx', 'Editar', $this->opciones['rutacarp'] . 'pestanias');
    }

    private function grabar($dataxxxx, $objectx, $infoxxxx)
    {
        $cformula=Cformula::transaccion($dataxxxx, $objectx);
        $dataxxxx['cformula']=$cformula;
      
        GrabarFormulacion::setDformula($dataxxxx);
        $redirect = '.ver';
        if (auth()->user()->can($this->opciones['routxxxx'] . '-editar')) {
            $redirect = '.editar';
        }
        return redirect()
            ->route($this->opciones['routxxxx'] . $redirect, [$cformula->sis_clinica,$cformula->paciente_id,$cformula->id])
            ->with('info', $infoxxxx);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($clinicax,$paciente,CformulaEditarRequest  $request, Cformula $objetoxx)
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
    public function destroy($clinicax,$padrexxx,Cformula $objetoxx)
    {
        $this->opciones['cardhead']=$this->opciones['cardhead'].SisClinica::where('id',$clinicax)->first()->clinica;  
        $this->opciones['botoform'][0]['routingx'][1] = $padrexxx;
        $this->opciones['parametr'] = [$objetoxx->id];

        $objetoxx->sis_esta_id = ($objetoxx->sis_esta_id == 2) ? 1 : 2;
        $objetoxx->save();
        $activado = $objetoxx->sis_esta_id == 2 ? 'inactivado' : 'activado';

        return redirect()->route($this->opciones['routxxxx'])->with('info', 'Registro ' . $activado . ' con éxito');
    }

    public function getFormular(Request $request)
    {
        if($request->ajax()){
            return response()->json(Validacionesajax::formulaciones($request->all()));
        }
    }
    //public function getPedineon($paciente)
     public function getPedineon(Request $request)
    {
        require_once('DataFormulacionEjemplo.php');
        $respuest=[];

       // ddd($dataxxxx['dataxxxx']);
        if($request->ajax()){
            $dataxxxx=$request->all();
            $existexx=['elemtraz', 'multivit', 'multiuno'];
            foreach($dataxxxx['dataxxxx'] as $key => $value){
                if (in_array($value['name'], $existexx)) {
                    $dataxxxx['campo_id']=$value['name'].'_cant';
                    $respuest[]=Validacionesajax::getFormulaciones($dataxxxx,$value['name']); 
                }
                //$dataxxxx = 
            }
            //return $respuest;
            return response()->json($respuest);
        }
    }

    public function getRequerimientoVolumen(Request $request)
    {
        if($request->ajax()){
            return Validacionesajax::getRango($request);
        }
    }
}
