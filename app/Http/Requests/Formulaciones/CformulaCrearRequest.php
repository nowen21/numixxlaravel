<?php

namespace App\Http\Requests\Formulaciones;

use App\Models\Administracion\Rango;
use App\Models\Medicamentos\Medicame;
use Illuminate\Foundation\Http\FormRequest;


class CformulaCrearRequest extends FormRequest {

  private $_mensaje;
  private $_reglasx;

  /**
   * Determine if the user is authorized to make this request.
   *
   * @return bool
   */
  public function __construct() {
    $this->_mensaje = [
        'tiempo.required' => 'El tiempo de infusión es requerido',
        'velocidad.required' => 'La velocidad de infusión es requerida',
        'purga.required' => 'La purga es requerida',
        'peso.required' => 'El peso  es requerido',
        'aguax_id.regex' => 'El agua no puede ser negativa',
       
        'formvaci.regex' => 'Ingrese al menos un requerimiento o volumen para la formulación',
    ];
    $this->_reglasx = [
        'tiempo' => 'required',
        'velocidad' => 'required',
        'purga' => 'required',
        'peso' => 'required',
       
        'aguax_id' => 'regex:/^[0-9].+$/i',
        'formvaci' => 'regex:/^[1-9]$/i',
    ];
  }

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
    $valorneg=false;
    $medicame='';
    
    $dataxxxx=$this->toArray();
    foreach ($dataxxxx as $key=> $value){
      $campoexp= explode("_", $key);
      if(isset($campoexp[1])&&$campoexp[1]=='volu' && $value<0){
        $valorneg=true;
        $medicame.=Medicame::where('id',$dataxxxx[$campoexp[0]])->first()->nombgene.', ';
      } 
    }
    if($valorneg){
      $this->_mensaje['valorneg.required']="Los siguientes medicamentos: $medicame tienen volúmenes negativos";
      $this->_reglasx['valorneg']='required';
    }
    $minimoxx=Rango::join('rango_sis_clinica','rangos.id','=','rango_sis_clinica.rango_id')
            ->where('rango_sis_clinica.sis_clinica_id',$dataxxxx['sis_clinica_id'])->min('rangos.ranginic')
            ;
    $maximoxx=Rango::join('rango_sis_clinica','rangos.id','=','rangos.id')
            ->where('rango_sis_clinica.sis_clinica_id',$dataxxxx['sis_clinica_id'])->max('rangos.rangfina');
    $volutota=$dataxxxx['volumen']+$dataxxxx['purga'];
//    exit();
    if($minimoxx>$volutota){
      $this->_mensaje['liminfer.required']="La formulación está por debajo del rango contratado, por favor comunicarse con la admnistración de NUMIXX.S.A.S";
      $this->_reglasx['liminfer']='required';
    }
    if($maximoxx<$volutota){
      $this->_mensaje['limisupe.required']="La formulación está por encima del rango contratado, por favor comunicarse con la admnistración de NUMIXX.S.A.S";
      $this->_reglasx['limisupe']='required';
    }
  }
}
