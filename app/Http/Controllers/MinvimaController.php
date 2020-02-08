<?php

namespace App\Http\Controllers;

use App\Estado;
use App\Medicamento;
use App\Marca;
use App\Minvima;
use App\Http\Requests\MinvimaCreateRequest;
use App\Http\Requests\MinvimaUpdateRequest;
use DataTables;

class MinvimaController extends Controller {

  public function index() {
    return view('invimas.index');
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create() {
    $marcaxxx = Marca::combo();
    $medicame = Medicamento::combomarca();
    $estados = Estado::combo();
    $marcasel =  "''";
    return view('invimas.create', compact('estados', 'casa', 'npts', 'marcaxxx', 'medicame', 'marcasel'));
  }

  public function getdata() {
    $collecti = [];
    $marcas = Minvima::
            select('minvimas.id','minvimas.reginvim','marcas.formfarm','medicamentos.nombgene','npts.nombre as nptnombr','estados.nombre' )
             ->join('estados', 'minvimas.estado_id', '=', 'estados.id')
             ->join('marcas', 'minvimas.marca_id', '=', 'marcas.id')
             ->join('medicamentos', 'marcas.medicamento_id', '=', 'medicamentos.id')
             ->join('medicamento_npt', 'medicamentos.id', '=', 'medicamento_npt.medicamento_id')
             ->join('casa_medicamento', 'medicamentos.id', '=', 'casa_medicamento.medicamento_id')
             ->join('casas', 'casa_medicamento.casa_id', '=', 'casas.id')
             ->join('npts', 'medicamento_npt.npt_id', '=', 'npts.id')
            ->where('casas.estado', 1)
            ->where('casa_medicamento.estadoxx', 'A')
            ->where('medicamento_npt.estado_id', 1)
            ->where('medicamentos.estado_id', 1)
            ->where('marcas.estado_id', 1)
            ->get();
    
    
    
    foreach ($marcas as $value) {

      $collecti[] = [
          'id' => $value->id,
          'reginvim' => $value->reginvim,
          'nombgene' => $value->nombgene,
          'formfarm' => $value->formfarm,
          'estadoxx' => $value->nombre,
          'nptnombr' => $value->nptnombr,
          'opciones' => ''
      ];
    }
    $collection = collect($collecti);
    return DataTables::of($collection)->toJson();
  }

  public function store(MinvimaCreateRequest $request) {
    $dataxxxx = $request->all();
    $marcaxxx = [
        'reginvim' => $dataxxxx['reginvim'],
        'marca_id' => $dataxxxx['marca_id'],
        'estado_id' => $dataxxxx['estado_id']
    ];

    $marcagra = Minvima::create($marcaxxx);
    return redirect()->route('invimas.edit', $marcagra->id)
                    ->with('info', 'Registro Invima guardado con éxito');
  }

  public function show(Minvima $minvima) {
    return view('invimas.show', compact('minvima'));
  }

  public function edit(Minvima $minvima) {
    $minvima['medicamento_id'] = $minvima->marca->medicamento_id;
    $estados = Estado::combo();
    $marcaxxx = Marca::combo();
    $marcasel = $minvima->marca_id;
    $medicame = Medicamento::combomarca();
    $update = '';
    return view('invimas.edit', compact('minvima', 'estados', 'update', 'marcaxxx', 'medicame', 'marcasel'));
  }

  public function update(MinvimaUpdateRequest $request, Minvima $minvima) {
    $dataxxxx = $request->all();
    $marcaxxx = [
        'reginvim' => $dataxxxx['reginvim'],
        'marca_id' => $dataxxxx['marca_id'],
        'estado_id' => $dataxxxx['estado_id']
    ];
    $minvima->update($marcaxxx);
    return redirect()->route('invimas.edit', $minvima->id)
                    ->with('info', 'Registro Invima actualizado con éxito');
  }

  public function marcas(\Illuminate\Http\Request $request) {
    if ($request->ajax()) {
      return response()->json(Marca::select('id','nombcome','marcaxxx')->where('medicamento_id', $request->all()['medicame'])->get());
    }
  }

}
