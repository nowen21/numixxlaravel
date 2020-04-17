<?php

namespace App\Http\Requests\Produccion;

use Illuminate\Foundation\Http\FormRequest;

class ControlpCrearRequest extends FormRequest {

  /**
   * Determine if the user is authorized to make this request.
   *
   * @return bool
   */
  public function authorize() {
    return true;
  }

  public function messages() {
    return [
        'cformula_id.required' => 'Seleccione un lote',
        'coloraci.required' => 'Indique Coloración Normal',
        'ausepart.required' => 'Indique Ausencia de Partículas',
        'ausefuga.required' => 'Indique Ausencia de Fugas',
        'ausemise.required' => 'Indique Ausencia de Miscelas/Integridad en Emulsión',
    ];
  }

  /**
   * Get the validation rules that apply to the request.
   *
   * @return array
   */
  public function rules() {
    return [
        'cformula_id' => 'required',
        'coloraci' => 'required',
        'ausepart' => 'required',
        'ausefuga' => 'required',
        'ausemise' => 'required',
    ];
  }

}
