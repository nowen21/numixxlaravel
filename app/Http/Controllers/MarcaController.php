<?php

namespace App\Http\Controllers;

use App\Estado;
use App\Marca;
use App\Medicamento;
use App\Http\Requests\MarcaCreateRequest;
use App\Http\Requests\MarcaUpdateRequest;
use DataTables;

class MarcaController extends Controller {

  public function index() {
    return view('marcas.index');
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create() {
    $estados = Estado::combo();
    $medicame = Medicamento::combomarca();
    return view('marcas.create', compact('estados', 'casa', 'npts', 'medicame'));
  }

  public function getdata() {
    $collecti = [];
    $marcas = Marca::
            select('marcas.id', 'marcas.nombcome', 'marcas.osmorali', 'marcas.marcaxxx', 'marcas.pesoespe', 'marcas.formfarm', 'medicamentos.nombgene', 'npts.nombre as nptnombr', 'estados.nombre')
            ->join('estados', 'marcas.estado_id', '=', 'estados.id')
            ->join('medicamentos', 'marcas.medicamento_id', '=', 'medicamentos.id')
            ->join('medicamento_npt', 'medicamentos.id', '=', 'medicamento_npt.medicamento_id')
            ->join('casa_medicamento', 'medicamentos.id', '=', 'casa_medicamento.medicamento_id')
            ->join('casas', 'casa_medicamento.casa_id', '=', 'casas.id')
            ->join('npts', 'medicamento_npt.npt_id', '=', 'npts.id')
            ->where('casas.estado', 1)
            ->where('casa_medicamento.estadoxx', 'A')
            ->where('medicamento_npt.estado_id', 1)
            ->where('medicamentos.estado_id', 1)            
            ->get();
    foreach ($marcas as $value) {

      $collecti[] = [
          'id' => $value->id,
          'nombgene' => $value->nombgene,
          'nombcome' => $value->nombcome,
          'osmorali' => $value->osmorali,
          'marcaxxx' => $value->marcaxxx,
          'pesoespe' => $value->pesoespe,
          'formfarm' => $value->formfarm,
          'nptnombr' => $value->nptnombr,
          'estadoxx' => $value->nombre,
          'opciones' => ''
      ];
    }
    $collection = collect($collecti);
    return DataTables::of($collection)->toJson();
  }

  public function store(MarcaCreateRequest $request) {
    $dataxxxx = $request->all();
    $marcaxxx = [
        'nombcome' => strtoupper($dataxxxx['nombcome']),
        'formfarm' => strtoupper($dataxxxx['formfarm']),
        'pesoespe' => $dataxxxx['pesoespe'],
        'marcaxxx' => $dataxxxx['marcaxxx'],
        'medicamento_id' => $dataxxxx['medicamento_id'],
        'osmorali' => $dataxxxx['osmorali'],
        'estado_id' => $dataxxxx['estado_id']
    ];

    $marcagra = Marca::create($marcaxxx);
    return redirect()->route('marcas.edit', $marcagra->id)
                    ->with('info', 'Marca guardada con éxito');
  }

  public function show(Marca $marca) {
    $estadoxx = Estado::where('id', $marca->estado_id)->first()->nombre;
    return view('marcas.show', compact('marca', 'estadoxx', 'update'));
  }

  public function edit(Marca $marca) {
    $estados = Estado::combo();
    $medicame = Medicamento::combomarca();
    $update = '';
    return view('marcas.edit', compact('marca', 'estados', 'update', 'medicame'));
  }

  public function update(MarcaUpdateRequest $request, Marca $marca) {
    $dataxxxx = $request->all();
    $marcaxxx = [
        'nombcome' => strtoupper($dataxxxx['nombcome']),
        'formfarm' => strtoupper($dataxxxx['formfarm']),
        'pesoespe' => $dataxxxx['pesoespe'],
        'marcaxxx' => $dataxxxx['marcaxxx'],
        'medicamento_id' => $dataxxxx['medicamento_id'],
        'osmorali' => $dataxxxx['osmorali'],
        'estado_id' => $dataxxxx['estado_id']
    ];
    $marca->update($marcaxxx);
    return redirect()->route('marcas.edit', $marca->id)
                    ->with('info', 'Marca actualizada con éxito');
  }

}
