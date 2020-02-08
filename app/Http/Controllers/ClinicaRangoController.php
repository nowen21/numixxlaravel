<?php

namespace App\Http\Controllers;

use App\Rango;
use App\ClinicaRango;
use App\Estado;
use App\Clinica;
use App\Http\Requests\ClinicaRangoCreateRequest;
use App\Http\Requests\ClinicaRangoUpdateRequest;
use DataTables;

class ClinicaRangoController extends Controller {

  public function index() {
    return view('clinicarangos.index');
  }

  private function clinicas() {
    $lclinica = Clinica::where('id', '<>', 1)->get();
    $clinicax = [];
    $clinicax[''] = 'Seleccione';
    foreach ($lclinica as $key => $value) {
      $clinicax[$value->id] = $value->nombre;
    }
    return $clinicax;
  }

  public function create() {
    $clinicax = $this->clinicas();
    $estados = Estado::combo();
    $rangoxxx[''] = 'Seleccione';
    $irangoxx = 0;
    return view('clinicarangos.create', compact('estados', 'clinicax', 'rangoxxx', 'irangoxx'));
  }

  public function getdata() {
    $collecti = [];
    $rangosxx = ClinicaRango::all();
    foreach ($rangosxx as $rangoxxx) {
      $collecti[] = [
          'id' => $rangoxxx->id,
          'clinica_id' => $rangoxxx->clinica->nombre,
          'rangoxxx' => $rangoxxx->rango->ranginic . '-' . $rangoxxx->rango->rangfina,
          'estad_id' => $rangoxxx->estado->nombre,
          'opciones' => ''
      ];
    }
    $collection = collect($collecti);
    return DataTables::of($collection)->toJson();
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(ClinicaRangoCreateRequest $request) {
    $rangoxxx = ClinicaRango::create(['clinica_id' => $request->all()['clinica_id'], 'rango_id' => $request->all()['rango_id'], 'estado_id' => $request->all()['estado_id'],
                'usercrea' => auth()->user()->id, 'usermodi' => auth()->user()->id]);
    return redirect()->route('clinicarangos.edit', $rangoxxx->id)
                    ->with('info', 'Clínica Rango guardado con exito');
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Rango  $rango
   * @return \Illuminate\Http\Response
   */
  public function show(ClinicaRango $clinicarango) {
    return view('clinicarangos.show', compact('clinicarango'));
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Rango  $rango
   * @return \Illuminate\Http\Response
   */
  public function edit(ClinicaRango $clinicarango) {
    $clinicax = $this->clinicas();
    $estados = Estado::combo();
    $irangoxx = $clinicarango->rango_id;
    $rangoxxx = $this->rango($clinicarango->clinica_id, $irangoxx);
    $update = '';
    return view('clinicarangos.edit', compact('clinicarango', 'estados', 'update', 'clinicax', 'rangoxxx', 'irangoxx'));
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Rango  $clinicarango
   * @return \Illuminate\Http\Response
   */
  public function update(ClinicaRangoUpdateRequest $request, ClinicaRango $clinicarango) {
    // Actualizar la eps
    $clinicarango->update(['clinica_id' => $request->all()['clinica_id'], 'rango_id' => $request->all()['rango_id'], 'estado_id' => $request->all()['estado_id'],
        'usermodi' => auth()->user()->id]);
    return redirect()->route('clinicarangos.edit', $clinicarango->id)
                    ->with('info', 'Clínica Rango actualizado con exito');
  }

  private function rango($clinica_id, $rango_id) {
    $rangoxxx = [];
    $rangosxx = ClinicaRango::where('clinica_id', $clinica_id)->get();
    foreach ($rangosxx as $key => $value) {
      if ($rango_id != $value->rango_id) {
        $rangoxxx[] = $value->rango_id;
      }
    }
    $rangosxx = Rango::whereNotIn('id', $rangoxxx)->get();
    $rangoxxx = [];
    $rangoxxx['']='Seleccione';
    foreach ($rangosxx as $key => $value) {
      $rangoxxx[$value->id] = 'Rango: ' . $value->ranginic . '-' . $value->rangfina;
    }
    return $rangoxxx;
  }

  public function rangoajax(\Illuminate\Http\Request $request) {
    if ($request->ajax()) {
      $dataxxxx = $request->all();
      return response()->json($this->rango($dataxxxx['clinica_id'], $dataxxxx['rango_id']));
    }
  }

}
