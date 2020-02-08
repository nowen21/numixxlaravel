<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CasaCreateRequest extends FormRequest {

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
        'nombre.required' => 'El nombre de la casa es requerido',
        'nombre.string' => 'El nombre debe ser un texto',
        'nombre.unique' => 'El la casa ya existe',        
        'nameidxx.required' => 'El id del campo es requerido',        
        'nameidxx.unique' => 'El id del campo ya existe',             
        'nameidxx.alpha' => 'El id del campo debe ser texto',        
    ];
  }

  /**
   * Get the validation rules that apply to the request.
   *
   * @return array
   */
  public function rules() {
    return [
        'nombre' => 'required|string|unique:casas',
        'nameidxx' => 'required|unique:casas|alpha',
    ];
  }

}
