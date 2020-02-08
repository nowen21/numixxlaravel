<?php

namespace App\Http\Controllers;

use App\Paciente;
use Illuminate\Http\Request;
use App\Genero;
use App\Eps;
use App\Servicio;
use App\Clinica;
use App\ClinicaPaciente;
use App\PacienteServicio;
use App\Departamento;
use App\Estado;
use App\Npt;
use App\Unidade;
use App\Municipio;
use App\Formulacione;
use App\Http\Requests\PacienteCreateRequest;
use App\Http\Requests\PacienteUpdateRequest;
use App\Helpers\Calcularedad;
use DataTables;

class PacientesController extends Controller {

  private $edadxxxx;

  public function __construct() {
    $this->edadxxxx = new Calcularedad;
  }

  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index() {
    return view('pacientes.index');
  }

  private function clinicas($paciente) {
    $clini_id = auth()->user()->clinica_id;
    $clinicas = ClinicaPaciente::select(['clinicas.id','clinicas.nombre'])
            ->join('clinicas','clinica_paciente.clinica_id','=','clinicas.id')
            ->where(function ($query)use($clini_id,$paciente) {
              if ($clini_id == 1) {
                $query->where('clinica_paciente.paciente_id', $paciente);
              } else {
                $query->where('clinica_paciente.clinica_id', $clini_id)->where('clinica_paciente.paciente_id', $paciente);
              }
              return $query;
            })->get();
    return $clinicas;
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create() {
    //$this->edadxxxx->edad('2019-04-05');
    $generos = Genero::combo();
    $eps = Eps::combo();
    $servicios = Servicio::combo();
    if (count($servicios) == 0) {
      $clinicax = Clinica::find(auth()->user()->clinica_id);
      return redirect()->route('servicios.index')
                      ->with('info', 'Clínica: (' . $clinicax->nombre . ') sin servicios');
    }
    $departamentos = Departamento::combo();
    $estados = Estado::combo();
    $npt = Npt::combo();
    $unidades = Unidade::combo();
    $paciente_id = 0;
    $nombres = '';
    return view('pacientes.create', compact('generos', 'eps', 'servicios', 'clinicas', 'departamentos', 'estados', 'npt', 'paciente_id', 'nombres', 'unidades'));
  }

  public function munici(Request $request, $id) {
    if ($request->ajax()) {
      return response()->json(Municipio::combowhere($id));
    }
  }

  public function getdata() {
    $clini_id = auth()->user()->clinica_id;
    $query = Paciente::
                    select(['pacientes.nombres', 'pacientes.id', 'pacientes.apellidos', 'npts.nombre', 'pacientes.estado_id', 'clinicas.nombre as clinicax', 'estados.nombre as estadoxx', 'clinica_paciente.clinica_id'])
                    ->join('clinica_paciente', 'pacientes.id', 'clinica_paciente.paciente_id')
                    ->join('clinicas', 'clinica_paciente.clinica_id', 'clinicas.id')
                    ->join('npts', 'pacientes.npt_id', '=', 'npts.id')
                    ->join('estados', 'pacientes.estado_id', '=', 'estados.id')
                    ->where(function($where)use($clini_id) {
                      if ($clini_id != 1) {
                        $where->where('clinicas.id', $clini_id);
                      }
                    })
                    //->orderBy('pacientes.updated_at', 'desc')
                    
                    ->get()
    ;

    $collecti = [];
    $formulac = new Formulacione;
    foreach ($query as $value) {
      $collecti[] = ['id' => $value->id,
          'nombre' => $value->nombre,
          'nombres' => $value->nombres,
          'apellidos' => $value->apellidos,
          'estado_id' => $value->estado_id,
          'estadoxx' => $value->estadoxx,
          'clinicax' => $value->clinicax,
          'clinica_id' => $value->clinica_id,
          'acciones' => '',
          'formulac' => $formulac->formulacionactual($value->id, $value->clinica_id)
      ];
    }

    $collection = collect($collecti);
    return DataTables::of($collection)->toJson();
  }

  private function servicios($iclinica) {
    return PacienteServicio::select(['paciente_servicio.id', 'paciente_servicio.servicio_id','servicios.nombre'])
                    ->join('servicios', 'paciente_servicio.servicio_id', '=', 'servicios.id')
                    ->join('clinicas', 'servicios.clinica_id', '=', 'clinicas.id')
                    ->where('servicios.clinica_id', $iclinica)
                    ->where('paciente_servicio.estado_id', 1)->first();
  }

  private function serviciosyclinicas($paciente, $request) {
    $iclinica = auth()->user()->clinica_id;
    $iservici = $request->get('servicio_id');
    $servicio = $this->servicios($iclinica);
    /*Ya el paciente tiene servicio*/
    if (count($servicio) > 0) {
      /*Se pasa a inactivo el que tiene para asignarle otro*/
      if ($iservici != $servicio->servicio_id) {
        $nservici = PacienteServicio::find($servicio->id);
        $nservici->update(['estado_id' => 2]);
        $paciente->servicios()->attach([$iservici => ['estado_id' => 1]]);
      }
    } else {
      $paciente->servicios()->attach([$iservici => ['estado_id' => 1]]);
    }
    $clinicax = ClinicaPaciente::where('clinica_id', $iclinica)->first();
    //if (count($clinicax) == 0) {
      $paciente->clinicas()->attach([$iclinica]);
    //}
  }

  public function store(PacienteCreateRequest $request) {
    $paciente = Paciente::create($this->data($request->all()));
    $this->serviciosyclinicas($paciente, $request);
    return redirect()->route('pacientes.edit', $paciente->id)
                    ->with('info', 'Paciente guardado con exito');
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Paciente  $paciente
   * @return \Illuminate\Http\Response
   */
  public function show(Paciente $paciente) {
    $paciente['servicio']= $this->servicios(auth()->user()->clinica_id)->nombre;
    $edadxxxx = $this->edadxxxx->edad($paciente->edad);
    $clinicas = $this->clinicas($paciente->id);
    return view('pacientes.show', compact('paciente', 'edadxxxx', 'clinicas'));
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Paciente  $paciente
   * @return \Illuminate\Http\Response
   */
  public function edit(Paciente $paciente) {
    $paciente['servicio_id'] = $this->servicios(auth()->user()->clinica_id)->servicio_id;
    $generos = Genero::combo();
    $eps = Eps::combo();
    $servicios = Servicio::combo();
    $departamentos = Departamento::combo();
    $estados = Estado::combo();
    $npt = Npt::combo();
    $unidades = Unidade::combo();
    $update = '';
    $paciente_id = $paciente->id;
    $nombres = $paciente->nombres . " " . $paciente->apellidos;
    return view('pacientes.edit', compact('paciente', 'generos', 'eps', 'servicios', 'clinicas', 'departamentos', 'estados', 'npt', 'update', 'paciente_id', 'nombres', 'unidades'));
  }

  private function data($request) {
    return [
        'registro' => $request['registro'],
        'nombres' => strtoupper($request['nombres']),
        'apellidos' => strtoupper($request['apellidos']),
        'peso' => $request['peso'],
        'genero_id' => $request['genero_id'],
        'cedula' => $request['cedula'],
        'eps_id' => $request['eps_id'],
        'cama' => $request['cama'],
        'servicio_id' => $request['servicio_id'],
        'edad' => $request['edad'],
        'departamento_id' => $request['departamento_id'],
        'municipio_id' => $request['municipio_id'],
        'npt_id' => $request['npt_id'],
        'estado_id' => $request['estado_id'],
    ];
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Paciente  $paciente
   * @return \Illuminate\Http\Response
   */
  public function update(PacienteUpdateRequest $request, Paciente $paciente) {
    $paciente->update($this->data($request->all()));
    $this->serviciosyclinicas($paciente, $request);
    return redirect()->route('pacientes.edit', $paciente->id)
                    ->with('info', 'Paciente actualizado con exito');
  }

  public function calcularedad(Request $request) {
    if ($request->ajax()) {
      $fechahoy = date('Y-m-d', time());
      if ($fechahoy > $request->all()['fechnaci']) {
        $fechahoy = $request->all()['fechnaci'];
      }
      return json_encode(['edadxxxx' => $this->edadxxxx->edad($request->all()['fechnaci']), 'fechnaci' => $fechahoy]);
    }
  }

}
