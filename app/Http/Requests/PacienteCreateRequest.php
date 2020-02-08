<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PacienteCreateRequest extends FormRequest {

  private $_mensaje;
  private $_reglasx;

  public function __construct() {
    $this->_mensaje = [
        'registro.required' => 'Seleccines una fecha para el registro del paciente',
        'cedula.required' => 'Ingrese el número de documento',
        'cedula.unique' => 'El número de documento  ya existe, debe comunicarse con el equipo de numixx',
        'nombres.required' => 'Ingrese el nombre',
        'apellidos.required' => 'Ingrese el apellido',
        'peso.required' => 'Ingreso el peso',
        'genero_id.required' => 'Seleccione un género',
        'eps_id.required' => 'Seleccione una eps',
        'cama.required' => 'Ingrese el número de cama',
        'edad.required' => 'Seleccione la fehca de nacimiento del paciente',
        'departamento_id.required' => 'Seleccione un departamento',
        'municipio_id.required' => 'Seleccione un municipio',
    ];
    $this->_reglasx = [
        'registro' => 'required',
        'cedula' => 'required|unique:pacientes',
        'nombres' => 'required',
        'apellidos' => 'required',
        'peso' => 'required',
        'genero_id' => 'required',
        'eps_id' => 'required',
        'cama' => 'required',
        'edad' => 'required',
        'departamento_id' => 'required',
        'municipio_id' => 'required',
        'estado_id' => 'required',
    ];
  }

  /**
   * Determine if the user is authorized to make this request.
   *
   * @return bool
   */
  public function authorize() {
    return true;
  }

  public function messages() {
    return $this->_mensaje;
  }

  /**
   * Get the validation rules that apply to the request.
   *
   * @return array
   */
  public function rules() {
    $this->validar();
    return $this->_reglasx;
  }

  public function validar() {
    $dataxxxx = $this->toArray();
  
//    if (!isset($dataxxxx['clinicas'])) {
//      $this->_mensaje['clinicax.required'] = "Debe seleccionar al menos una clínica";
//      $this->_reglasx['clinicax'] = 'required';
//    }
  }

}
