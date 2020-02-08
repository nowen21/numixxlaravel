<?php

namespace App\Http\Controllers;

use App\Genero;
use App\Estado;
use App\Http\Requests\GeneroCreateRequest;

class GeneroController extends Controller {

  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index() {
    return view('generos.index');
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create() {
    $estados = Estado::combo();
    return view('generos.create', compact('estados'));
  }

  public function getdata() {
    $generos = Genero::query();
    return datatables()->eloquent($generos)
                    ->addColumn('estado', function ($generos) {
                      $sestadox = 'INACTIVO';
                      if ($generos->estado == 1) {
                        $sestadox = 'ACTIVO';
                      }
                      return $sestadox;
                    })
                    ->make(true);
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(GeneroCreateRequest $request) {    
    $genero = Genero::create(['nombre'=>strtoupper($request->all()['nombre']),'estado'=>$request->all()['estado']]);
    return redirect()->route('generos.edit', $genero->id)
                    ->with('info', 'Género guardado con exito');
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Pacientes  $pacientes
   * @return \Illuminate\Http\Response
   */
  public function show(Genero $genero) {
    $estado= Estado::find($genero->estado)->nombre; 
    return view('generos.show', compact('genero','estado'));
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Pacientes  $users
   * @return \Illuminate\Http\Response
   */
  public function edit(Genero $genero) {
    $estados = Estado::combo();
    $update='';
    return view('generos.edit', compact('genero','estados','update'));
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Pacientes  $users
   * @return \Illuminate\Http\Response
   */
  public function update(GeneroCreateRequest $request, Genero $genero) {    
    // Actualizar la eps
    $genero->update(['nombre'=>strtoupper($request->all()['nombre']),'estado'=>$request->all()['estado']]);
    // Actualizar los roles
    return redirect()->route('generos.edit', $genero->id)
                    ->with('info', 'Género actualizado con exito');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Pacientes  $pacientes
   * @return \Illuminate\Http\Response
   */
  public function destroy(Genero $genero) {
    $genero->delete();
    return back()->with('info', 'Eliminado correctamente');
  }

}