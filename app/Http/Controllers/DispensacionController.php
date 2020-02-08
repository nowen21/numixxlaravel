<?php

namespace App\Http\Controllers;

use App\Dispmedico;
use App\Mlote;
use App\Dlote;
use App\Medicamento;
use App\Cabeceralistamiento as Cabecera;
use App\Detallealistamiento as Detalle;
use App\Estado;
use App\Ordene;
use App\Http\Requests\DispensacionCreateRequest;
use DataTables;

class DispensacionController extends Controller {

  public function crearPDF($datos, $vistaurl, $tipo) {
    $medicame = $this->dispensacion(true, $datos->id);
    $estado = Estado::find($datos->estado_id)->nombre;
    $data = $datos;
    $date = date('Y-m-d');
    $view = \View::make($vistaurl, compact('data', 'date', 'medicame', 'estado'))->render();
    $pdf = \App::make('dompdf.wrapper');
    $pdf->loadHTML($view);
    $pdf->setPaper(array(0, 0, 9.5 * 72, 14.9 * 72), "portrait");

    if ($tipo == 1) {
      return $pdf->stream('reporte');
    }
    if ($tipo == 2) {
      return $pdf->download('reporte.pdf');
    }
    if ($tipo == 3) {
      return view('reportes.veretiqueta', compact('data'));
    }
  }

  public function alistamiento(Cabecera $cabecera, $tipo) {
    $vistaurl = "dispensaciones.alistamiento";
    return $this->crearPDF($cabecera, $vistaurl, $tipo);
  }

  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index() {
    $fechaxxx = date('Y-m-d');
    $dispensa = count(Cabecera::where('created_at', 'like', "{$fechaxxx}%")->first());
    return view('dispensaciones.index', compact('dispensa'));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function dispensacion($opcionxx = false, $cabecera) {
    $medicame = Mlote::select('medicamentos.nombgene', 'mlotes.id', 'mlotes.lotexxxx', 'mlotes.fechvenc', 'minvimas.reginvim')
            ->join('minvimas', 'mlotes.minvima_id', 'minvimas.id')
            ->join('marcas', 'minvimas.marca_id', 'marcas.id')
            ->join('medicamentos', 'marcas.medicamento_id', 'medicamentos.id')
            ->where('inventar', '>', 0)
            ->get();
    $dispmedi = Dlote::select('dispmedicos.nombgene', 'dlotes.id', 'dlotes.lotexxxx', 'dlotes.fechvenc', 'dinvimas.reginvim')
            ->join('dinvimas', 'dlotes.dinvima_id', 'dinvimas.id')
            ->join('dmarcas', 'dinvimas.dmarca_id', 'dmarcas.id')
            ->join('dispmedicos', 'dmarcas.dispmedico_id', 'dispmedicos.id')
            ->where('inventar', '>', 0)
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
      if (!isset($medicame[$i]['nombgene'])) {
        $dispxxxx['medicamm'] = '';
        $dispxxxx['value_me'] = 0;
        $dispxxxx['lotexxxm'] = '';
        $dispxxxx['reginvim'] = '';
        $dispxxxx['fechvenm'] = '';
        $dispxxxx['medic_id'] = '';
      } else {
        $valorxxx = Detalle::select('unidad')->where('cabeceralistamiento_id', $cabecera)->where('campo_id', 'medic_' . $medicame[$i]['id'])->first()['unidad'];
        $dispxxxx['medicamm'] = $medicame[$i]['nombgene'];
        $dispxxxx['value_me'] = $opcionxx == 1 ? count($valorxxx) > 0 ? $valorxxx : 0 : 0;
        $dispxxxx['lotexxxm'] = $medicame[$i]['lotexxxx'];
        $dispxxxx['reginvim'] = $medicame[$i]['reginvim'];
        $dispxxxx['fechvenm'] = $medicame[$i]['fechvenc'];
        $dispxxxx['medic_id'] = 'medic_' . $medicame[$i]['id'];
      }
      if (!isset($dispmedi[$i]['nombgene'])) {
        $dispxxxx['medicamd'] = '';
        $dispxxxx['value_di'] = 0;
        $dispxxxx['lotexxxd'] = '';
        $dispxxxx['reginvid'] = '';
        $dispxxxx['fechvend'] = '';
        $dispxxxx['dispo_id'] = '';
      } else {
        $valorxxx = Detalle::select('unidad')->where('cabeceralistamiento_id', $cabecera)->where('campo_id', 'dispo_' . $dispmedi[$i]['id'])->first()['unidad'];
        $dispxxxx['medicamd'] = $dispmedi[$i]['nombgene'];
        $dispxxxx['value_di'] = $opcionxx == 1 ? count($valorxxx) > 0 ? $valorxxx : 0 : 0;
        $dispxxxx['lotexxxd'] = $dispmedi[$i]['lotexxxx'];
        $dispxxxx['reginvid'] = $dispmedi[$i]['reginvim'];
        $dispxxxx['fechvend'] = $dispmedi[$i]['fechvenc'];
        $dispxxxx['dispo_id'] = 'dispo_' . $dispmedi[$i]['id'];
      }
      $dispensa[] = $dispxxxx;
    }
    return $dispensa;
  }

  public function create() {
    $cabecera = Cabecera::where('ordepres', Ordene::ordendia())->first();
    if (count($cabecera) > 0) {
      return redirect()->route('dispensaciones.index', $cabecera->id)
                      ->with('info', 'Ya se generó la dispensación del día de hoy');
    }
    $medicame = $this->dispensacion(false, 0);
    $estados = Estado::combo();

    return view('dispensaciones.create', compact('estados', 'medicame'));
  }

  public function getdata() {
    $collecti = [];
    $marcas = Cabecera::get();
    foreach ($marcas as $value) {
      $sestadox = true;
      if (date('Y-m-d', time()) != explode(' ', $value->created_at)[0]) {
        $sestadox = false;
      }

      $collecti[] = [
          'id' => $value->id,
          'estado' => $value->nombcome,
          'editarxx' => $sestadox,
          'producto' => $value->producto,
          'fechaxxx' => explode(' ', $value->created_at)[0],
          'ordepres' => $value->ordepres,
          'estadoxx' => $value->estado->nombre,
          'opciones' => ''
      ];
    }
    $collection = collect($collecti);
    return DataTables::of($collection)->toJson();
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(DispensacionCreateRequest $request) {
    $cabeform = $request->all();
    $cabecera = Cabecera::create([
                'producto' => $cabeform['producto'],
                'ordepres' => Ordene::ordendia(),
                'estado_id' => $cabeform['estado_id']
    ]);
    $i = 0;
    $this->detalle($cabecera, $cabeform, 4);
    return redirect()->route('dispensaciones.edit', $cabecera->id)
                    ->with('info', 'Alistamiento guardado con exito');
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Pacientes  $pacientes
   * @return \Illuminate\Http\Response
   */
  public function show(Cabecera $cabecera) {
    $medicame = $this->dispensacion(true, $cabecera->id);
    $estado = Estado::find($cabecera->estado_id)->nombre;
    return view('dispensaciones.show', compact('cabecera', 'estado', 'medicame'));
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
    return view('dispensaciones.edit', compact('cabecera', 'estados', 'update', 'medicame'));
  }

  /**
   * metodo encargado de reliazar el movimiento del inventario al momento de realizar una actualizacion.
   *
   * @param  $campexpl
   * @param  $restsuma
   * @param  $valorxxx
   * @param  $valorxxy
   */
  private function descontarinventario($campexpl, $restsuma, $valorxxx, $valorxxy) {
    $diferenc = [];
    if ($campexpl[0] == 'medic') {// si es un medicamento
      $medicamento = Medicamento::where('id', $campexpl[1])->first();
      if ($restsuma) {
        $diferenc = ['inventario' => $medicamento->inventario + ($valorxxy->unidad - $valorxxx)];
      } else {
        $diferenc = ['inventario' => $medicamento->inventario - ($valorxxx - $valorxxy->unidad)];
      }
      $medicamento->update($diferenc);
    } else {// es un dispositivo medico
      $dispositivo = Dispmedico::where('id', $campexpl[1])->first();
      if ($restsuma) {
        $diferenc = ['inventario' => $dispositivo->inventario + ($valorxxy->unidad - $valorxxx)];
      } else {
        $diferenc = ['inventario' => $dispositivo->inventario - ($valorxxx - $valorxxy->unidad)];
      }
      $dispositivo->update($diferenc);
    }
  }

  private function detalle($cabecera, $requestx, $validaxx) {
    $i = 0;
    foreach ($requestx as $campoxxx => $valorxxx) {
      $campexpl = explode('_', $campoxxx);
      if ($i > $validaxx && count($campexpl) == 2 && $campexpl[0] != 'estado') {// indica desde donde estan los campos para el detalle, los anteriores son cabecera
        $valorxxy = Detalle::where('cabeceralistamiento_id', $cabecera->id)->where('campo_id', 'like', $campoxxx)->first(); //echo 'kkkk '.$valorxxy.'<br>';
        if (count($valorxxy) > 0) { // saber si es una actualización
//          if ($valorxxy->unidad > $valorxxx) {// la diferencia la suma al inventario
//            $this->descontarinventario($campexpl, true, $valorxxx, $valorxxy);
//          } else if ($valorxxy->unidad < $valorxxx) { // la diferencia la descuenta del inventario
//            $this->descontarinventario($campexpl, false, $valorxxx, $valorxxy);
//          }
          $valorxxy->update(['unidad' => $valorxxx]);
        } else {
          Detalle::create(['cabeceralistamiento_id' => $cabecera->id,
              'campo_id' => $campoxxx,
              'unidad' => $valorxxx]);
        }
      }
      $i++;
    }
  }

  public function update(DispensacionCreateRequest $request, Cabecera $cabecera) {
    $actualiz = $request->all();
    $cabecera->update([
        'producto' => $actualiz['producto'],
        'estado_id' => $actualiz['estado_id']
    ]);
    $this->detalle($cabecera, $request->all(), 5);
    return redirect()->route('dispensaciones.edit', $cabecera->id)
                    ->with('info', 'Alistamiento actualizado con exito');
  }

  public function esnumerico(\Illuminate\Http\Request $request) {
    if ($request->ajax()) {
      $data = $request->all();
      $numeroxx = $data['cantalis'];
      // validar que lo que se ingrese sea un valor numerico
      if (!is_numeric($numeroxx)) {
        if ($numeroxx != '') {
          $numeroxx = substr($numeroxx, 0, strlen($numeroxx) - 1);
        } else {
          $numeroxx = 0;
        }
      }
      $cantmayo = false;
      $idcanali = explode('_', $data['idcanali']);
      $inventar = '';
// consultar el inventario
      if ($idcanali[0] == 'medic') {
        $inventar = Mlote::where('id', $idcanali[1])->first();
      } else {
        $inventar = Dlote::where('id', $idcanali[1])->first();
      }
//fin consultar el inventario
      $valorxxx = Detalle::where('created_at', 'like', date('Y-m-d', time()) . '%')->where('campo_id', 'like', $data['idcanali'])->first();
      $totalxxx = $inventar->inventar;
      if (count($valorxxx) > 0) {
        $totalxxx = $inventar->inventar + $valorxxx->unidad;
      }
      // validar que el valor que se quiere alistar sea menor o igual a la existencia
      if ($numeroxx > $totalxxx) {
        $numeroxx = $totalxxx;
        $cantmayo = true;
      }
      return response()->json([
                  'numeroxx' => $numeroxx,
                  'idcanali' => $data['idcanali'],
                  'cantmayo' => $cantmayo]);
    }
  }

}
