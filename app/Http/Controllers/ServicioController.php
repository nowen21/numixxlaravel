<?php

namespace App\Http\Controllers;

use App\Servicio;
use App\Estado;
use App\Clinica;
use App\Http\Requests\ServicioCreateRequest;
use DataTables;

class ServicioController extends Controller {

  public function index() {
    return view('servicios.index');
  }

  public function create() {
    $estados = Estado::combo();
    $clinicax = Clinica::combo();
    return view('servicios.create', compact('estados', 'clinicax'));
  }

  public function getdata() {    
    $marcas = Servicio::select(['servicios.id','servicios.nombre','clinicas.nombre as clinicax','estados.nombre as estadoxx'])
            ->join('clinicas','servicios.clinica_id','=','clinicas.id')
            ->join('estados','servicios.estado_id','=','estados.id')
            ->where(function($queryxxx){
              $iusuario=auth()->user()->clinica_id;           
              if($iusuario!=1){
                $queryxxx->where('clinica_id',$iusuario);
              }
            })
            ->get();
    
    $collecti = [];
    foreach ($marcas as $value) {
      $collecti[] = [
          'id' => $value->id,
          'estado' => $value->estadoxx,
          'clinicax' => $value->clinicax,
          'nombre' => $value->nombre,
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
  public function store(ServicioCreateRequest $request) {
    $servicio = Servicio::create(['nombre' => strtoupper($request->all()['nombre']),
                'estado_id' => $request->all()['estado_id'],
                'clinica_id' => $request->all()['clinica_id'],
                'usercrea' => auth()->user()->id,
                'userupda' => auth()->user()->id
    ]);
    return redirect()->route('servicios.edit', $servicio->id)
                    ->with('info', 'Sevicio guardado con exito');
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Pacientes  $pacientes
   * @return \Illuminate\Http\Response
   */
  public function show(Servicio $servicio) {
    return view('servicios.show', compact('servicio', 'estado'));
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Pacientes  $users
   * @return \Illuminate\Http\Response
   */
  public function edit(Servicio $servicio) {
    $estados = Estado::combo();
    $clinicax = Clinica::combo();
    $update = '';
    return view('servicios.edit', compact('servicio', 'estados', 'update', 'clinicax'));
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Pacientes  $users
   * @return \Illuminate\Http\Response
   */
  public function update(ServicioCreateRequest $request, Servicio $servicio) {
    // Actualizar la eps
    $servicio->update(['nombre' => strtoupper($request->all()['nombre']),
        'estado_id' => $request->all()['estado_id'],
        'clinica_id' => $request->all()['clinica_id'],
        'userupda' => auth()->user()->id,
    ]);
    // Actualizar los roles
    return redirect()->route('servicios.edit', $servicio->id)
                    ->with('info', 'Servicio actualizado con exito');
  }

}
