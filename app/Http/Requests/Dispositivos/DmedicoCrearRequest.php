<?php

namespace App\Http\Requests\Dispositivos;

use Illuminate\Foundation\Http\FormRequest;

class DmedicoCrearRequest extends FormRequest {

  private $_mensaje;
  private $_reglasx;

  public function __construct() {
    $this->_mensaje = [
        'nombgene.required' => 'El nombre es requerido',
        'nombgene.string' => 'El nombre genérico debe ser un texto',
        'nombgene.unique' => 'El nombre genérico ya existe',
        'concentr.required' => 'Ingrese la concentración',
        'unidmedi.required' => 'Ingrese la unidad de medida',
    ];
    $this->_reglasx = [
        
        'nombgene' => 'required|string|unique:medicames',
        'concentr' => 'required',
        'unidmedi' => 'required',
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
  
  }

}
