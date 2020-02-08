<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClinicaUpdateRequest extends FormRequest {

  private $_mensaje;
  private $_reglasx;

  public function __construct() {
    $this->_mensaje = [
        'nit.required' => 'Ingrese el nit',
        'nit.unique' => 'El nit ya se encuentra en uso',
        'nit.min' => 'El nit debe ser mínimo de 8 caracteres',
        'nombre.required' => 'Ingrese el nombre',
        'telefono.requered' => 'Ingrese número de teléfono',
        'telefono.min' => 'El teléfono debe ser mínimo de 7 caracteres',
        'estado.requered' => 'Seleccione un estado',
        'digiveri.required' => 'El dígito de verificación es requerido, digite el nit',
        'digiveri.min' => 'El dígito de verificación es de 1 caracter',
    ];
    $this->_reglasx = [
        'nombre' => 'required',
        'telefono' => ['required', 'min:7'],
        'estado' => 'required',
        'digiveri' => ['required', 'min:1'],
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
    $this->_reglasx['nit'] = ['required', 'unique:clinicas,nit,' . $this->segments()[1], 'min:8'];
    return $this->_reglasx;
  }

  public function validar() {
    $dataxxxx = $this->toArray();
    if (!isset($dataxxxx['medicamentos'])) {
      $this->_mensaje['medicame.required'] = "Debe seleccionar al menos un medicamento";
      $this->_reglasx['medicame'] = 'required';
    }
  }

}
