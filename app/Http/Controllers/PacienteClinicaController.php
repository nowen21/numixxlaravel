<?php

namespace App\Http\Controllers;

use App\Paciente;
use App\Clinica;
use App\ClinicaPaciente;
use App\Http\Requests\PacienteClinicaCreateRequest;
use App\Helpers\Calcularedad;
use DataTables;

class PacienteClinicaController extends Controller {

  private $edadxxxx;

  public function __construct() {
    $this->edadxxxx = new Calcularedad;
  }

  public function index() {
    return view('pacienteclinicas.index');
  }

  public function getdata() {
    $query = Paciente::
                    select(['pacientes.nombres', 'pacientes.id', 'pacientes.apellidos', 'estados.nombre'])
                    ->join('estados', 'pacientes.estado_id', '=', 'estados.id')
                    ->orderBy('pacientes.updated_at', 'desc')->get()
    ;

    $collecti = [];
    foreach ($query as $value) {
      $collecti[] = [
          'id' => $value->id,
          'nombres' => $value->nombres,
          'apellidos' => $value->apellidos,
          'estado_id' => $value->nombre,
          'acciones' => ''
      ];
    }

    $collection = collect($collecti);
    return DataTables::of($collection)->toJson();
  }

  private function getClinicas($paciente, $request) {
    $iclinica=[];
    foreach ($request->get('clinicas') as $clinicaz) {
     $clinicax = ClinicaPaciente::where('paciente_id', $paciente->id)->where('clinica_id', $clinicaz)->get();
     if (count($clinicax) == 0) { 
     $paciente->clinicas()->attach($clinicaz);
        $iclinica[]=$clinicaz;
      }
    }
  }

  public function edit(Paciente $paciente) {
    $clinicas = Clinica::get();
    return view('pacienteclinicas.edit', compact('paciente', 'clinicas'));
  }

  public function update(PacienteClinicaCreateRequest $request, Paciente $paciente) {
    $this->getClinicas($paciente, $request);
    return redirect()->route('pacienteclinicas.edit', $paciente->id)
                    ->with('info', 'Paciente actualizado con exito');
  }

  public function show(Paciente $paciente) { 
    $clinicas = Clinica::get();
    return view('pacienteclinicas.show', compact('paciente', 'clinicas'));
  }
}
