<?php

namespace App\Http\Controllers;

use App\Rango;
use App\Estado;
use App\Http\Requests\RangoCreateRequest;
use App\Http\Requests\RangoUpdateRequest;
use DataTables;

class RangoController extends Controller {

  public function index() {
    return view('rangos.index');
  }

  public function create() {
    $estados = Estado::combo();
    return view('rangos.create', compact('estados'));
  }

  public function getdata() {
    $collecti = [];
    $rangosxx = Rango::all();
    foreach ($rangosxx as $rangoxxx) {
      $collecti[] = [
          'id' => $rangoxxx->id,
          'ranginic' => $rangoxxx->ranginic,
          'rangfina' => $rangoxxx->rangfina,
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
  public function store(RangoCreateRequest $request) {
    $rangoxxx = Rango::create(['ranginic' => $request->all()['ranginic'], 'rangfina' => $request->all()['rangfina'],'estado_id' => $request->all()['estado_id'],
                'usercrea' => auth()->user()->id, 'usermodi' => auth()->user()->id]);
    return redirect()->route('rangos.edit', $rangoxxx->id)
                    ->with('info', 'Rango guardado con exito');
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Rango  $rango
   * @return \Illuminate\Http\Response
   */
  public function show(Rango $rango) {
    return view('rangos.show', compact('rango'));
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Rango  $rango
   * @return \Illuminate\Http\Response
   */
  public function edit(Rango $rango) {
    $estados = Estado::combo();
    $update = '';
    return view('rangos.edit', compact('rango', 'estados', 'update'));
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Rango  $rango
   * @return \Illuminate\Http\Response
   */
  public function update(RangoUpdateRequest $request, Rango $rango) {
    // Actualizar la eps
    $rango->update(['ranginic' => $request->all()['ranginic'], 'rangfina' => $request->all()['rangfina'],'estado_id' => $request->all()['estado_id'],
        'usermodi' => auth()->user()->id]);
    return redirect()->route('rangos.edit', $rango->id)
                    ->with('info', 'Rango actualizado con exito');
  }

}
