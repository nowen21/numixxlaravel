<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Formulacione extends Model {

  protected $fillable = [
      'paciente_id',
      'clinica_id',
      'tiempo',
      'volumen',
      'velocidad',
      'purga',
      'total',
      'peso',
      'userprep',
      'userproc',
      'userlibe',
      'ordeprod',
      'estado_id',
      'usercrea',
      'userupda',
  ];

  public static function combo($casa, $medicamento) {
    $medic = '';
    $lista = ['' => 'Seleccione'];
    if (count($medicamento) > 0) {
      $medic = Medicamento::whereIn('id', $medicamento)->get();
    } else {
      $medic = Medicamento::where(['idcasa' => $casa])->get();
    }
    foreach ($medic as $key => $value) {
      $lista[$value->id] = $value->nombre;
    }
    return $lista;
  }

  public function formulacionactual($paciente, $clinica) {
    $respuest = false;
    $formulac=Formulacione::
    where('paciente_id', $paciente)
    ->where('clinica_id', $clinica)
    ->where('created_at', 'like', date('Y-m-d', time()) . "%")->first();
    if (isset($formulac->id)) {
      $respuest = true;
    }
    return $respuest;
  }

  public function formulacionmeds() {
    return $this->hasMany(Formulacionmed::class);
  }

  public function paciente() {
    return $this->belongsTo(Paciente::class);
  }

  public function clinica() {
    return $this->belongsTo(Clinica::class);
  }

  public function procesos() {
    return $this->hasMany(Proceso::class);
  }
  public function proceso() {
    return $this->belongsTo(Proceso::class);
  }

  public static function combolote($valorxxx = false) {
    $listaxxx = 0;
    $formulac = Formulacione::where('userprep','>', 0)->where('userproc', 0)->where('created_at', 'like', date('Y-m-d', time()) . "%")->get();
    if ($valorxxx) {
      $listaxxx = count($formulac);
    } else {
      if(count($formulac)==0){
        $listaxxx = ['' => 'No hay preparaciones en este momento, vuelva a intentar más tarde'];
      }else{
        $listaxxx = ['' => 'Seleccione'];
      }
      
      foreach ($formulac as $value) {
        $listaxxx[$value->id] = $value->id;
      }
    }
    return $listaxxx;
  }
  public function estado() {
    return $this->belongsTo(Estado::class);
  }
  public function ordene() {
    return $this->belongsTo(Ordene::class);
  }
  public function alrtas() {
    return $this->hasMany(Alerta::class);
  }  
  
}
