<?php

namespace App\Http\Controllers;
use App\Http\Requests\PermissionCreateRequest;
use App\Http\Requests\PermissionUpdateRequest;
use Caffeinated\Shinobi\Models\Permission;
class PermisoController extends Controller {

  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index() {
    return view('permisos.index');
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create() {     
    return view('permisos.create');
  }

  public function getdata() {
    return \DataTables::of(Permission::query())->make(true);
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(PermissionCreateRequest $request) {    
    $permission = Permission::create($request->all());    
    return redirect()->route('permisos.edit', $permission->id)
                    ->with('info', 'Permiso creado con exito');
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Pacientes  $pacientes
   * @return \Illuminate\Http\Response
   */
  public function show(Permission $permission) {
    return view('permisos.show', compact('permission'));
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Role  $role
   * @return \Illuminate\Http\Response
   */
  public function edit(Permission $permission) {
    $update='';
    return view('permisos.edit', compact('permission','update'));
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Role  $role
   * @return \Illuminate\Http\Response
   */
  public function update(PermissionUpdateRequest $request, Permission $permission) {
    // Actualizar el rol    
    $permission->update($request->all());
    return redirect()->route('permisos.edit', $permission->id)
                    ->with('info', 'Permiso actualizado con exito');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Pacientes  $pacientes
   * @return \Illuminate\Http\Response
   */
  public function destroy(Permission $permission) {
    $permission->delete();
    return back()->with('info', 'Permiso eliminado correctamente');
  }

}
