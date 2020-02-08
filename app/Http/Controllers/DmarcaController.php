<?php

namespace App\Http\Controllers;

use App\Estado;
use App\Dispmedico;
use App\Dmarca;
use App\Http\Requests\DmarcaCreateRequest;
use App\Http\Requests\DmarcaUpdateRequest;
use DataTables;

class DmarcaController extends Controller {

  public function index() {
    return view('dmarcas.index');
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create() {
    $estados = Estado::combo();
    $dispmedi = Dispmedico::comboinvima();
    return view('dmarcas.create', compact('estados', 'casa', 'npts', 'dispmedi'));
  }

  public function getdata() {
    $collecti = [];
    $marcas = Dmarca::get();
    foreach ($marcas as $value) {

      $collecti[] = [
          'id' => $value->id,
          'nombcome' => $value->nombcome,
          'osmorali' => $value->osmorali,
          'pesoespe' => $value->pesoespe,
          'formfarm' => $value->formfarm,
          'estadoxx' => $value->nombre,
          'opciones' => ''
      ];
    }
    $collection = collect($collecti);
    return DataTables::of($collection)->toJson();
  }

  public function store(DmarcaCreateRequest $request) {
    $dataxxxx = $request->all();
    $marcaxxx = [
        'nombcome' => strtoupper($dataxxxx['nombcome']),
        'formfarm' => strtoupper($dataxxxx['formfarm']),
        'pesoespe' => $dataxxxx['pesoespe'],
        'osmorali' => $dataxxxx['osmorali'],
        'marcaxxx' => $dataxxxx['marcaxxx'],
        'dispmedico_id' => $dataxxxx['dispmedico_id'],
        'estado_id' => $dataxxxx['estado_id']
    ];

    $marcagra = Dmarca::create($marcaxxx);
    return redirect()->route('dmarcas.edit', $marcagra->id)
                    ->with('info', 'Marca guardada con éxito');
  }

  public function show(Dmarca $dmarca) {
    return view('dmarcas.show', compact('dmarca'));
  }

  public function edit(Dmarca $dmarca) {
    $estados = Estado::combo();
    $dispmedi = Dispmedico::comboinvima();
    $update = '';
    return view('dmarcas.edit', compact('dmarca', 'estados', 'update', 'dispmedi'));
  }

  public function update(DmarcaUpdateRequest $request, Dmarca $dmarca) {
    $dataxxxx = $request->all();
    $marcaxxx = [
        'nombcome' => strtoupper($dataxxxx['nombcome']),
        'formfarm' => strtoupper($dataxxxx['formfarm']),
        'pesoespe' => $dataxxxx['pesoespe'],
        'marcaxxx' => $dataxxxx['marcaxxx'],
        'osmorali' => $dataxxxx['osmorali'],
        'dispmedico_id' => $dataxxxx['dispmedico_id'],
        'estado_id' => $dataxxxx['estado_id']
    ];
    $dmarca->update($marcaxxx);
    return redirect()->route('dmarcas.edit', $dmarca->id)
                    ->with('info', 'Marca actualizada con éxito');
  }

}
