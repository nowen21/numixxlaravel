<?php

namespace App\Http\Controllers;

use App\Remisione;
use App\Estado;
use App\Ordene;
use App\ClinicaRango;
use DataTables;
use App\Http\Requests\RemisioneCreateRequest as rcr;
use App\Http\Requests\RemisioneUpdateRequest as rur;

class RemisioneController extends Controller {

  private $ordeprod;

  public function index() {
    return view('remisiones.index');
  }

  public function __construct() {
    $this->ordeprod = \App\Ordene::ordendia();
  }

  private function remisiones($clini_id) {
    $remision = [];
    foreach (Remisione::where('ordeprod', $this->ordeprod)->get() as $value) {
      if ($clini_id != $value->clinica_rango->clinica->id) {
        $remision[] = $value->clinica_rango->clinica->id;
      }
    }
    $remision[] = 1;
    return $remision;
  }

  private function clinicas($clini_id) {
    $clinicas = [];
    $clinicas[''] = 'Seleccione';
    foreach (\App\Clinica::whereNotIn('id', $this->remisiones($clini_id))->get() as $value) {
      $clinicas[$value->id] = $value->nombre;
    }
    return $clinicas;
  }

  public function create() {
    $clinicax = $this->clinicas(0);
    $rangoxxx[''] = 'Seleccione';
    $estadosx = Estado::combo();
    return view('remisiones.create', compact('clinicax', 'rangoxxx', 'estadosx'));
  }

  public function store(rcr $request) {
    $dataxxxx = $request->all();
    $marcaxxx = [
        'clinica_rango_id' => $dataxxxx['clinica_rango_id'],
        'usercrea' => auth()->user()->id,
        'usermodi' => auth()->user()->id,
        'ordeprod' => $this->ordeprod,
        'estado_id' => $dataxxxx['estado_id']
    ];
    
    $rangoxxx = ClinicaRango::where('id', $dataxxxx['clinica_rango_id'])->first();
    $formulac = \App\Formulacione::where('ordeprod', Ordene::ordendia())->where('clinica_id', $rangoxxx->clinica_id)->get();
    if (count($formulac) == 0) {
      return redirect()->route('remisiones.index')
                      ->with('info', 'El cliente: ' . $rangoxxx->clinica->nombre . ' no tiene formulaciones aun');
    } else {
      $remision = Remisione::create($marcaxxx);
      return redirect()->route('remisiones.edit', $remision->id)
                      ->with('info', 'Formulación guardada con exito');
    }
  }

  public function getdata() {
    $collecti = [];
    $formulac = Remisione::orderBy('updated_at')->get();
    foreach ($formulac as $rangoxxx) {
      $collecti[] = [
          'id' => $rangoxxx->id,
          'clini_id' => $rangoxxx->clinica_rango->clinica_id,
          'clinicax' => $rangoxxx->clinica_rango->clinica->nombre,
          'rangoxxx' => $rangoxxx->clinica_rango->rango->ranginic . ' ' . $rangoxxx->clinica_rango->rango->rangfina,
          'estad_id' => $rangoxxx->estado->nombre,
          'opciones' => ''
      ];
    }
    $collection = collect($collecti);
    return DataTables::of($collection)->toJson();
  }

  public function show(Remisione $remisione) {
    return view('remisiones.show', compact('remisione'));
  }

  public function edit(Remisione $remisione) {
    $remisione['clinica_id'] = $remisione->clinica_rango->clinica_id;
    $clinicax = $this->clinicas($remisione['clinica_id']);
    $rangoxxx[''] = $this->rango($remisione['clinica_id']);

    $estadosx = Estado::combo();
    return view('remisiones.edit', compact('clinicax', 'rangoxxx', 'estadosx', 'remisione'));
  }

  public function update(rur $request, Remisione $remisione) {
    $dataxxxx = $request->all();
    $marcaxxx = [
        'clinica_rango_id' => $dataxxxx['clinica_rango_id'],
        'usermodi' => auth()->user()->id,
        'ordeprod' => $this->ordeprod,
        'estado_id' => $dataxxxx['estado_id']
    ];

    $remisione->update($marcaxxx);
    return redirect()->route('remisiones.edit', $remisione->id)
                    ->with('info', 'Formulacion: ' . $remisione->id . ' actualizada con exito');
  }

  private function rango($clinica_id) {
    $rangoxxx = [];
    $rangoxxx[''] = 'Seleccione';
    foreach (ClinicaRango::where('clinica_id', $clinica_id)->get() as $key => $value) {
      $rangoxxx[$value->id] = 'Rango: ' . $value->rango->ranginic . '-' . $value->rango->rangfina;
    }
    return $rangoxxx;
  }

  public function rangoajax(\Illuminate\Http\Request $request) {
    if ($request->ajax()) {
      $dataxxxx = $request->all();
      return response()->json($this->rango($dataxxxx['clinica_id']));
    }
  }

}
