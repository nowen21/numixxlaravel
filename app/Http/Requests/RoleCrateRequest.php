<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RoleCrateRequest extends FormRequest {

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
        'name.required' => 'Ingrese el nombre del rol',
        'slug.required' => 'Ingrese el slug',
        'description.requerid' => 'Ingrese una descripción del rol',
        
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
        'slug' => 'required',
        'description' => 'required',
    ];
  }

}
