<?php

namespace App\Http\Controllers;

use App\Eps;
use App\Estado;
use App\Http\Requests\EpsCreateRequest;
use App\Http\Requests\EpsUpdateRequest;

class EpsController extends Controller {

  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index() {
    return view('eps.index');
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create() {
    $estados = Estado::combo();
    return view('eps.create', compact('estados'));
  }

  public function getdata() {
    $epss = Eps::query();

    return datatables()->eloquent($epss)
                    ->addColumn('estado', function ($epss) {
                      $sestadox = 'INACTIVO';
                      if ($epss->estado == 1) {
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
  public function store(EpsCreateRequest $request) {
    $eps = Eps::create(['nombre' => strtoupper($request->all()['nombre']),
                'estado' => $request->all()['estado']]);
    return redirect()->route('eps.edit', $eps->id)
                    ->with('info', 'Eps guardada con exito');
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Pacientes  $pacientes
   * @return \Illuminate\Http\Response
   */
  public function show(Eps $eps) {
    $estado = Estado::find($eps->estado)->nombre;
    return view('eps.show', compact('eps', 'estado'));
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Pacientes  $users
   * @return \Illuminate\Http\Response
   */
  public function edit(Eps $eps) {
    $estados = Estado::combo();
    $update = '';
    return view('eps.edit', compact('eps', 'estados', 'update'));
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Pacientes  $users
   * @return \Illuminate\Http\Response
   */
  public function update(EpsUpdateRequest $request, Eps $eps) {
    // Actualizar la eps
    $eps->update(['nombre' => strtoupper($request->all()['nombre']),
        'estado' => $request->all()['estado']]);
    // Actualizar los roles
    return redirect()->route('eps.edit', $eps->id)
                    ->with('info', 'Eps actualizada con exito');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Pacientes  $pacientes
   * @return \Illuminate\Http\Response
   */
  public function destroy(Eps $eps) {
    $eps->delete();
    return back()->with('info', 'Eliminado correctamente');
  }

}
