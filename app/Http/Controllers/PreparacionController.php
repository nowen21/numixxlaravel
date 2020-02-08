<?php

namespace App\Http\Controllers;

use App\Paciente;
use App\Mlote;
use App\Alerta;
use App\Formulacione;
use App\FormulacionmedMlote;
use App\Formulacionmed;
use App\Helpers\Dataformulario;
use App\Http\Requests\PreparacionesUpdateRequest;
use DataTables;

class PreparacionController extends Controller {

  public function index() {
    return view('preparaciones.index');
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function getdata() {
    $collecti = [];
    $formulacion = '';
    if (auth()->user()->clinica_id == 1) {
      $formulacion = Formulacione::orderBy('id', 'desc')->get();
    } else {
      $formulacion = Formulacione::where('clinica_id', auth()->user()->clinica_id)->orderBy('updated_at', 'desc')->get();
    }
    foreach ($formulacion as $value) {
      $sestadox = true;
      if (date('Y-m-d', time()) != explode(' ', $value->created_at)[0]) {
        $sestadox = false;
      }
      $mensajex = 'Sin preparar';
      if ($value->userprep > 0) {
        $mensajex = 'Preparado';
      }
      $fechaxxx = explode(' ', $value->created_at);
      $collecti[] = [
          'id' => $value->id,
          'paciente' => $value->paciente->nombres . ' ' . $value->paciente->apellidos,
          'clinicax' => $value->clinica->nombre,
          'fechaxxx' => $fechaxxx[0],
          'cedulaxx' => $value->paciente->cedula,
          'actualiz' => $sestadox,
          'estadoxx' => $value->estado->nombre,
          'mensajex' => $mensajex,
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
  public function show(Formulacione $formulacione) {
    $paciente = $formulacione->paciente;
    $dataform = new Dataformulario();
    $formular = $dataform->pintarformulario($paciente,$formulacione->clinica, true, $formulacione, ['selectxx' => true, 'formulac' => $formulacione->id]);
    $tituloxx = $this->titulo(3, $paciente);
    $clinica_id = $formulacione->clinica_id;
    $pacientes[$formulacione->paciente_id] = $formulacione->clinica->nombre;
    $update = '';
    $noxx = '';
    return view('preparaciones.show', compact('formulacione', 'paciente', 'formular', 'tituloxx', 'dataxxxx', 'update', 'pacientes', 'clinica_id', 'noxx'));
  }

  private function titulo($paccionx, $paciente) {
    
    $nptxxxxx = $paciente->nombres . ' ' . $paciente->apellidos;
    switch ($paciente->npt_id) {
      case 2:
        $nptxxxxx .= '(NPT: Neonato)';
        break;
      case 1:
        $nptxxxxx .= '(NPT:Pediátrico)';
        break;
      case 3:
        $nptxxxxx .= '(NPT:Adulto)';
        break;
    }

    return "Preparar Formulación Paciente: {$nptxxxxx}";
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Pacientes  $users
   * @return \Illuminate\Http\Response
   */
  public function edit(Formulacione $formulacione) {
    $paciente = $formulacione->paciente;
    $tituloxx = $this->titulo(2, $paciente);
    $clinica_id = $formulacione->clinica_id;
    $pacientes[$formulacione->paciente_id] = $formulacione->clinica->nombre;

    $update = '';

    return view('preparaciones.edit', compact('formulacione', 'paciente', 'formular', 'tituloxx', 'dataxxxx', 'update', 'pacientes', 'clinica_id'));
  }

  private function detalle($cabecera) {
    $i = 0;
    foreach ($cabecera['dataxxxx'] as $key => $value) {
      $data = explode('_', $key);
      if ($i > 11 && $data[0] == 'preparar') {
        $datallexx = Formulacionmed::where('formulacione_id', $cabecera['formulac'])->where('id', $data[1])->first();
        //echo $datallexx->id . '<br>';
        $grabarxx = [
            'preparar' => 1,
        ];
        $datallexx->update($grabarxx);
        $this->descontarinventario($datallexx);
      }
      $i++;
    }
  }

  public function update(PreparacionesUpdateRequest $request, Formulacione $formulacione) {
    $mlotexxx = new Mlote;
    $mlotexxx->inactivarvencidos();
    $dataxxxx = $request->all();
    $formulac = ['userprep' => auth()->user()->id];
    $formulacione->update($formulac);

    Alerta::create([
        'clinica_id' => $formulacione->clinica_id, 'tipoalerta_id' => 2, 'tipoacione_id' => 2, 'formulacione_id' => $formulacione->id
    ]);
    // actualizar con qué medicamento fue el que se realizó la preparación
    // recorrer la lista de medicamentos con los que se realizó la preparación
    $this->detalle(['dataxxxx' => $dataxxxx, 'formulac' => $formulacione->id]);
    return redirect()->route('preparaciones.edit', $formulacione->id)
                    ->with('info', 'Preparación actualizada con exito');
  }

  /**
   * Este metodo se encarga de realizar las validaciones para el descuento de inventario.
   * 
   * @param array $datallexx registro que contiene el valor de la purga el cual se quiere completar el descuento
   * @param int $cantidad cantidad que se lleva acumulada para el descuento
   * @param array $value registro del lote al que se le va a descontar inventario
   * @return int cantidad que se lleva de lo que se necesita para completar lo solicitado
   */
  private function descuento($datallexx, $cantidad, $value) {
    $inventar = 0;
    $volumenx = 0;
    if ($datallexx->purga - $cantidad >= $value->inventar) {
      $volumenx = $value->inventar;
    } else {// se decuenta del inventario lo que hace falta para completar lo solicitado
      $inventar = $value->inventar - ($datallexx->purga - $cantidad); // descuenta a inventario lo que hace falta
      $volumenx = $value->inventar - $inventar; // cantidad que se desconto a inventario
    }
    $mlotexxy = Mlote::find($value->id); // seleccionar el lote al que se le va a descontar inventario
    /* realizar el descuento del inventario encontrado */
    $mlotexxy->update(['inventar' => $inventar, 'userupda' => auth()->user()->id]);
    /* insertar el volumen encontrado */
    FormulacionmedMlote::create(['formulacionmed_id' => $datallexx->id,
        'mlote_id' => $value->id,
        'usercrea' => auth()->user()->id,
        'userupda' => auth()->user()->id,
        'volumenx' => $volumenx
    ]);
    return $cantidad + $volumenx;
  }

  /**
   * Este metodo realiza el descuento al inventario del valor solicitado por cada medicamento seleccionado
   *
   */
  public function descontarinventario($datallexx) {
    // consultar el inventario del medicamento seleccionado
    $mlotexxx = Mlote::consultarinventario($datallexx);
    // saber si ese detalle ya tiene descuento de inventario
    $inventar = FormulacionmedMlote::where('formulacionmed_id', $datallexx->id)->first();
    if (count($inventar) == 0) {// solo se hace descuento de inventario si no existe un registro del detalle
      $cantidad = 0;
      foreach ($mlotexxx as $value) { // recorrer los lotes que tienen inventario del medicamento seleccionado
        /* completar el volumen de medicamento seleccionado que se necesita */
        if ($cantidad < $datallexx->purga) {
          /* asiganar todo el inventario del lote */
          $cantidad = $this->descuento($datallexx, $cantidad, $value);
        } else {// se completo lo solicitado
          break;
        }
      }
    }
  }

}
