<?php

namespace App\Http\Controllers;

use App\Estado;
use App\Casa;
use App\Http\Requests\CasaCreateRequest;
use App\Http\Requests\CasaUpdateRequest;
use DataTables;
class CasaController extends Controller {

  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index() {
    return view('casas.index');
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  private function orden($newoldxx) {
    $odencasa = [];
    if ($newoldxx) {
      $odencasa = ['SI' => 'POSICIÓN NUEVA'];
    }
    $totacasa = Casa::all();
    for ($key = 1; $key <= count($totacasa); $key++) {
      $odencasa[$key] = 'POSICIÓN ' . $key;
    }
    return $odencasa;
  }

  public function create() {
    $estadosx = Estado::combo();
    $ordenxxx = $this->orden(true);
    return view('casas.create', compact('estadosx', 'ordenxxx'));
  }

  public function getdata() {
    $collecti = [];
    $marcas = Casa::select('casas.id','casas.nombre as nombcasa','casas.nameidxx','casas.ordecasa','estados.nombre')
            ->join('estados','casas.estado','=','estados.id')
            ->get();
    foreach ($marcas as $value) {
      $collecti[] = [
          'id' => $value->id,
          'nombre' => $value->nombcasa,
          'nameidxx' => $value->nameidxx,
          'ordecasa' => 'Posición ' . $value->ordecasa,
          'estadoid' =>  $value->nombre,
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
  private function asignaorden($ordecasa, $pcasaxxx, $newoldxx) {
    $casasxxx = Casa::all(); 
    foreach ($casasxxx as $value) {
      $casaxxxx = Casa::where('id', $value->id)->first();
      if ($newoldxx) { // se esta editando  
        if ($pcasaxxx->ordecasa < $value->ordecasa && $value->ordecasa<=$ordecasa) {// pasar de una posicion menor a una mayor
          $casaxxxx->update(['ordecasa' => $value->ordecasa - 1]);
        } else if($pcasaxxx->ordecasa > $value->ordecasa && $value->ordecasa>=$ordecasa) {// pasar de una posicion mayor a una menor
          $casaxxxx->update(['ordecasa' => $value->ordecasa + 1]);
        }
      } else if($value->ordecasa>=$ordecasa){// es nuevo
        $casaxxxx->update(['ordecasa' => $value->ordecasa + 1]);
      }
    }
  }

  public function store(CasaCreateRequest $request) {
    $dataxxxx = $request->all();
    $maximoxx = Casa::max('ordecasa');
    if ($dataxxxx['ordecasa'] == 'SI') {
      $dataxxxx['ordecasa'] = $maximoxx + 1;
    } else {
      $this->asignaorden($dataxxxx['ordecasa'], '', false);
    }
    $casa = Casa::create([
                'nombre' => strtoupper($dataxxxx['nombre']),
                'estado' => $dataxxxx['estado'],
                'nameidxx' => strtolower($dataxxxx['nameidxx']),
                'ordecasa' => $dataxxxx['ordecasa']
    ]);
    return redirect()->route('casas.edit', $casa->id)
                    ->with('info', 'Casa creada con exito');
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Pacientes  $pacientes
   * @return \Illuminate\Http\Response
   */
  public function show(Casa $casa) {
    $estado = Estado::find($casa->estado)->nombre;
    return view('casas.show', compact('casa', 'estado'));
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Pacientes  $users
   * @return \Illuminate\Http\Response
   */
  public function edit(Casa $casa) {
    $estadosx = Estado::combo();
    $ordenxxx = $this->orden(false);
    $update = '';
    return view('casas.edit', compact('casa', 'estadosx', 'update', 'ordenxxx'));
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Pacientes  $users
   * @return \Illuminate\Http\Response
   */
  public function update(CasaUpdateRequest $request, Casa $casa) {
    // Actualizar la eps
    $this->asignaorden($request->all()['ordecasa'], $casa, true);
    $casa->update([
        'nombre' => strtoupper($request->all()['nombre']),
        'estado' => $request->all()['estado'],
        'ordecasa' => $request->all()['ordecasa']
    ]);
    // Actualizar los roles
    return redirect()->route('casas.edit', $casa->id)
                   ->with('info', 'Casa actualizada con exito');
  }

}
