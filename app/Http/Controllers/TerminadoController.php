<?php

namespace App\Http\Controllers;

use App\Http\Requests\TerminadoCrateRequest;
use App\Terminado;
use App\Estado;
use App\Proceso;
use DataTables;
use App\Helpers\Dataformulario;

class TerminadoController extends Controller {

  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index() {
    return view('terminados.index');
  }

  private function peso($procesox) {
    $dataform = new Dataformulario();
    $formulacione = \App\Proceso::where('id', $procesox)->first()->formulacione;
    $calculos = $dataform->calculos( $formulacione);
    return $calculos['pesoteor'];
  }

  public function create() {
    $dataxxxx = [
        'update' => true,
        'procesos' => Proceso::comboterminado(),
        'estadosx' => Estado::combo()
    ];
    return view('terminados.create', compact('dataxxxx'));
  }

  public function getdata() {
    $collecti = [];
    $marcas = Terminado::get();
    foreach ($marcas as $value) {
      $sestadox = true;
      if (date('Y-m-d', time()) != explode(' ', $value->created_at)[0]) {
        $sestadox = false;
      }
      
      $collecti[] = [
          'id' => $value->id,
          'lotexxxx' => $value->proceso->formulacione_id,
          'procesox' => $value->proceso->id,
          'fechaxxx' => explode(' ', $value->created_at)[0],
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
  public function store(TerminadoCrateRequest $request) {
    $role = Terminado::create($this->data($request->all(), 1));
    $role->proceso->update(['listermi' => 1]);
    $role->proceso->formulacione->update(['userlibe' => auth()->user()->id]);
    return redirect()->route('terminados.edit', $role->id)
                    ->with('info', 'Terminado guardado con exito');
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Pacientes  $pacientes
   * @return \Illuminate\Http\Response
   */
  public function show(Terminado $terminado) {
    $dataxxxx = [
        'terminad' => $terminado,
        'update' => false,
        'procesos' => Proceso::comboterminado(),
        'estadosx' => Estado::combo()
    ];
    return view('terminados.show', compact('dataxxxx'));
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Role  $role
   * @return \Illuminate\Http\Response
   */
  public function edit(Terminado $terminado) {
    $dataxxxx = [
        'terminad' => $terminado,
        'update' => false,
        'procesos' => Proceso::comboterminado(),
        'estadosx' => Estado::combo()
    ];
    return view('terminados.edit', compact('dataxxxx'));
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Role  $role
   * @return \Illuminate\Http\Response
   */
  public function update(TerminadoCrateRequest $request, Terminado $terminado) {
    // Actualizar el rol    
    $terminado->update($this->data($request->all(), 1));

    $terminado->proceso->update(['listermi' => 1]);
    $terminado->proceso->formulacione->update(['userlibe' => auth()->user()->id]);
    return redirect()->route('terminados.edit', $terminado->id)
                    ->with('info', 'Terminado actualizado con exito');
  }

  private function data($request, $estadoxx) {
    $nopasaxx = 1;
    if ($request['completo'] == 2 || $request['particul'] == 2 || $request['integrid'] == 2 || $request['contenid'] == 2 || $request['fugasxxx'] == 2 ||
            $request['miscelas'] == 2 || $request['burbujas'] == 2 || $request['document'] == 2 || $request['limitesx'] == 2 || $request['concepto'] == 2) {
      $nopasaxx = 0;
    }
    return [
        'completo' => $request['completo'],
        'particul' => $request['particul'],
        'integrid' => $request['integrid'],
        'contenid' => $request['contenid'],
        'fugasxxx' => $request['fugasxxx'],
        'miscelas' => $request['miscelas'],
        'burbujas' => $request['burbujas'],
        'document' => $request['document'],
        'teoricox' => $request['teoricox'],
        'realxxxx' => $request['realxxxx'],
        'limitesx' => $request['limitesx'],
        'concepto' => $request['concepto'],
        'estado_id' => $request['estado_id'],
        'estaterm' => $estadoxx,
        'nopasaxx' => $nopasaxx,
        'proceso_id' => $request['proceso_id'],
        'user_id' => auth()->user()->id,
    ];
  }
  public function pesoteorico(\Illuminate\Http\Request $request) {
    if ($request->ajax()) {
      return response()->json(['pesoteor'=> $this->peso($request->all()['procesox'])]);
    }
  }

}
