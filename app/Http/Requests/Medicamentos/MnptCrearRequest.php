<?php

namespace App\Http\Requests\Medicamentos;

use App\Models\Medicamentos\Mnpt;
use Illuminate\Foundation\Http\FormRequest;

class MnptCrearRequest extends FormRequest {

    private $_mensaje;
    private $_reglasx;

    public function __construct() {
        $this->_mensaje = [
            'npt_id.required' => 'Seleccione un npt',
            'randesde.required' => 'Ingrese un rango desde',
            'ranhasta.required' => 'Ingrese un rango hasta',
            'rangunid.required' => 'Ingrese un rango unidad',
        ];
        $this->_reglasx = [
            'npt_id' => 'required',
            'randesde' => 'required',
            'ranhasta' => 'required',
            'rangunid' => 'required',
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
    public function rules()
    {
        $this->validar();
        return $this->_reglasx;
  }
  public function validar() {
      $mnptxxx=Mnpt::where("randesde", $this->randesde)->where("ranhasta", $this->ranhasta)->first();
    if (isset($mnptxxx->id)) {
      $this->_mensaje['existexx.required'] = "Este rango ya existe";
      $this->_reglasx['existexx'] = 'required';
    }
    if ($this->randesde<1){
        $this->_mensaje['mayoruno.required'] = "Se requiere un rango desde mayor a uno";
        $this->_reglasx['mayoruno'] = 'required';
    }

    if ($this->randesde>=$this->ranhasta){
        $this->_mensaje['menorxxx.required'] = "Se requiere que el rango desde sea menor al rango hasta";
        $this->_reglasx['menorxxx'] = 'required';
    }
  }
}
