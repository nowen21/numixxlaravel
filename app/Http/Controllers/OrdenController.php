<?php

namespace App\Http\Controllers;
use App\Http\Requests\OrdenesCreateRequest;
use App\Ordene;
use DataTables;

class OrdenController extends Controller {

  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index() {
    return view('ordenes.index');
  }

  public function getdata() {

    $collecti = [];
    $marcas = Ordene::get();
    foreach ($marcas as $value) {
      $sestadox = true;
      if (date('Y-m-d', time()) != explode(' ', $value->created_at)[0]) {
        $sestadox = false;
      }
      $collecti[] = [
          'id' => $value->id,
          'ordeprod' => $value->ordeprod,
          'fechcrea' => explode(' ', $value->created_at)[0],
          'actualiz' => $sestadox,
          'opciones' => ''
      ];
    }
    $collection = collect($collecti);
    return DataTables::of($collection)->toJson();
  }

  public function edit(Ordene $ordene) {
    return view('ordenes.edit', compact('ordene'));
  }

  public function update(OrdenesCreateRequest $request, Ordene $ordene) {
    $ordene->update(['observac' => $request->all()['observac']]);
    return redirect()->route('ordenes.edit', $ordene->id)
                    ->with('info', 'Orden actualizada con éxito');
  }

  public function show(Ordene $ordene) {
    return view('ordenes.show', compact('ordene'));
  }

}
