<?php

namespace App\Http\Controllers;

use App\Estado;
use App\Dinvima;
use App\Dispmedico;
use App\Dlote;
use App\Http\Requests\DloteCreateRequest;
use App\Http\Requests\DloteUpdateRequest;
use DataTables;

class DloteController extends Controller {

  public function index() {
    return view('dlotes.index');
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create() {
    $estados = Estado::combo();
    $medicame = Dispmedico::comboinvima();
    $marcasel = "''";
    $invimsel = "''";
    return view('dlotes.create', compact('estados', 'casa', 'npts', 'medicame', 'marcasel', 'invimsel'));
  }

  public function getdata() {
    $collecti = [];
    $marcas = Dlote::get();
    foreach ($marcas as $value) {
      $collecti[] = [
          'id' => $value->id,
          'lotexxxx' => $value->lotexxxx,
          'fechvenc' => $value->fechvenc,
          'inventar' => $value->inventar,
          'reginvim' => $value->dinvima->reginvim,
          'nombgene' => $value->dinvima->dmarca->dispmedico->nombgene,
          'formfarm' => $value->dinvima->dmarca->formfarm,
          'estadoxx' => $value->estado->nombre,
          'opciones' => ''
      ];
    }
    $collection = collect($collecti);
    return DataTables::of($collection)->toJson();
  }

  public function store(DloteCreateRequest $request) {
    $dataxxxx = $request->all();
    $mlotexxx = [
        'fechvenc' => $dataxxxx['fechvenc'],
        'dinvima_id' => $dataxxxx['dinvima_id'],
        'inventar' => $dataxxxx['inventar'],
        'lotexxxx' => $dataxxxx['lotexxxx'],
        'estado_id' => $dataxxxx['estado_id']
    ];

    $marcagra = Dlote::create($mlotexxx);
    return redirect()->route('dlotes.edit', $marcagra->id)
                    ->with('info', 'Lote guardado con éxito');
  }

  public function show(Dlote $dlote) {
    $estadoxx = Estado::where('id', $dlote->estado_id)->first()->nombre;
    $invimaxx = Dinvima::where('id', $dlote->dinvima_id)->first();
    return view('dlotes.show', compact('dlote', 'estadoxx', 'update', 'invimaxx'));
  }

  public function edit(Dlote $dlote) {
    $dlote['dispmedico_id'] = $dlote->dinvima->dmarca->dispmedico_id;
    $estados = Estado::combo();
    $update = '';
    $medicame = Dispmedico::comboinvima();
    $marcasel = $dlote->dinvima->dmarca_id;
    $invimsel = $dlote->dinvima_id;
    return view('dlotes.edit', compact('dlote', 'estados', 'update', 'invimaxx', 'medicame', 'marcasel', 'invimsel'));
  }

  public function update(DloteUpdateRequest $request, Dlote $dlote) {
    $dataxxxx = $request->all();
    $mlotexxx = [
        'fechvenc' => $dataxxxx['fechvenc'],
        'dinvima_id' => $dataxxxx['dinvima_id'],
        'inventar' => $dataxxxx['inventar'],
        'lotexxxx' => $dataxxxx['lotexxxx'],
        'estado_id' => $dataxxxx['estado_id']
    ];
    $dlote->update($mlotexxx);
    return redirect()->route('dlotes.edit', $dlote->id)
                    ->with('info', 'Lote actualizado con éxito');
  }

  public function invimas(\Illuminate\Http\Request $request) {
    if ($request->ajax()) {
      return response()->json(Dinvima::select('id', 'reginvim')->where('dmarca_id', $request->all()['medicame'])->get());
    }
  }

}
