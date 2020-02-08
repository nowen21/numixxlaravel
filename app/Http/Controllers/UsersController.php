<?php

namespace App\Http\Controllers;

use App\Clinica;
use DataTables;
use App\User;
use Caffeinated\Shinobi\Models\Role;
use App\Http\Requests\UsuariosStoreRequest;
use App\Http\Requests\UsuariosUpdateRequest;

class UsersController extends Controller {

  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index() {
    return view('users.index');
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create() {
    $roles = Role::get();
    $clinica= Clinica::combo();
    return view('users.create', compact('roles','clinica'));
  }

  public function getdata() {
    $usuarios='';
    if (auth()->user()->clinica_id == 1) {
      $usuarios=User::query();
    }else{
      $usuarios=User::query()->where('clinica_id',auth()->user()->clinica_id);
    }
    return DataTables::of($usuarios)->make(true);
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(UsuariosStoreRequest $request) {
    $user = [
        'name' =>strtoupper( $request->all()['name']),
        'email' => $request->all()['email'],
        'clinica_id' => $request->all()['clinica_id'],
        'password' => bcrypt($request->all()['password']),
    ];
    $users = User::create($user);
    // Actualizar los roles
    $users->roles()->sync($request->get('roles'));
    return redirect()->route('users.edit', $users->id)
                    ->with('info', 'Usuario guardado con exito');
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Pacientes  $pacientes
   * @return \Illuminate\Http\Response
   */
  public function show(User $user) {
    $clinica= Clinica::find($user->clinica_id);
    return view('users.show', compact('user','clinica'));
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Pacientes  $users
   * @return \Illuminate\Http\Response
   */
  public function edit(User $user) {
    $roles = Role::get();
    $clinica= Clinica::combo();
    $update='';
    return view('users.edit', compact('user', 'roles','clinica','update'));
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Pacientes  $users
   * @return \Illuminate\Http\Response
   */
  public function update(UsuariosUpdateRequest $request, User $user) {    
    // Actualizar el usuario  
    $users = [
        'name' => strtoupper($request->all()['name']),
        'clinica_id' => $request->all()['clinica_id'],
        'email' => $request->all()['email'],
        'password' => bcrypt($request->all()['password']),
    ];
    $user->update($users);
    // Actualizar los roles
    $user->roles()->sync($request->get('roles'));
    return redirect()->route('users.edit', $user->id)
                    ->with('info', 'Usuario actualizado con exito');
  }

}
