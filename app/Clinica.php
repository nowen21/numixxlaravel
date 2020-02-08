<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Clinica extends Model {

  protected $fillable = [
      'nit', 'nombre', 'telefono', 'estado', 'digiveri'
  ];

  public static function combo() {
     $lista = [];
     $clinicax='';
    if(auth()->user()->clinica_id==1){
      $clinicax=Clinica::all();
       $lista = ['' => 'Seleccione'];
    } else {
      $clinicax=Clinica::where('id',auth()->user()->clinica_id)->get();
    }
   
    foreach ($clinicax as $key => $value) {
      $lista[$value->id] = $value->nombre;
    }
    return $lista;
  }

  public function pacientes() {
    return $this->belongsToMany(Paciente::class);
  }
  public function servicios() {
    return $this->hasMany(Servicio::class);
  }
  public function medicamentos() {
    return $this->belongsToMany(Medicamento::class)->withTimestamps();
  }

}
