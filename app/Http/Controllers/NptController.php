<?php

namespace App\Http\Controllers;

use App\Paciente;
use App\Clinica;
use App\Formulacione;
use App\Formulacioneshistoriale;
use App\Historialformulacionmed;
use App\Formulacionmed;
use App\Http\Requests\NptCreateRequest;
use App\Http\Requests\NptUpdateRequest;
use App\Helpers\Dataformulario;
use App\Helpers\Validacionesajax;
use App\Ordene;
use App\Alerta;
use DataTables;
use App\Helpers\CasasFormulacion;

class NptController extends Controller {

  public function index() {
    return view('npt.index');
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create(Paciente $paciente, Clinica $clinica) {
    $dataform = new Dataformulario();
    $formular = $dataform->pintarformulario($paciente, $clinica, false, '', ['selectxx' => false, 'editarxx' => false]);
    $tituloxx = $this->titulo(1, $paciente->npt_id);
    $clinica_id = '';
    $pacientes[$clinica->id] = $clinica->nombre;
    return view('npt.create', compact('paciente', 'tituloxx', 'pacientes', 'clinica_id', 'formular'));
  }

  public function getdata() {
    $clinicax = auth()->user()->clinica_id;
    $formulacion = '';
    if ($clinicax == 1) {
      $formulacion = Formulacione::orderBy('updated_at', 'desc')->get();
    } else {
      $formulacion = Formulacione::where('clinica_id', auth()->user()->clinica_id)->orderBy('updated_at', 'desc')->get();
    }

    $collecti = [];
    foreach ($formulacion as $value) {
      $sestadox = true;
      if (date('Y-m-d', time()) != explode(' ', $value->created_at)[0]) {
        $sestadox = false;
      }
      $respuest = true;
      $titlexxx = 'Imprimir Etiqueta';
      $iconxxxx = 'download-alt';
      $targetxx = '_blank';
      $urlxxxxx = url('reportes/etiqueta/' . $value->id . '/1');
      if ($value->userprep == 0 || $value->userproc == 0 || $value->userlibe == 0) {
        $respuest = false;
        $titlexxx = 'El lote: ' . $value->id . ' todavía no ha sido liberado';
        $urlxxxxx = '#';
        $iconxxxx = 'lock';
        $targetxx = '';
      }
      $collecti[] = [
          'id' => $value->id,
          'clinicax' => $value->clinica->nombre,
          'paciente' => $value->paciente->nombres . ' ' . $value->paciente->apellidos,
          'fechaxxx' => explode(' ', $value->created_at)[0],
          'estadoxx' => $value->estado->nombre,
          'editarxx' => $sestadox,
          'imprimir' => $respuest,
          'titlexxx' => $titlexxx,
          'urlxxxxx' => $urlxxxxx,
          'iconxxxx' => $iconxxxx,
          'targetxx' => $targetxx,
          'opciones' => '',
          'clinicay' => $clinicax
      ];
    }
    $collection = collect($collecti);
    return DataTables::of($collection)->toJson();
  }

  private function cabecera($dataxxxx, $desdexxx, $fformula, $actualiz) {
    $totalxxx = 0;
    $j = 0;
    foreach ($dataxxxx as $key => $value) {
      $data = explode('_', $key);
      if ($j > $desdexxx && count($data) == 1) {
        //echo $dataxxxx[$key . '_volu'].'<br>';
        $totalxxx = $totalxxx + $dataxxxx[$key . '_volu'];
      }
      $j++;
    }
    if (!$actualiz) {
      $formulac['paciente_id'] = $dataxxxx['paciente_id'];
      $formulac['clinica_id'] = $dataxxxx['clinica_id'];
      $formulac['userprep'] = 0;
      $formulac['usercrea'] = auth()->user()->id;
      $formulac['ordeprod'] = Ordene::ordendia();
    }

    $formulac['tiempo'] = $dataxxxx['tiempo'];
    $formulac['velocidad'] = $dataxxxx['velocidad'];
    $formulac['volumen'] = $dataxxxx['volumen'];
    $formulac['purga'] = $dataxxxx['purga'];
    $formulac['total'] = $totalxxx;
    $formulac['peso'] = $dataxxxx['peso'];
    $formulac['userupda'] = auth()->user()->id;
    $formulac['estado_id'] = 1;

    $historia = ['actualiz' => false, 'historia' => ''];
    if (!$actualiz) {
      $formula = Formulacione::create($formulac);
      Alerta::create([
          'clinica_id' => $formula->clinica_id, 'tipoalerta_id' => 1, 'tipoacione_id' => 1, 'formulacione_id' => $formula->id
      ]);
    } else {
      $historia = ['actualiz' => true, 'historia' => Formulacioneshistoriale::historial($fformula)];
      $fformula->update($formulac);

      $formula = $fformula;
    }

    return ['cabec_id' => $formula->id, 'dataxxxx' => $dataxxxx, 'desdexxx' => $desdexxx, 'historia' => $historia];
  }

  private function detalle($cabecera, $actualiz) {
    $casaform = new CasasFormulacion($cabecera['dataxxxx']);

    if ($actualiz) {
      $detallex = Formulacionmed::where('formulacione_id', $cabecera['cabec_id'])->get();
      foreach ($detallex as $key => $value) {
        Historialformulacionmed::historial($value, $cabecera['historia']['historia']->id);
      }
      Formulacionmed::where('formulacione_id', $cabecera['cabec_id'])->delete();
    }
    $i = 0;
    $purgtota = 0;
    foreach ($cabecera['dataxxxx'] as $key => $value) {
      $data = explode('_', $key);
      if ($i > $cabecera['desdexxx'] && count($data) == 1) {
        $dataxxxx = [
            'medisele' => $cabecera['dataxxxx'][$key], // mediamento seleccionado
            'requdiar' => $cabecera['dataxxxx'][$key . '_cant'], // requerimineto diario por el mendicamento seleccionado
            'fosfa_id' => $cabecera['dataxxxx']['fosfatox'], // fosfato seleccionado
            'fosfcant' => $cabecera['dataxxxx']['fosfatox_cant'], // requerimiento diario del fosfato del fosfato seleccionado
            'multivi2' => $cabecera['dataxxxx']['multiuno_cant'], // multivitamina liposoluble seleccionada
            'volumenx' => $cabecera['dataxxxx'][$key . '_volu'],
        ];
        $formulax = $casaform->calculos($dataxxxx)[$cabecera['dataxxxx'][$key]];
        $totalxxx = $formulax['reqtotal'];
        $volumenx = $formulax['volumenx'];
        if ($key == 'aguaeste') {
          $volumenx = $cabecera['dataxxxx'][$key . '_volu'];
          $cabecera['dataxxxx'][$key . '_cant'] = 1;
          $volutota = $cabecera['dataxxxx']['tiempo'] * $cabecera['dataxxxx']['velocidad'];
          $purgaxx = ($volutota + $cabecera['dataxxxx']['purga']) / $volutota;
          $formulax['purgaxxx'] = $volumenx * $purgaxx;
        }
        // cuando un medicamento no tiene requerimiento diario
        if ($cabecera['dataxxxx'][$key . '_cant'] == '') {
          $cabecera['dataxxxx'][$key . '_cant'] = 0;
          $totalxxx = 0;
          $volumenx = 0;
        }
        $purgtota += $formulax['purgaxxx'];
        $grabarxx = [
            'formulacione_id' => $cabecera['cabec_id'],
            'medicamento_id' => $value,
            'cantidad' => $cabecera['dataxxxx'][$key . '_cant'],
            'rtotal' => $totalxxx,
            'volumen' => $volumenx,
            'purga' => $formulax['purgaxxx'],
            'usercrea' => auth()->user()->id,
            'userupda' => auth()->user()->id,
        ];
        Formulacionmed::create($grabarxx);
      }
      $i++;
    }
    $lotexxxx = Formulacione::where('id', $cabecera['cabec_id'])->first();
    $lotexxxx->update(['total' => $purgtota]);
    return $cabecera['cabec_id'];
  }

  public function store(NptCreateRequest $request) {
    $redirect = 'npt.show';
    if (auth()->user()->can('npt.edit')) {
      $redirect = 'npt.edit';
    }
    return redirect()->route($redirect, $this->detalle($this->cabecera($request->all(), 10, '', false), false))
                    ->with('info', 'Formulación guardada con exito');
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Pacientes  $pacientes
   * @return \Illuminate\Http\Response
   */
  public function show(Formulacione $formulacione) {
    $dataform = new Dataformulario();
    $formular = $dataform->pintarformulario($formulacione->paciente, $formulacione->clinica, true, $formulacione, ['selectxx' => false, 'editarxx' => true]);
    $tituloxx = $this->titulo(3, $formulacione->paciente->npt_id);
    $calculos = $dataform->calculos($formulacione);
    $update = '';
    $noxx = '';
    return view('npt.show', compact('formulacione', 'formular', 'tituloxx', 'update', 'noxx', 'calculos'));
  }

  public function volumenajax(\Illuminate\Http\Request $request) {
    if ($request->ajax()) {
      $validaci = new Validacionesajax();
      return response()->json($validaci->formulaciones($request->all()));
    }
  }

  private function titulo($paccionx, $pnptxxxx) {
    $accionxx = '';

    switch ($paccionx) {
      case 1:
        $accionxx = 'Crear';
        break;
      case 2:
        $accionxx = 'Actualizar';
        break;
      case 3:
        $accionxx = 'Ver';
        break;
    }
    $nptxxxxx = '';
    switch ($pnptxxxx) {
      case 2:
        $nptxxxxx = 'Neonato';
        break;
      case 1:
        $nptxxxxx = 'Pediátrico';
        break;
      case 3:
        $nptxxxxx = 'Adulto';
        break;
    }

    return "{$accionxx} Formulación Paciente: {$nptxxxxx}";
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Pacientes  $users
   * @return \Illuminate\Http\Response
   */
  public function edit(Formulacione $formulacione) {
    // validar que no deje modificar un lote
    if ($formulacione->userprep > 0) {
      return redirect()->route('npt.index')
                      ->with('info', 'El lote: ' . $formulacione->id . ' no se puede editar porque ya se hizo el descuento de inventario');
    }
    $paciente = Paciente::find($formulacione->paciente_id);
    $dataform = new Dataformulario();
    $formular = $dataform->pintarformulario($paciente, $formulacione->clinica, true, $formulacione, ['selectxx' => false, 'editarxx' => true]);
    $tituloxx = $this->titulo(2, $paciente->npt_id);
    $clinica_id = $formulacione->clinica_id;
    $pacientes[$formulacione->clinica->id] = $formulacione->clinica->nombre;
    $update = '';
    return view('npt.edit', compact('formulacione', 'paciente', 'formular', 'tituloxx', 'update', 'pacientes', 'clinica_id'));
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Pacientes  $users
   * @return \Illuminate\Http\Response
   */
  public function update(NptUpdateRequest $request, Formulacione $formulacione) {

    $respuest = $this->detalle($this->cabecera($request->all(), 11, $formulacione, true), true);
    return redirect()->route('npt.edit', $respuest)
                    ->with('info', 'Formulacion: ' . $formulacione->id . ' actualizada con exito');
  }

}
