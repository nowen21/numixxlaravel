<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ServicioCreateRequest extends FormRequest {

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
        'nombre.required' => 'El nombre es requerido',
        'estado_id.required' => 'El estado es requerido',
        'clinica_id.required' => 'La clínica es requerida',
    ];
  }

  /**
   * Get the validation rules that apply to the request.
   *
   * @return array
   */
  public function rules() {
    return [
        'nombre' => 'required|string',
        'estado_id' => 'required',
        'clinica_id' => 'required',
    ];
  }

}
