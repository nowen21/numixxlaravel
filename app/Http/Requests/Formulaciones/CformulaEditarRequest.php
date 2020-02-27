<?php

namespace App\Http\Requests\Formulaciones;

use App\Models\Administracion\Rango;
use App\Models\Medicamentos\Medicame;
use Illuminate\Foundation\Http\FormRequest;

class CformulaEditarRequest extends FormRequest {

  private $_mensaje;
  private $_reglasx;

  public function __construct() {
    $this->_reglasx = [
        'tiempo' => 'required',
        'velocidad' => 'required',
        'purga' => 'required',
        'peso' => 'required',
        'sis_clinica_id' => 'required',
        'formvaci' => 'regex:/^[1-9]$/i',
    ];
    $this->_mensaje = [
        'tiempo.required' => 'El tiempo de infusión es requerido',
        'velocidad.required' => 'La velocidad de infusión es requerida',
        'purga.required' => 'La purga es requerida',
        'peso.required' => 'El peso  es requerido',
        'sis_clinica_id.required' => 'La clínica es requerida',
        'formvaci.regex' => 'Ingrese al menos un requerimiento o volumen para la formulación',
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

  public function validar() {
    $valorneg = false;
    $medicame = '';

    $dataxxxx = $this->toArray();
    foreach ($dataxxxx as $key => $value) {
      $campoexp = explode("_", $key);
      if (isset($campoexp[1]) && $campoexp[1] == 'volu' && $value < 0) {
        $valorneg = true;
        echo $campoexp[0];
        $medicame .= Medicame::where('id', $dataxxxx[$campoexp[0]])->first()->nombgene . ', ';
      }
    }
    if ($valorneg) {
      $this->_mensaje['valorneg.required'] = "Los siguientes medicamentos: $medicame tienen volúmenes negativos";
      $this->_reglasx['valorneg'] = 'required';
    }

    $minimoxx = Rango::join('rango_sis_clinica', 'rangos.id', '=', 'rango_sis_clinica.rango_id')
                    ->where('rango_sis_clinica.sis_clinica_id', $dataxxxx['sis_clinica_id'])->min('rangos.ranginic')
    ;
    $maximoxx = Rango::join('rango_sis_clinica', 'rangos.id', '=', 'rangos.id')
                    ->where('rango_sis_clinica.sis_clinica_id', $dataxxxx['sis_clinica_id'])->max('rangos.rangfina');
    $volutota = $dataxxxx['volumen'] + $dataxxxx['purga'];
//    exit();
    if ($minimoxx > $volutota) {
      $this->_mensaje['liminfer.required'] = "La formulación está por debajo del rango contratado, por favor comunicarse con la admnistración de NUMIXX.S.A.S";
      $this->_reglasx['liminfer'] = 'required';
    }
    if ($maximoxx < $volutota) {
      $this->_mensaje['limisupe.required'] = "La formulación está por encima del rango contratado, por favor comunicarse con la admnistración de NUMIXX.S.A.S";
      $this->_reglasx['limisupe'] = 'required';
    }
  }

}
