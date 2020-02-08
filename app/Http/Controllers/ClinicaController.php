<?php

namespace App\Http\Controllers;

use App\Clinica;
use App\Estado;
use App\Http\Requests\ClinicaCreateRequest;
use App\Http\Requests\ClinicaUpdateRequest;

class ClinicaController extends Controller {
  public function index() {
    return view('clinicas.index');
  }

  private function medicamentos() {
    return \App\Medicamento::select('medicamentos.id','medicamentos.nombgene')
            ->join('medicamento_npt','medicamentos.id','=','medicamento_npt.medicamento_id')
            ->join('casa_medicamento','medicamentos.id','=','casa_medicamento.medicamento_id')
            ->where('medicamentos.estado_id',1)
            ->groupBy('medicamentos.nombgene')
            ->get();
  }


  public function create() {
    $estados = Estado::combo();
    $medicame=$this->medicamentos();
    return view('clinicas.create', compact('estados','medicame'));
  }

  public function getdata() {
    $clinicas = Clinica::query();
    return datatables()->eloquent($clinicas)
                    ->addColumn('estado', function ($clinicas) {
                      $sestadox = 'INACTIVO';
                      if ($clinicas->estado == 1) {
                        $sestadox = 'ACTIVO';
                      }
                      return $sestadox;
                    })
                    ->make(true);
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(ClinicaCreateRequest $request) {
    $clinica = Clinica::create(['nombre' => strtoupper($request->all()['nombre']), 'nit' => $request->all()['nit'],
                'telefono' => $request->all()['telefono'], 'estado' => $request->all()['estado'], 'digiveri' => $request->all()['digiveri']]);
    $clinica->medicamentos()->sync($request->get('medicamentos'));
    return redirect()->route('clinicas.edit', $clinica->id)
                    ->with('info', 'Clínica guardada con exito');
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Pacientes  $pacientes
   * @return \Illuminate\Http\Response
   */
  public function show(Clinica $clinica) {
    $medicame=$this->medicamentos();
    $estado = Estado::find($clinica->estado)->nombre;
    return view('clinicas.show', compact('clinica', 'estado','medicame'));
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Pacientes  $users
   * @return \Illuminate\Http\Response
   */
  public function edit(Clinica $clinica) {
    $estados = Estado::combo();
    $medicame=$this->medicamentos();
    $update = '';
    return view('clinicas.edit', compact('clinica', 'estados', 'update','medicame'));
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Pacientes  $users
   * @return \Illuminate\Http\Response
   */
  public function update(ClinicaUpdateRequest $request, Clinica $clinica) {
    // Actualizar la eps
    $clinica->update(['nombre' => strtoupper($request->all()['nombre']), 'nit' => $request->all()['nit'], 'telefono' => $request->all()['telefono'],
        'estado' => $request->all()['estado'], 'digiveri' => $request->all()['digiveri']]);
    // Actualizar los medicamentos
    $clinica->medicamentos()->sync($request->get('medicamentos'));
    return redirect()->route('clinicas.edit', $clinica->id)
                    ->with('info', 'Clínica actualizada con exito');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Pacientes  $pacientes
   * @return \Illuminate\Http\Response
   */
  public function destroy(Clinica $clinica) {
    $clinica->delete();
    return back()->with('info', 'Eliminado correctamente');
  }

  public function dv(\Illuminate\Http\Request $request) {
    if ($request->ajax()) {
      $data = $request->all();
      return response()->json($this->digitoverificacion($data['nitxxxxx']));
    }
  }

  public function digitoverificacion($nitxxxxx) {
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
