<?php

namespace App\Http\Controllers;
use App\Estado;
use App\Dispmedico;
use App\Http\Requests\DispositivoCreateRequest;
use App\Http\Requests\DispositivoUpdateRequest;
use DataTables;

class DispositivoController extends Controller {

  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index() {
    return view('dispositivos.index');
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create() {
    $estados = Estado::combo();
    return view('dispositivos.create', compact('estados'));
  }

  public function getdata() {
    $collecti = [];
    $medicamentos = Dispmedico::get();
    foreach ($medicamentos as $value) {
      $collecti[] = [
          'id' => $value->id,
          'nombgene' => $value->nombgene,
          'estadoxx' => $value->estado->nombre,
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
  public function store(DispositivoCreateRequest $request) {
    $dataxxxx = $request->all();
    $medicamento = Dispmedico::create([
                'nombgene' => strtoupper($dataxxxx['nombgene']),
                'concentr' => $dataxxxx['concentr'],
                'unidmedi' => $dataxxxx['unidmedi'],
                'estado_id' => $dataxxxx['estado_id'],
    ]);
    return redirect()->route('dispositivos.edit', $medicamento->id)
                    ->with('info', 'Dispositivo médico guardado con exito');
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Pacientes  $pacientes
   * @return \Illuminate\Http\Response
   */
  public function show(Dispmedico $dispmedico) {
    
    return view('dispositivos.show', compact('dispmedico'));
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Pacientes  $users
   * @return \Illuminate\Http\Response
   */
  public function edit(Dispmedico $dispmedico) {
    $estados = Estado::combo();
    $update = '';
    return view('dispositivos.edit', compact('dispmedico', 'estados',  'update'));
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Pacientes  $users
   * @return \Illuminate\Http\Response
   */
  public function update(DispositivoUpdateRequest $request, Dispmedico $dispmedico) {
    // Actualizar la eps
    $dataxxxx = $request->all();

    $dispmedico->update([
        'nombgene' => strtoupper($dataxxxx['nombgene']),
        'concentr' => $dataxxxx['concentr'],
        'unidmedi' => $dataxxxx['unidmedi'],
        'estado_id' => $dataxxxx['estado_id'],
      
    ]);
    return redirect()->route('dispositivos.edit', $dispmedico->id)
                    ->with('info', 'Dispositivo médico actualizado con exito');
  }

}
