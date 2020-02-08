<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DispensacionCreateRequest extends FormRequest {

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
        'producto.required' => 'El producto es requerido',
        'formvaci.regex' => 'Ingrese al menos una cantidad alistada para un medicamento o dipositivo médico',
        
    ];
  }

  /**
   * Get the validation rules that apply to the request.
   *
   * @return array
   */
  public function rules() {
    return [
        'producto' => 'required',
        'formvaci' => 'regex:/^[1-9]$/i',
    ];
  }

}
