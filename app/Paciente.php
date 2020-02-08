<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Paciente extends Model {

  protected $fillable = [
      'registro',
      'cedula',
      'nombres',
      'apellidos',
      'peso',
      'genero_id',
      'eps_id',
      'cama',
      'edad',
      'municipio_id',
      'npt_id',
      'estado_id'
  ];

  public function genero() {
    return $this->belongsTo(Genero::class);
  }

  public function eps() {
    return $this->belongsTo(Eps::class);
  }

  public function servicio() {
    return $this->belongsTo(Servicio::class);
  }
  public function servicios() {
    return $this->belongsToMany(Servicio::class)->withTimestamps();
  }

  public function clinicas() {
    return $this->belongsToMany(Clinica::class)->withTimestamps();
  }

  public function municipio() {
    return $this->belongsTo(Municipio::class);
  }

  public function npt() {
    return $this->belongsTo(Npt::class);
  }

  public function estado() {
    return $this->belongsTo(Estado::class);
  }

}
