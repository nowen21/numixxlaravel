<?php

namespace App\Http\Controllers;

use App\Formulacionmed;
use App\Dispmedico;
use App\Medicamento;
use App\Cabeceralistamiento as Cabecera;
use App\Detallealistamiento as Detalle;
use App\Estado;
use DataTables;
use App\Http\Requests\ConsiliacionCreateRequest;

class ConciliacionController extends Controller {

  public function crearPDF($datos, $vistaurl, $tipo) {
    $medicame = $this->dispensacion(true, $datos->id);
    $estado = Estado::find($datos->estado_id)->nombre;
    $data = $datos;
    $date = date('Y-m-d');
    $view = \View::make($vistaurl, compact('data', 'date', 'medicame', 'estado'))->render();
    $pdf = \App::make('dompdf.wrapper');
    $pdf->loadHTML($view);
    // $pdf->setPaper(array(0, 0, 9.5 * 72, 14.9 * 72), "landscape");
    $pdf->setPaper(array(0, 0, 9.5 * 72, 14.9 * 72), "portrait");

    if ($tipo == 1) {
      return $pdf->stream('reporte');
    }
    if ($tipo == 2) {
      return $pdf->download('reporte.pdf');
    }
    if ($tipo == 3) {
      return view('conciliaciones.conciliacion', compact('data'));
    }
  }

  public function conciliacion(Cabecera $cabecera, $tipo) {
    $vistaurl = "conciliaciones.conciliacion";
    return $this->crearPDF($cabecera, $vistaurl, $tipo);
  }

  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index() {
    $dispensa = count(Cabecera::where('created_at', 'like', date('Y-m-d') . '%')->first());
    return view('conciliaciones.index', compact('dispensa'));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function dispensacion($opcionxx = false, $cabecera) {
    $fecha = date('Y-m-d', time());
    $medicame = Medicamento::select('medicamentos.nombgene', 'casa_medicamento.id', 'mlotes.id as mlote_id', 'mlotes.lotexxxx')
            ->join('marcas', 'medicamentos.id', 'marcas.medicamento_id')
            ->join('minvimas', 'marcas.id', 'minvimas.marca_id')
            ->join('mlotes', 'minvimas.id', 'mlotes.minvima_id')
            ->join('formulacionmed_mlote', 'mlotes.id', 'formulacionmed_mlote.mlote_id')
            ->join('casa_medicamento', 'medicamentos.id', 'casa_medicamento.medicamento_id')
            ->where('formulacionmed_mlote.created_at', 'like', $fecha . "%")
            ->where('formulacionmed_mlote.volumenx', '>', 0)
            ->where('medicamentos.estado_id', 1)
            ->where('marcas.estado_id', 1)
            ->where('minvimas.estado_id', 1)
            ->where('mlotes.estado_id', 1)
            ->get();
    $dispmedi = Dispmedico::select('dispmedicos.nombgene', 'dlotes.id', 'dlotes.lotexxxx')
            ->join('dmarcas', 'dispmedicos.id', 'dmarcas.dispmedico_id')
            ->join('dinvimas', 'dmarcas.id', 'dinvimas.dmarca_id')
            ->join('dlotes', 'dinvimas.id', 'dlotes.dinvima_id')
            ->where('dispmedicos.estado_id', 1)
            ->where('dmarcas.estado_id', 1)
            ->where('dinvimas.estado_id', 1)
            ->where('dlotes.estado_id', 1)
            ->get();
    $medicant = count($medicame);
    $dispcant = count($dispmedi);
    $cantfina = $dispcant;
    if ($medicant > $dispcant) {
      $cantfina = $medicant;
    }
    $dispensa = [];
    for ($i = 0; $i < $cantfina; $i++) {
      $dispxxxx = [];
      $noaplica='XXX';
      if (!isset($medicame[$i]['nombgene'])) {
        $dispxxxx['medicamm'] = $noaplica;
        $dispxxxx['value_me'] = $noaplica;
        $dispxxxx['canco_me'] = $noaplica;
        $dispxxxx['difer_me'] = $noaplica;
        $dispxxxx['medic_id'] = $noaplica;
        $dispxxxx['lotexxme'] = $noaplica;
      } else {
        $dispxxxx['medicamm'] = $medicame[$i]['nombgene'];
        $fecha = date('Y-m-d', time());
        $cantcons = \App\FormulacionmedMlote::where('created_at', 'like', $fecha . "%")->where('mlote_id', $medicame[$i]['mlote_id'])->sum('volumenx');
        $dispxxxx['value_me'] = $cantcons;
        $dispxxxx['canco_me'] = $cantcons;
        $dispxxxx['difer_me'] = 0;
        $dispxxxx['medic_id'] = 'medic_' . $medicame[$i]['id'];
        $dispxxxx['lotexxme'] = $medicame[$i]['lotexxxx'];
      }
      if (!isset($dispmedi[$i]['nombgene'])) {
        $dispxxxx['medicamd'] = '';
        $dispxxxx['value_di'] = $noaplica;
        $dispxxxx['canco_di'] = $noaplica;
        $dispxxxx['difer_di'] = $noaplica;
        $dispxxxx['dispo_id'] = $noaplica;
        $dispxxxx['lotexxxx'] = $noaplica;
      } else {
        $valorxxx = Detalle::where('cabeceralistamiento_id', $cabecera)->where('campo_id', "dispo_{$dispmedi[$i]['id']}")->first();
        $dispxxxx['medicamd'] = $dispmedi[$i]['nombgene'];
        $dispxxxx['value_di'] = $valorxxx['unidad'];
        $dispxxxx['canco_di'] = $valorxxx['cantcons']; // digitada
        $dispxxxx['difer_di'] = $valorxxx['diferenc']; // calculada
        $dispxxxx['dispo_id'] = 'dispo_' . $dispmedi[$i]['id'];
        $dispxxxx['lotexxxx'] = $dispmedi[$i]['lotexxxx'];
      }
      $dispensa[] = $dispxxxx;
    }
    return $dispensa;
  }

  public function getdata(\Illuminate\Http\Request $request) {
    $collecti = [];
    $marcas = Cabecera::get();
    foreach ($marcas as $value) {
      $sestadox = true;
      if (date('Y-m-d', time()) != explode(' ', $value->created_at)[0]) {
        $sestadox = false;
      }
      $collecti[] = [
          'id' => $value->id,
          'producto' => $value->producto,
          'fechaxxx' => explode(' ', $value->created_at)[0],
          'opxxxxxx' => $value->ordepres,
          'estadoxx' => $value->estado->nombre,
          'editarxx' => $sestadox,
          'opciones' => ''
      ];
    }
    $collection = collect($collecti);
    return DataTables::of($collection)->toJson();
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Pacientes  $pacientes
   * @return \Illuminate\Http\Response
   */
  public function show(Cabecera $cabecera) {
    $medicame = $this->dispensacion(true, $cabecera->id);
    return view('conciliaciones.show', compact('cabecera', 'medicame'));
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Pacientes  $users
   * @return \Illuminate\Http\Response
   */
  public function edit(Cabecera $cabecera) {
    $medicame = $this->dispensacion(true, $cabecera->id);
    $estados = Estado::combo();
    $update = '';
    return view('conciliaciones.edit', compact('cabecera', 'estados', 'update', 'medicame'));
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Pacientes  $users
   * @return \Illuminate\Http\Response
   */
  private function detalle($cabecera, $requestx, $validaxx) {
    $i = 0;
    foreach ($requestx as $campoxxx => $valorxxx) {
      $campexpl = explode('_', $campoxxx);
      if ($i > $validaxx && count($campexpl) == 2 && $campexpl[0] == 'dispo') {// indica desde donde estan los campos para el detalle, los anteriores son cabecera 
        // se realiza el descuento del inventario
        $dispositivo = Dispmedico::where('id', $campexpl[1])->first();
        $dispositivo->update(['inventario' => $dispositivo->inventario + $requestx[$campoxxx . '_dif']]);
        $valorxxy = Detalle::where('cabeceralistamiento_id', $cabecera->id)->where('campo_id', $campoxxx)->first();
        $valorxxy->update(['cantcons' => $requestx[$campoxxx . '_con'], 'diferenc' => $requestx[$campoxxx . '_dif']]);
      }
      $i++;
    }
  }

  public function update(ConsiliacionCreateRequest $request, Cabecera $cabecera) {
    $this->detalle($cabecera, $request->all(), 5);
    return redirect()->route('conciliaciones.edit', $cabecera->id)
                    ->with('info', 'Alistamiento actualizado con exito');
  }

  public function esnumerico(\Illuminate\Http\Request $request) {
    if ($request->ajax()) {
      $data = $request->all();
      $numeroxx = $data['cantcons'];
      if (!is_numeric($data['cantcons'])) {// se verifica que sea un volor numerico lo que se ingrese
        if ($data['cantcons'] != '') {
          $numeroxx = substr($numeroxx, 0, strlen($numeroxx) - 1);
        } else {
          $numeroxx = 0;
        }
      }
      $cantmayo = false;
      if ($numeroxx > $data['cantalis']) {
        $cantmayo = true;
      }

      $idelemen = $data['idcancon'][0] . '_' . $data['idcancon'][1];
      return response()->json([
                  'numeroxx' => $numeroxx,
                  'diferenc' => $data['cantalis'] - $numeroxx,
                  'cantalis' => $data['cantalis'],
                  'idcancon' => $idelemen . '_con',
                  'idiferen' => $idelemen . '_dif',
                  'cantmayo' => $cantmayo
      ]);
    }
  }

}
