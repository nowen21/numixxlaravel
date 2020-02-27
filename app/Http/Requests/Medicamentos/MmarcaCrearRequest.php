<?php

namespace App\Http\Requests\Medicamentos;

use Illuminate\Foundation\Http\FormRequest;

class MmarcaCrearRequest extends FormRequest {

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
        'nombcome.required' => 'El nombre comercial es requerido',
        'nombcome.unique' => 'El nombre comercial ya existe',
        'nombcome.regex' => 'Los caracteres del nombre comercial no son correctos',
        'nombcome.string' => 'El nombre debe ser un texto',
        'osmorali.required' => 'Ingrese la osmoralidad',
        'osmorali.integer' => 'La osmoralidad es numérica',
        'pesoespe.required' => 'El peso específico es requerido',
        'formfarm.required' => 'La forma farmaceútica es requerida',
        'marcaxxx.required' => 'Ingrese la marca',
    ];
  }

  /**
   * Get the validation rules that apply to the request.
   *
   * @return array
   */
  public function rules() {
    return [
        'nombcome' => 'required|string|regex:/^[a-zA-ZñÑáéíóúÁÉÍÓÚ\/ ()%0-9-,Ω.\s]+$/|unique:mmarcas', 
        'osmorali' => 'required', 
        'pesoespe' => 'required', 
        'formfarm' => 'required',
        'marcaxxx' => 'required',
    ];
  }

}
