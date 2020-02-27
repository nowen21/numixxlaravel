<?php

namespace App\Http\Requests\Clinica;

use App\Models\Administracion\Servicio;
use Illuminate\Foundation\Http\FormRequest;

class ServicioCrearRequest extends FormRequest
{
  private $_mensaje;
  private $_reglasx;

  public function __construct()
  {

    $this->_mensaje = [
      'servicio.required' => 'Ingrese el nombre del servicio',
    ];
    $this->_reglasx = [
      'servicio' =>
      [
        'required',
        'string' //y todos las validaciones a que haya lugar separadas por coma
      ],

    ];
  }
  /**
   * Determine if the user is authorized to make this request.
   *
   * @return bool
   */
  public function authorize()
  {
    return true;
  }

  public function messages()
  {
    return $this->_mensaje;
  }

  /**
   * Get the validation rules that apply to the request.
   *
   * @return array
   */
  public function rules()
  {
    $this->validar();
    return $this->_reglasx;
  }


  public function validar()
  {
    $servicio = Servicio::where('sis_clinica_id', $this->segments()[2])
      ->where('servicio', $this->servicio)
      ->first();
    if (isset($servicio->id)) {
      $this->_mensaje['yaexiste.required'] = 'El nombre del servicio existe';
      $this->_reglasx['yaexiste']='required';
    }
  }
}
