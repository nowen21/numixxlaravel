<?php

namespace App\Http\Controllers;

use App\Estado;
use App\Dispmedico;
use App\Dmarca;
use App\Dinvima;
use App\Http\Requests\DinvimaCreateRequest;
use App\Http\Requests\DinvimaUpdateRequest;
use DataTables;

class DinvimaController extends Controller {

  public function index() {
    return view('dinvimas.index');
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create() {
    $estados = Estado::combo();
    $dispmedi = Dispmedico::comboinvima();
    $marcasel =  "''";
    return view('dinvimas.create', compact('estados', 'casa', 'npts','dispmedi','marcasel'));
  }

  public function getdata() {
    $collecti = [];
    $marcas = Dinvima::get();
    foreach ($marcas as $value) {
      $collecti[] = [
          'id' => $value->id,
          'reginvim' => $value->reginvim,
          'nombgene' => $value->dmarca->dispmedico->nombgene,
          'formfarm' => $value->dmarca->formfarm,
          'estadoxx' => $value->estado->nombre,
          'opciones' => ''
      ];
    }
    $collection = collect($collecti);
    return DataTables::of($collection)->toJson();
  }

  public function store(DinvimaCreateRequest $request) {
    $dataxxxx = $request->all();
    $marcaxxx = [
        'reginvim' => $dataxxxx['reginvim'],
        'dmarca_id' => $dataxxxx['dmarca_id'],
        'estado_id' => $dataxxxx['estado_id']
    ];

    $marcagra = Dinvima::create($marcaxxx);
    return redirect()->route('dinvimas.edit', $marcagra->id)
                    ->with('info', 'Registro Invima guardado con éxito');
  }

  public function show(Dinvima $dinvima) {
    return view('dinvimas.show', compact('dinvima'));
  }

  public function edit(Dinvima $dinvima) {
    $dinvima['dispmedico_id'] = $dinvima->dmarca->dispmedico_id;
    $estados = Estado::combo();
    $dispmedi = Dispmedico::comboinvima();
    $update = '';
    $marcasel = $dinvima->dmarca_id;
    return view('dinvimas.edit', compact('dinvima', 'estados', 'update', 'dispmedi','marcasel'));
  }

  public function update(DinvimaUpdateRequest $request, Dinvima $dinvima) {
    $dataxxxx = $request->all();
    $marcaxxx = [
        'reginvim' => $dataxxxx['reginvim'],
        'dmarca_id' => $dataxxxx['dmarca_id'],
        'estado_id' => $dataxxxx['estado_id']
    ];
    $dinvima->update($marcaxxx);
    return redirect()->route('dinvimas.edit', $dinvima->id)
                    ->with('info', 'Registro Invima actualizado con éxito');
  }
public function marcas(\Illuminate\Http\Request $request) {
    if ($request->ajax()) {
      return response()->json(Dmarca::select('id','nombcome','marcaxxx')->where('dispmedico_id', $request->all()['medicame'])->get());
    }
  }
}
