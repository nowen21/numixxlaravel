<?php

namespace App\Http\Requests\Produccion;

use App\Traits\Produccion\TerminadoTrait;
use Illuminate\Foundation\Http\FormRequest;

class TerminadoCrearRequest extends FormRequest
{
  use TerminadoTrait;
  private $_mensaje;
  private $_reglasx;

  public function __construct()
  {
    $this->_mensaje = [
      'completo.required' => 'Datos completos correctos en la etiqueta es requerido',
      'particul.required' => 'Ausencia de Partículas es requerido',
      'integrid.required' => 'Integridad de la bolsa o empaque primario es requerido',
      'contenid.required' => 'Contenido/Volumen Completo es requerido',
      'fugasxxx.required' => 'Ausencia de Fugas es requerido',
      'miscelas.required' => 'Ausencia de Miscelas/Integridad en Emulsión es requerido',
      'burbujas.required' => 'Ausencia de burbujas es requerido',
      'document.required' => 'Documentación completa es requerido',
      'teorico_.required' => 'Peso teórico es requerido',
      'realxxx_.required' => 'Peso real es requerido',
      'limitesx.required' => 'Peso dentro límites establecidos es requerido',
      'concepto.required' => 'El Concepto es requerido',
      'cformula_id.required' => 'Seleccione una formulación',
    ];
    $this->_reglasx = [
      'completo' => 'required',
      'particul' => 'required',
      'integrid' => 'required',
      'contenid' => 'required',
      'fugasxxx' => 'required',
      'miscelas' => 'required',
      'burbujas' => 'required',
      'document' => 'required',
      'teorico_' => 'required',
      'realxxx_' => 'required',
      'limitesx' => 'required',
      'concepto' => 'required',
      'cformula_id' => 'required',
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
    $dataxxxx = $this->validar(['pesoteor'=>$this->toArray()['teorico_'],'pesoreal'=>$this->toArray()['realxxx_']]);
    if ($dataxxxx['valuexxx'] == 1) {
      $this->_reglasx['limitexx'] = 'required';
      $this->_mensaje['limitexx.required'] = $dataxxxx['messagex'];
    }
    return $this->_reglasx;
  }
}
