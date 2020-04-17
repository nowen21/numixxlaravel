<?php

namespace App\Http\Requests\Pacientes;

use App\Models\Pacientes\Paciente;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class PacienteCrearRequest extends FormRequest
{

  private $_mensaje;
  private $_reglasx;

  public function __construct()
  {
    $this->_mensaje = [
      'registro.required' => 'Seleccines una fecha para el registro del paciente',
      'cedula.required' => 'Ingrese el número de documento',
      'cedula.unique' => 'El número de documento  ya existe, debe comunicarse con el equipo de numixx',
      'nombres.required' => 'Ingrese el nombre',
      
      'peso.required' => 'Ingreso el peso',
      'genero_id.required' => 'Seleccione un género',
      'ep_id.required' => 'Seleccione una eps',
      'cama.required' => 'Ingrese el número de cama',
      'fechnaci.required' => 'Seleccione la fehca de nacimiento del paciente',
      'municipio_id.required' => 'Seleccione un municipio',
    ];
    $this->_reglasx = [
      'registro' => 'required',
      'cedula' => 'required|unique:pacientes',
      'nombres' => 'required',
      
      'peso' => 'required',
      'genero_id' => 'required',
      'ep_id' => 'required',
      'cama' => 'required',
      'fechnaci' => 'required',
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
    return $this->_reglasx;
  }

  public function validar()
  {
    $otroregi = Paciente::where('sis_clinica_id', Auth::user()->sis_clinica_id)->where('cedula', $this->cedula)->first();
    if (isset($otroregi->id)) {
      $this->_reglasx['cedula'][1] = 'unique:pacientes';
    }
  }
}
