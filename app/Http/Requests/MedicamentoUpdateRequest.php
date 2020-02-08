<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MedicamentoUpdateRequest extends FormRequest {

  private $_mensaje;
  private $_reglasx;

  public function __construct() {
    $this->_mensaje = [
        'nombgene.required' => 'El nombre es requerido',
        'nombgene.string' => 'El nombre genérico debe ser un texto',
        'nombgene.unique' => 'El nombre genérico ya existe',
        'concentr.required' => 'Ingrese la concentración',
        'unidmedi.required' => 'Ingrese la unidad de medida',
    ];
    $this->_reglasx = [
        'concentr' => 'required',
        'unidmedi' => 'required',
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
    $this->_mensaje['nombgene.required'] = 'El nombre es requerido';
    $this->_reglasx['nombgene'] = 'required|string|unique:medicamentos,nombgene,' . $this->segments()[1];
    return $this->_reglasx;
  }

  public function validar() {
    $dataxxxx = $this->toArray();        
    if (!isset($dataxxxx['npts'])) {
      $this->_mensaje['nptsxxxx.required'] = "Seleccione al menos un npt";
      $this->_reglasx['nptsxxxx'] = 'required';
    }
    if (!isset($dataxxxx['casas'])) {
      $this->_mensaje['casa_id.required'] = "Seleccione al menos una casa";
      $this->_reglasx['casa_id'] = 'required';
    }
    $formedic = \App\Formulacionmed::where('medicamento_id', $this->segments()[1])->get();
    $medicame = \App\Medicamento::where('id', $this->segments()[1])->first();
    if (count($formedic) > 0 && $medicame->clinica->id!=$dataxxxx['clinica_id']) {
      $this->_mensaje['clinexis.required'] = "No se puede cambiar la clínica al medicamento: ".$medicame->nombgene.' porque ya tiene movimiento de inventario';
      $this->_reglasx['clinexis'] = 'required';
    }
  }

}
