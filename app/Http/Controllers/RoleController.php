<?php

namespace App\Http\Controllers;
use Caffeinated\Shinobi\Models\Role;
use App\Http\Requests\RoleCrateRequest;
use Caffeinated\Shinobi\Models\Permission;
class RoleController extends Controller {

  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index() {
    return view('roles.index');
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create() {  
    $permissions= Permission::get();
    return view('roles.create',compact('permissions'));
  }

  public function getdata() {
    return \DataTables::of(Role::query())->make(true);
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(RoleCrateRequest $request) {    
    $role = Role::create($request->all());
    $role->permissions()->sync($request->get('permissions'));
    return redirect()->route('roles.edit', $role->id)
                    ->with('info', 'Rol guardado con exito');
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Pacientes  $pacientes
   * @return \Illuminate\Http\Response
   */
  public function show(Role $role) {
    return view('roles.show', compact('role'));
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Role  $role
   * @return \Illuminate\Http\Response
   */
  public function edit(Role $role) {
     $permissions= Permission::get();
     $update='';
    return view('roles.edit', compact('role','permissions','update'));
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Role  $role
   * @return \Illuminate\Http\Response
   */
  public function update(RoleCrateRequest $request, Role $role) {
    // Actualizar el rol    
    $role->update($request->all());
    $role->permissions()->sync($request->get('permissions'));
    return redirect()->route('roles.edit', $role->id)
                    ->with('info', 'Rol actualizado con exito');
  }

  

}
