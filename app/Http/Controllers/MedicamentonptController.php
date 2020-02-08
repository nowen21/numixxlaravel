<?php

namespace App\Http\Controllers;

use App\Npt;
use App\MedicamentoNpt;
use App\Estado;
use App\Medicamento;
use App\Http\Requests\MedicamentonptCreateRequest;
use DataTables;

class MedicamentonptController extends Controller {
  public function index() {
    return view('medicamentonpts.index');
  }
  public function create() {
    $estados = Estado::combo();
    $nptselec = '""';
    $npts = Npt::combo(true);
    $medicame=$this->medicamentos();
    return view('medicamentonpts.create', compact('estados', 'medicame', 'npts'));
  }

  public function getdata() {
    $medicamentos = MedicamentoNpt::select('medicamento_npt.id','medicamentos.nombgene','npts.nombre as nptxxxxx','estados.nombre')
           ->join('medicamentos','medicamento_npt.medicamento_id','=','medicamentos.id')
            ->join('npts','medicamento_npt.npt_id','=','npts.id')
            ->join('estados','medicamento_npt.estado_id','=','estados.id')
            ->where('medicamentos.estado_id',1)
            ->get();
    foreach ($medicamentos as $value) {
      $collecti[] = [
          'id' => $value->id,
          'nombgene' => $value->nombgene,
          'nptxxxxx' => $value->nptxxxxx,
          'estadoxx' => $value->nombre,
          'opciones' => ''
      ];
    }
    $collection = collect($collecti);
    return DataTables::of($collection)->toJson();
  }

  public function store(MedicamentonptCreateRequest $request) {
    $dataxxxx = $request->all();
    $medicame = [
        'npt_id' => $dataxxxx['npt_id'],
        'medicamento_id' => $dataxxxx['medicamento_id'],
        'estado_id' => $dataxxxx['estado_id'],
        'randesde' => $dataxxxx['randesde'],
        'ranhasta' => $dataxxxx['ranhasta'],
        'rangunid' => $dataxxxx['rangunid'],
    ];

    $medicamento = MedicamentoNpt::create($medicame);
    return redirect()->route('medicamentonpts.edit', $medicamento->id)
                    ->with('info', 'Medicamento guardado con éxito');
  }

  public function show(MedicamentoNpt $medicamentonpt) {
    return view('medicamentonpts.show', compact('medicamentonpt'));
  }

  public function edit(MedicamentoNpt $medicamentonpt) {
    $estados = Estado::combo();
    $update = '';
    $npts = Npt::combo(true);
    $medicame=$this->medicamentos($medicamentonpt->medicamento_id);
    return view('medicamentonpts.edit', compact('medicamentonpt', 'medicame', 'estados', 'update', 'npts'));
  }

  public function update(MedicamentonptCreateRequest $request, MedicamentoNpt $medicamentonpt) {
    $dataxxxx = $request->all();
    $medicamentonpt->update([
        'npt_id' => $dataxxxx['npt_id'],
        'medicamento_id' => $dataxxxx['medicamento_id'],
        'estado_id' => $dataxxxx['estado_id'],
        'randesde' => $dataxxxx['randesde'],
        'ranhasta' => $dataxxxx['ranhasta'],
        'rangunid' => $dataxxxx['rangunid'],
    ]);
    return redirect()->route('medicamentonpts.edit', $medicamentonpt->id)
                    ->with('info', 'Medicamento actualizado con éxito');
  }

  public function medicamentos($pmedicam=0) {
    $dataxxxx = [];
    $medicame = Medicamento::select('id','nombgene')
            ->where('estado_id',1)->get();
    foreach ($medicame as $value) {
      foreach (Npt::all() as $npt) {
        if (count(MedicamentoNpt::where('medicamento_id', $value->id)->where('npt_id', $npt->id)->first()) == 0 || $pmedicam == $value->id) {
          $dataxxxx[$value->id] = $value->nombgene;
        }
      }
      
    }
    return $dataxxxx;
  }

  public function rangos(\Illuminate\Http\Request $request) {
    if ($request->ajax()) {
      //$medicasa = \App\CasaMedicamento::where('id', $request->all()['medicame'])->first();
      $medicame = \App\MedicamentoNpt::where('medicamento_id', $request->all()['medicame'])->where('npt_id', $request->all()['npt_id'])->first();
      return response()->json(['medicame'=>$medicame->rangunid,'idmedica'=>$request->all()['idmedica'].'_unid']);
    }
  }
}
