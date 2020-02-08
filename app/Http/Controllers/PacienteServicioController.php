<?php

namespace App\Http\Controllers;

use App\PacienteServicio;
use App\Clinica;
use App\Estado;
use App\Paciente;
use App\Http\Requests\PacienteServicioCreateRequest;
use DataTables;

class PacienteServicioController extends Controller {

  public function index() {
    return view('pacienteservicio.index');
  }

  public function pacientes($paciente) {
    $ipacient = Paciente::
            select('pacientes.id', 'pacientes.nombres', 'pacientes.apellidos')
            ->join('clinica_paciente', 'pacientes.id', '=', 'clinica_paciente.paciente_id')
            ->where('clinica_paciente.clinica_id', auth()->user()->clinica_id)
            ->where('pacientes.estado_id', 1)
            ->where(function ($query) use ($paciente) {
              if ($paciente != 0) {
                $query->where('pacientes.id', $paciente);
              } else {
                $sqlquery = PacienteServicio::select('paciente_servicio.paciente_id')
                        ->join('clinica_paciente', 'paciente_servicio.paciente_id', '=', 'clinica_paciente.paciente_id')
                        ->where('clinica_paciente.clinica_id', auth()->user()->clinica_id)
                        ->where('paciente_servicio.estado_id', 1)
                        ->get();
                $query->whereNotIn('pacientes.id', $sqlquery);
              }
            })
            ->get();
    $apacient = ['' => 'Seleccione'];
    foreach ($ipacient as $key => $value) {
      $apacient[$value->id] = $value->nombres . ' ' . $value->apellidos;
    }
    return $apacient;
  }

  public function create() {
    $pacientx = $this->pacientes(0);
    $estadosx = Estado::combo();
    $servicio = $this->getSericios(0);
    $showxxxx=0;
    return view('pacienteservicio.create', compact('estadosx', 'pacientx', 'servicio','showxxxx'));
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(PacienteServicioCreateRequest $request) {
    $paciserv = PacienteServicio::create(['paciente_id' => strtoupper($request->all()['paciente_id']), 'servicio_id' => $request->all()['servicio_id'], 'estado_id' => $request->all()['estado_id']]);
    return redirect()->route('pacienteservicio.edit', $paciserv->id)
                    ->with('info', 'Eps guardada con exito');
  }

  public function getdata() {
    $query = PacienteServicio::
                    select(['pacientes.nombres', 'paciente_servicio.id', 'pacientes.apellidos', 'estados.nombre', 'servicios.nombre as servicio'])
                    ->join('pacientes', 'paciente_servicio.paciente_id', '=', 'pacientes.id')
                    ->join('estados', 'paciente_servicio.estado_id', '=', 'estados.id')
                    ->join('servicios', 'paciente_servicio.servicio_id', '=', 'servicios.id')
                    
                    ->orderBy('pacientes.updated_at', 'desc')->get();
    $collecti = [];
    foreach ($query as $value) {
      $collecti[] = [
          'id' => $value->id,
          'servicio' => $value->servicio,
          'nombres' => $value->nombres,
          'apellidos' => $value->apellidos,
          'estado_id' => $value->nombre,
          'acciones' => ''
      ];
    }

    $collection = collect($collecti);
    return DataTables::of($collection)->toJson();
  }

  private function getPacientesServicio($actualxx) {
    $servicio = PacienteServicio::
                    select('servicios.id', 'servicios.nombre')
                    ->join('servicios', 'paciente_servicio.servicio_id', '=', 'servicios.id')
                    ->where('servicios.clinica_id', auth()->user()->clinica_id)
                    ->where('paciente_servicio.estado_id', 1)
                    ->orWhere(function($query) use($actualxx) {
                      $query->orWhere('paciente_servicio.servicio_id', $actualxx);
                    })->get();
    return $servicio;
  }

  /**/

  private function getSericios($actualxx) {
    $iservici = ['' => 'Seleccione'];
    foreach ($this->getPacientesServicio($actualxx) as $servicix) {
      $iservici[$servicix->id] = $servicix->nombre;
    }
    return $iservici;
  }

  public function edit(PacienteServicio $pacienteservicio) {
    $pacientx = $this->pacientes($pacienteservicio->paciente_id);
    $estadosx = Estado::combo();
    $servicio = $this->getSericios($pacienteservicio->servicio_id);
    $showxxxx=0;
    return view('pacienteservicio.edit', compact('pacienteservicio', 'pacientx', 'servicio', 'estadosx','showxxxx'));
  }

  public function update(PacienteServicioCreateRequest $request, PacienteServicio $pacienteservicio) {
    $pacienteservicio->update(['paciente_id' => strtoupper($request->all()['paciente_id']), 'servicio_id' => $request->all()['servicio_id'], 'estado_id' => $request->all()['estado_id']]);
    return redirect()->route('pacienteservicio.edit', $pacienteservicio->id)
                    ->with('info', 'Paciente Servicio actualizado con exito');
  }

  public function show(PacienteServicio $pacienteservicio) {
    $pacientx = $this->pacientes($pacienteservicio->paciente_id);
    $estadosx = Estado::combo();
    $servicio = $this->getSericios($pacienteservicio->servicio_id);
    return view('pacienteservicio.show', compact('pacientx', 'estadosx','servicio','pacienteservicio'));
  }

}
