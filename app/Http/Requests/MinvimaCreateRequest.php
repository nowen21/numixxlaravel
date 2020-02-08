<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MinvimaCreateRequest extends FormRequest {

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
        'marca_id.required' => 'Seleccione una marca',
        'reginvim.required' => 'Ingrese el registro invima',
        'reginvim.unique' => 'El registro invima ya existe',
    ];
  }

  /**
   * Get the validation rules that apply to the request.
   *
   * @return array
   */
  public function rules() {
    return [
        'marca_id' => 'required', 
        'reginvim' => 'required|unique:minvimas'    
    ];
  }

}
