<?php

namespace App\Http\Controllers;

use App\Casa;
use App\Estado;
use App\Npt;
use App\Clinica;
use App\Medicamento;
use App\Http\Requests\MedicamentoCreateRequest;
use App\Http\Requests\MedicamentoUpdateRequest;
use DataTables;

class MedicamentoController extends Controller {

  public function index() {
    return view('medicamentos.index');
  }

  private function clinicas() {
    $clinicas = [];
    foreach (Clinica::all() as $key => $value) {
      $clinicas[$value->id] = $value->nombre;
    }
    return $clinicas;
  }
  private function clinica($idclinic) {
    return Clinica::find($idclinic)->nombre;
  }

  public function create() {
    $clinicas = $this->clinicas();
    $casasxxx = Casa::casascombo();
    $nptsxxxx = Npt::all();
    $estados = Estado::combo();
    return view('medicamentos.create', compact('estados', 'casasxxx', 'nptsxxxx','clinicas'));
  }

  public function getdata() {
    $medicamentos = Medicamento::
            select('medicamentos.id', 'medicamentos.nombgene', 'npts.nombre as nptnombr', 'estados.nombre')
            ->join('estados', 'medicamentos.estado_id', '=', 'estados.id')
            ->join('casas', 'medicamentos.casa_id', '=', 'casas.id')
            ->join('medicamento_npt', 'medicamentos.id', '=', 'medicamento_npt.medicamento_id')
            ->join('npts', 'medicamento_npt.npt_id', '=', 'npts.id')
            ->where('casas.estado', 1)
            ->groupBy('medicamentos.id')
            ->get();
    $collecti = [];
    foreach ($medicamentos as $value) {
      $collecti[] = [
          'id' => $value->id,
          'nombgene' => $value->nombgene,
          'estadoxx' => $value->nombre,
          'opciones' => ''
      ];
    }
    $collection = collect($collecti);
    return DataTables::of($collection)->toJson();
  }

  public function store(MedicamentoCreateRequest $request) {
    $dataxxxx = $request->all();
    $medicame = [
        'nombgene' => strtoupper($dataxxxx['nombgene']),
        'concentr' => $dataxxxx['concentr'],
        'unidmedi' => $dataxxxx['unidmedi'],
        'estado_id' => $dataxxxx['estado_id'],
        'casa_id' => $dataxxxx['casa_id'],
        'clinica_id' => $dataxxxx['clinica_id'],
    ];
    $medicamento = Medicamento::create($medicame);
    $this->syncnptycasa($medicamento, $request);
    return redirect()->route('medicamentos.edit', $medicamento->id)
                    ->with('info', 'Medicamento guardado con éxito');
  }

  public function show(Medicamento $medicamento) {
    return view('medicamentos.show', compact('medicamento'));
  }

  private function casas($mediceme) {
    $nptidxxx = [];
    if (count($mediceme->casa_medicamento) > 0) {
      foreach ($mediceme->casa_medicamento as $value) {
        if ($value->estadoxx == 'A') {
          $nptidxxx[] = $value->casa_id;
        }
      }
    }
    return $nptidxxx;
  }

  public function edit(Medicamento $medicamento) {
    $casasxxx = Casa::casascombo();
    $nptsxxxx = Npt::all();
    $estados = Estado::combo();
    $update = '';
    $clinicas = $this->clinicas();
    return view('medicamentos.edit', compact('medicamento', 'estados', 'casasxxx', 'update', 'nptsxxxx','clinicas'));
  }

  private function syncnptycasa($medicamento, $request) {
    $syncxxxx = [];
    foreach ($request->get('npts') as $value) {
      $syncxxxx[$value] = ['estado_id' => 1];
    }
    $medicamento->npts()->sync($syncxxxx);
  }

  public function update(MedicamentoUpdateRequest $request, Medicamento $medicamento) {
    $dataxxxx = $request->all();
    $medicamento->update([
        'nombgene' => strtoupper($dataxxxx['nombgene']),
        'concentr' => $dataxxxx['concentr'],
        'unidmedi' => $dataxxxx['unidmedi'],
        'estado_id' => $dataxxxx['estado_id'],
        'casa_id' => $dataxxxx['casa_id'],
        'clinica_id' => $dataxxxx['clinica_id'],
    ]);
    $this->syncnptycasa($medicamento, $request);
    return redirect()->route('medicamentos.edit', $medicamento->id)
                    ->with('info', 'Medicamento actualizado con éxito');
  }

}
