<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TerminadoCrateRequest extends FormRequest {

  private $_mensaje;
  private $_reglasx;

  public function __construct() {
    $this->_mensaje = [
        'completo.required' => 'Datos completos correctos en la etiqueta es requerido',
        'particul.required' => 'Ausencia de Partículas es requerido',
        'integrid.required' => 'Integridad de la bolsa o empaque primario es requerido',
        'contenid.required' => 'Contenido/Volumen Completo es requerido',
        'fugasxxx.required' => 'Ausencia de Fugas es requerido',
        'miscelas.required' => 'Ausencia de Miscelas/Integridad en Emulsión es requerido',
        'burbujas.required' => 'Ausencia de burbujas es requerido',
        'document.required' => 'Documentación completa es requerido',
        'teoricox.required' => 'Peso teórico es requerido',
        'realxxxx.required' => 'Peso real es requerido',
        'limitesx.required' => 'Peso dentro límites establecidos es requerido',
        'concepto.required' => 'El Concepto es requerido',
        'proceso_id.required' => 'Seleccione un proceso',
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
        'teoricox' => 'required',
        'realxxxx' => 'required',
        'limitesx' => 'required',
        'concepto' => 'required',
        'proceso_id' => 'required',
    ];
  }

  /**
   * Determine if the user is authorized to make this request.
   *
   * @return bool
   */
  public function authorize() {
    return true;
  }

  public function messages() {

    return $this->_mensaje;
  }

  /**
   * Get the validation rules that apply to the request.
   *
   * @return array
   */
  public function rules() {
    $this->validar();
    return $this->_reglasx;
  }

  private function limitexx($porcenta, $dataxxxx) {
    $realxxxx = $dataxxxx['realxxxx'];
    $teoricox = $dataxxxx['teoricox'];
    $limitexx = $teoricox * $porcenta / 100;

    if ($realxxxx < $teoricox) {
      if ($teoricox - $realxxxx > $limitexx) {
        $this->_reglasx['limitexx'] = 'required';
        $this->_mensaje['limitexx.required'] = 'La NPT no cumple con el peso requerido, revisar de nuevo';
      }
    }
    if ($realxxxx > $teoricox) {
      if ($realxxxx - $teoricox > $limitexx) {
        $this->_reglasx['limitexx'] = 'required';
        $this->_mensaje['limitexx.required'] = 'La NPT no cumple con el peso requerido, revisar de nuevo';
      }
    }
  }

  public function validar() {
    $dataxxxx = $this->toArray();
    $procesox = \App\Proceso::where('id', $dataxxxx['proceso_id'])->first();
    switch ($procesox->formulacione->paciente->npt_id) {
      case 3:
        $this->limitexx(7, $dataxxxx);
        break;
      case 2:
      case 1:
        $this->limitexx(5, $dataxxxx);
        break;
    }
  }

}
