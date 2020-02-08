<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UsuariosUpdateRequest extends FormRequest {

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
        'name.required' => 'El nombre del usuario es requerido',
        'email.required' => 'El E-mail es requerido',
        'email.unique' => 'El E-mail ya se encuentra en uso',
        'clinica_id.required' => 'La IPS es requerida',
    ];
  }

  /**
   * Get the validation rules that apply to the request.
   *
   * @return array
   */
  public function rules() {
    return [
        'name' => 'required',
        'email' => ['required',
            'unique:users,email,' . $this->segments()[1]],
        'clinica_id' => 'required',
    ];
  }

}
