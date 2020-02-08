<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProcesoCrateRequest;
use App\Formulacione as formu;
use App\Estado;
use App\Proceso;
use DataTables;

class ProcesoController extends Controller {

  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index() {
    return view('procesos.index');
  }

  public function create() {
    $dataxxxx = [
        'update' => true,
        'lotesxxx' => formu::combolote(),
        'estadosx' => Estado::combo()
    ];
    return view('procesos.create', compact('dataxxxx'));
  }

  public function getdata() {
    $collecti = [];
    $marcas = Proceso::get();
    foreach ($marcas as $value) {
      $sestadox = true;
      if (date('Y-m-d', time()) != explode(' ', $value->created_at)[0]) {
        $sestadox = false;
      }

      $collecti[] = [
          'id' => $value->id,
          'lotexxxx' => $value->formulacione_id,
          'created_at' => explode(' ', $value->created_at)[0],
          'updated_at' => explode(' ', $value->updated_at)[0],
          'actualiz' => $sestadox,
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
  public function store(ProcesoCrateRequest $request) {
    $role = Proceso::create($this->data($request->all(), 1));
    $role->formulacione->update(['userproc'=>auth()->user()->id]);
    return redirect()->route('procesos.edit', $role->id)
                    ->with('info', 'Proceso guardado con exito');
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Pacientes  $pacientes
   * @return \Illuminate\Http\Response
   */
  public function show(Proceso $proceso) {
    $dataxxxx = [
        'proceso' => $proceso,
        'update' => false,
        'lotesxxx' => formu::combolote(),
        'estadosx' => Estado::combo()
    ];
    return view('procesos.show', compact('dataxxxx'));
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Role  $role
   * @return \Illuminate\Http\Response
   */
  public function edit(Proceso $proceso) {
    $dataxxxx = [
        'proceso' => $proceso,
        'update' => false,
        'lotesxxx' => formu::combolote(),
        'estadosx' => Estado::combo()
    ];
    return view('procesos.edit', compact('dataxxxx'));
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Role  $role
   * @return \Illuminate\Http\Response
   */
  public function update(ProcesoCrateRequest $request, Proceso $proceso) {
    $proceso->update($this->data($request->all(), 1)); 
    $proceso->formulacione->update(['userproc'=>auth()->user()->id]);
    return redirect()->route('procesos.edit', $proceso->id)
                    ->with('info', 'Proceso actualizado con exito');
  }

  private function data($request, $estadoxx) {
    $nopasaxx = 1;
    if ($request['coloraci']==2 || $request['ausepart']==2 || $request['ausefuga']==2 || $request['ausemise']==2) { 
      $nopasaxx = 0;
    }
    return [
        'coloraci' => $request['coloraci'],
        'ausepart' => $request['ausepart'],
        'ausefuga' => $request['ausefuga'],
        'ausemise' => $request['ausemise'],
        'estado_id' => $request['estado_id'],
        'formulacione_id' => $request['formulacione_id'],
        'estaproc' => $estadoxx,
        'nopasaxx' => $nopasaxx,
        'user_id' => auth()->user()->id];
  }

}
