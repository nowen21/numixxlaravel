<?php

namespace App\Http\Requests\Dispositivos;

use App\Models\Formulaciones\Dformula;
use App\Models\Medicamentos\Medicame;
use Illuminate\Foundation\Http\FormRequest;

class DmedicoEditarRequest extends FormRequest {

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
    $this->_mensaje['nombgene.required'] = 'El nombre es requerido';
    $this->_reglasx['nombgene'] = 'required|string|unique:medicames,nombgene,' . $this->segments()[2];
    return $this->_reglasx;
  }

  public function validar() {
    
  }

}
