<?php

namespace App\Http\Requests\Produccion;

use App\Models\Formulaciones\Cformula;
use App\Models\Medicamentos\Mlote;
use Illuminate\Foundation\Http\FormRequest;

class RevisionEditarRequest extends FormRequest
{

  private $_mensaje;
  private $_reglasx;

  public function __construct()
  {
    $this->_mensaje = [];
    $this->_reglasx = [];
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
    $medicame = '';
    $validarx = 0;
    $datallex = Cformula::find($this->segments()[2])->dformulas;
    foreach ($datallex as $key => $dformula) {
      $sumaxxxx = Mlote::join('minvimas', 'mlotes.minvima_id', '=', 'minvimas.id')
        ->join('mmarcas', 'minvimas.mmarca_id', '=', 'mmarcas.id')
        ->where('mlotes.inventar', '>', '0')
        ->where('mlotes.sis_esta_id', 1)
        ->where('mmarcas.sis_esta_id', 1)
        ->where('minvimas.sis_esta_id', 1)
        ->where('mmarcas.medicame_id', $dformula->medicame_id)

        ->sum('mlotes.inventar');

      if ($dformula->purga > $sumaxxxx) {
        $medicame .= $dformula->medicame->casa->casa . ', ';
        $validarx += 1;
      }
    }
    if ($validarx > 0) {
      $this->_reglasx['validarx'] = 'required';
      $this->_mensaje['validarx.required'] = $validarx == 1 ? 'El siguete medicamento: ' .
        $medicame . ' no cuenta con inventario suficiente' : 'Los siguetes medicamentos: ' .
        $medicame . ' no cuenta conn inventario suficiente';
    }
  }
}
