<?php

namespace App\Http\Controllers;

use App\Estado;
use App\Minvima;
use App\Medicamento;
use App\Mlote;
use App\Marca;
use App\Http\Requests\MloteCreateRequest;
use App\Http\Requests\MloteUpdateRequest;
use DataTables;

class MloteController extends Controller {

  public function index() {
    return view('lotes.index');
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create() {
    $estados = Estado::combo();
    $invimaxx = Minvima::combo();
    $medicame = Medicamento::combomarca();
    $marcaxxx = $this->getMarca(0);
    $invimasx = $this->getInvimas(0);
    $marcasel = "''";
    $invimsel = "''";
    return view('lotes.create', compact('estados', 'casa', 'npts', 'invimaxx', 'medicame', 'marcasel', 'invimsel','marcaxxx','invimasx'));
  }

  public function getdata() {
    $collecti = [];
    $marcas = Mlote::
            select('mlotes.id', 'mlotes.lotexxxx', 'mlotes.fechvenc', 'mlotes.inventar', 'minvimas.reginvim', 'marcas.formfarm', 'medicamentos.nombgene', 'npts.nombre as nptnombr', 'estados.nombre')
            ->join('minvimas', 'mlotes.minvima_id', '=', 'minvimas.id')
            ->join('estados', 'mlotes.estado_id', '=', 'estados.id')
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
            ->where('minvimas.estado_id', 1)
            ->get();
    foreach ($marcas as $value) {
      $collecti[] = [
          'id' => $value->id,
          'lotexxxx' => $value->lotexxxx,
          'fechvenc' => $value->fechvenc,
          'inventar' => $value->inventar,
          'reginvim' => $value->reginvim,
          'nombgene' => $value->nombgene,
          'formfarm' => $value->formfarm,
          'nptnombr' => $value->nptnombr,
          'estadoxx' => $value->nombre,
          'opciones' => ''
      ];
    }
    $collection = collect($collecti);
    return DataTables::of($collection)->toJson();
  }

  public function store(MloteCreateRequest $request) {
    $dataxxxx = $request->all();
    $mlotexxx = [
        'fechvenc' => $dataxxxx['fechvenc'],
        'minvima_id' => $dataxxxx['minvima_id'],
        'inventar' => $dataxxxx['inventar'],
        'lotexxxx' => $dataxxxx['lotexxxx'],
        'usercrea' => auth()->user()->id,
        'userupda' => auth()->user()->id,
        'estado_id' => $dataxxxx['estado_id']
    ];

    $marcagra = Mlote::create($mlotexxx);
    return redirect()->route('lotes.edit', $marcagra->id)
                    ->with('info', 'Lote guardado con éxito');
  }

  public function show(Mlote $mlote) {
    return view('lotes.show', compact('mlote'));
  }

  public function edit(Mlote $mlote) {
    $mlote['medicamento_id'] = $mlote->minvima->marca->medicamento_id;
    $mlote['marca_id'] = $mlote->minvima->marca_id;
    $marcaxxx = $this->getMarca($mlote['medicamento_id']);
    $invimasx = $this->getInvimas($mlote['marca_id']);
    $estados = Estado::combo();
    $invimaxx = Minvima::combo();
    $update = '';
    $marcasel = $mlote->minvima->marca_id;
    $invimsel = $mlote->minvima_id;
    $medicame = Medicamento::combomarca();
    return view('lotes.edit', compact('mlote', 'estados', 'update', 'invimaxx', 'medicame', 'marcasel', 'invimsel', 'marcaxxx','invimasx'));
  }

  public function update(MloteUpdateRequest $request, Mlote $mlote) {
    $dataxxxx = $request->all();
    $mlotexxx = [
        'fechvenc' => $dataxxxx['fechvenc'],
        'minvima_id' => $dataxxxx['minvima_id'],
        'inventar' => $dataxxxx['inventar'],
        'lotexxxx' => $dataxxxx['lotexxxx'],
        'userupda' => auth()->user()->id,
        'estado_id' => $dataxxxx['estado_id']
    ];
    $mlote->update($mlotexxx);
    return redirect()->route('lotes.edit', $mlote->id)
                    ->with('info', 'Lote actualizado con éxito');
  }

  private function getMarca($medicame) {
    $marcasxx = ['' => 'Seleccione'];
    foreach (Marca::select('id', 'nombcome', 'marcaxxx')->where('medicamento_id', $medicame)->get() as $marcaxxx) {
      $marcasxx[$marcaxxx->id] = $marcaxxx->nombcome . ' (' . $marcaxxx->nombcome . ')';
    }
    return $marcasxx;
  }

  private function getInvimas($marcasxx) {
    $invimasx = ['' => 'Seleccione'];
    foreach (Minvima::select('id', 'reginvim')->where('marca_id', $marcasxx)->get() as $value) {
      $invimasx[$value->id] = $value->reginvim;
    }
    return $invimasx;
  }

  public function invimas(\Illuminate\Http\Request $request) {
    if ($request->ajax()) {
      return response()->json(Minvima::select('id', 'reginvim')->where('marca_id', $request->all()['medicame'])->get());
    }
  }

}
