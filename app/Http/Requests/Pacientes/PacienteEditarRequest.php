<?php

namespace App\Http\Requests\Pacientes;

use App\Models\Pacientes\Paciente;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class PacienteEditarRequest extends FormRequest
{

  private $_mensaje;
  private $_reglasx;

  public function __construct()
  {
    $this->_mensaje = [
      'registro.required' => 'Seleccines una fecha para el registro del paciente',
      'cedula.unique' => 'El número de documento  ya existe, debe comunicarse con el equipo de numixx',
      'nombres.required' => 'Ingrese el nombre',
      'apellidos.required' => 'Ingrese el apellido',
      'peso.required' => 'Ingreso el peso',
      'genero_id.required' => 'Seleccione un género',
      'ep_id.required' => 'Seleccione una eps',
      'cama.required' => 'Ingrese el número de cama',
      'fechnaci.required' => 'Seleccione la fecha de naciemiento del paciente',
      'departamento_id.required' => 'Seleccione un departamento',
      'municipio_id.required' => 'Seleccione un municipio',
    ];
    $this->_reglasx = [
      'registro' => 'required',
      'nombres' => 'required',
      'apellidos' => 'required',
      'peso' => 'required',
      'genero_id' => 'required',
      'ep_id' => 'required',
      'cama' => 'required',
      'fechnaci' => 'required',
      'departamento_id' => 'required',
      'municipio_id' => 'required',
    ];
  }

  /**
   * Determine if the user is authorized to make this request.
   *
   * @return bool
   */
  public function authorize()
  {
    return true;
  }

  public function messages()
  {
    return $this->_mensaje;
  }

  /**
   * Get the validation rules that apply to the request.
   *
   * @return array
   */
  public function rules()
  {
    $this->validar();
    $this->_mensaje['cedula.required'] = 'Ingrese el número de documento';
    $this->_reglasx['cedula'][0] = 'required';

    return $this->_reglasx;
  }

  public function validar()
  {
    
    $registro = Paciente::where('id', $this->segments()[2])->first();
    $otroregi = Paciente::where('sis_clinica_id', Auth::user()->sis_clinica_id)->where('cedula', $this->cedula)->first();
    if (isset($registro->id) && isset($otroregi->id)) {
      if ($registro->id != $otroregi->id) {
        $this->_reglasx['cedula'][1] = 'unique:pacientes,cedula,' . $this->segments()[2];
      }
    }
  }
}
