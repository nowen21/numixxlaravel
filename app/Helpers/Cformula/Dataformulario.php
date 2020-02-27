<?php

namespace App\Helpers\Cformula;

use App\Models\Formulaciones\Dfmlote;
use App\Models\Medicamentos\Casa;
use App\Models\Medicamentos\Medicame;


/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Dataformulario
 *
 * @author Nowen21
 */
class Dataformulario
{
  private static function getMedicamentosCasa($dataxxxx)
  {
    $medicame = Medicame::select('medicames.id', 'medicames.nombgene')
      ->join('mnpts', 'medicames.id', '=', 'mnpts.medicame_id')
      ->join('medicame_sis_clinica', 'medicames.id', '=', 'medicame_sis_clinica.medicame_id')
      ->where('mnpts.npt_id', $dataxxxx['paciente']->npt_id)
      ->where('medicame_sis_clinica.sis_clinica_id', $dataxxxx['paciente']->sis_clinica->id)
      ->where('medicames.casa_id', $dataxxxx['casaidxx'])
      ->get();

    $comboxxx = [];
    if ($dataxxxx['tipocomb']) {
      if ($dataxxxx['cabecera']) {
        if ($dataxxxx['ajaxxxxx']) {
          $comboxxx[] = ['valuexxx' => '', 'optionxx' => 'Seleccione'];
        } else {
          $comboxxx = ['' => 'Seleccione'];
        }
      }
    }
    foreach ($medicame as $registro) {
      if ($dataxxxx['tipocomb']) {
        if ($dataxxxx['ajaxxxxx']) {
          $comboxxx[] = ['valuexxx' => $registro->id, 'optionxx' => $registro->nombgene];
        } else {
          $comboxxx[$registro->id] = $registro->nombgene;
        }
      } else {
        $comboxxx[] = $registro->id;
      }
    }
    return $comboxxx;
  }
  private static function getCasaMedicamentos($dataxxxx, $casaidxx)
  {
    $tienemed = false;
    $medicame = Medicame::select('medicames.id', 'medicames.nombgene')
      ->join('mnpts', 'medicames.id', '=', 'mnpts.medicame_id')
      ->join('medicame_sis_clinica', 'medicames.id', '=', 'medicame_sis_clinica.medicame_id')
      ->where('mnpts.npt_id', $dataxxxx['paciente']->npt_id)
      ->where('medicame_sis_clinica.sis_clinica_id', $dataxxxx['paciente']->sis_clinica->id)
      ->where('medicames.casa_id', $casaidxx)
      ->first();
    if (isset($medicame->id)) {
      $tienemed = true;
    }
    return $tienemed;
  }
  public static function getPintarFormulario($dataxxxx)
  {
    $formulacion = [];
    // listar las casas que apliquen
    $casasxxx = Casa::select('casas.id', 'casas.casa','unidmedi','nameidxx')
      ->orderBy('casas.ordecasa', 'ASC')->get();
    //    // recorre las casas
    foreach ($casasxxx as $key => $value) {
      if (Dataformulario::getCasaMedicamentos($dataxxxx, $value->id)) {
        $selevalu = '';
        $requerim = '';
        //$selvalfi = '';
        $volumenx = '';
        $requtota = '';
        // saber cuales son los medicames que aplican para la lista
        $dataxxxx['casaidxx'] = $value->id;
        $dataxxxx['cabecera'] = true;
        $dataxxxx['ajaxxxxx'] = false;
        $dataxxxx['tipocomb'] = true;
        $selelist = Dataformulario::getMedicamentosCasa($dataxxxx);
        $dataxxxx['tipocomb'] = false;
        $combo_id  = Dataformulario::getMedicamentosCasa($dataxxxx);
        //$combo_id = Medicame::combo1($value->id, false, $dataxxxx['paciente'], []);
        // cuando se pinta el formulario con datos 
        if (isset($dataxxxx['furmulac']->id)) {
          // todos los medicames formulados
          foreach ($dataxxxx['furmulac']->dformulas as $valor) {
            foreach ($combo_id as $combo) {
              if ($valor->medicame_id == $combo) {
                $selevalu = $valor->medicame_id;
                $requerim = $valor->cantidad;
                $requtota = $valor->rtotal;
                $volumenx = $valor->volumen;
              }
            }
          }
        }

        $formulacion[] = [
          'casaxxxx' => $value['casa'],
          'campo_id' => $value['nameidxx'], // nombre del campo con el que se guarda
          'selelist' => $selelist,
          'selevalu' => $selevalu,
          'requerim' => $requerim,
          'requtota' => $requtota,
          'volumenx' => $volumenx,
          'valorxxx' => 4,
          'unidmedi' => $value->unidmedi,
        ];
      }
    }

    return $formulacion;
  }

  /**
   * Calcular osmolaridad y peso especifico por lote
   *
   * @access private
   * @param $formlote lotes que tiene la formulacion medica
   */
  private function osmolaridadypesoespecifico($formlote)
  {
    $osmolari = 0;
    $pesoespe = 0;
    $purgaxxx = $formlote->purga;
    // recorrer cada uno de los lotes los que se le desconto el volumen de la formulacion medica
    foreach ($formlote->mlotes as $key => $lotexxxx) {
      $volumenx = Dfmlote::where('dformula_id', $formlote->id)->where('mlote_id', $lotexxxx->id)->first()->volumenx; // volumen consumido por cada lote
      $osmolari += $volumenx / $purgaxxx * $lotexxxx->minvima->marca->osmorali; //osmolaridad por cada uno de los lotes
      $pesoespe += $volumenx / $purgaxxx * $lotexxxx->minvima->marca->pesoespe; // peso especifico por cada uno de los lotes
    }
    return ['osmolari' => $osmolari, 'pesoespe' => $pesoespe];
  }

  /**
   * Armar datasxxx con con cada una de las formulaciones medicas de la fomulacion
   *
   * @access public
   * @param $furmulac fomulacion que arma datasxxx
   */
  private function armardata($cabecera)
  {
    $formulacion = ['osmolari' => 0, 'pesoespe' => 0];
    // recorrer cada una de las formulaciones medicas
    foreach ($cabecera->formulacionmeds as $key => $formulacionmed) {
      $osmopeso = $this->osmolaridadypesoespecifico($formulacionmed);
      $formulacion[$formulacionmed->medicame->casa_id] = [
        'casaxxxx' => $formulacionmed->medicame->casa->nombre, // nombre de la casa
        'selevalu' => $formulacionmed->medicame_id, // id casa seleccionada
        'requerim' => $formulacionmed->rtotal, // requrimiento total del medicame
        'requtota' => $formulacionmed->cantidad, // cantidad digitada
        'volumenx' => $formulacionmed->volumen, // volumen del medicame solicitado
        'nombgene' => $formulacionmed->medicame->nombgene // nombre del medicame
      ];
      $formulacion['osmolari'] += $osmopeso['osmolari'] * $formulacionmed->purga;
      $formulacion['pesoespe'] += $osmopeso['pesoespe'] * $formulacionmed->purga;
    }
    return $formulacion;
  }

  public function calculos($cabecera)
  {
    $datasxxx = $this->armardata($cabecera);
    $calculos = [];
    $calculos['volutota'] = $cabecera->volumen; //volumen total
    $calculos['veloinfu'] = $cabecera->velocidad; //velocidad de infusion
    $calculos['pesoxxxx'] = $cabecera->peso; //velocidad de infusion
    $calculos['velopurg'] = $cabecera->volumen + $cabecera->purga; //velocidad de infusion
    if ($cabecera->paciente->npt_id == 3) { // adultos
      $calculos = $this->calculosadultos($calculos, $datasxxx);
    } else { // neonato y pediatrico
      $calculos = $this->calculosneopediatrico($calculos, $datasxxx);
    }
    $calculos['carbvali'] = $calculos['concarbo'] > 24.5 ? 'ADVER/R.H�?GADO GRASO' : $calculos['concarbo'] < 24.4 ? 'SEGURA' : '';
    $calculos['concprov'] = $calculos['concprot'] < 1 ? 'NO ESTABLE' : 'ESTABLE';
    $calculos['conclipv'] = ($calculos['conclipi'] < 1 && $calculos['conclipi'] != 0) ? 'NO ESTABLE' : 'ESTABLE';
    $calculos['osmolari'] = $datasxxx['osmolari'] / $calculos['velopurg']; //OSMOLARIDAD (mOsm / L) 
    $calculos['osmolarv'] = $calculos['osmolari'] > 700 ? 'VIA CENTRAL' : 'VIA PERIFÉRICA';
    $calculos['calcfosv'] = $calculos['calcfosf'] < 2 ? 'SEGURA' : 'NO SEGURA';
    $calculos['calototv'] = $calculos['calotota'] / $calculos['calotota'] * 100;
    $calculos['calocarv'] = $calculos['calocarb'] / $calculos['calotota'] * 100;
    $calculos['calolipv'] = $calculos['calolipi'] / $calculos['calotota'] * 100;
    $calculos['caloprov'] = $calculos['caloprot'] / $calculos['calotota'] * 100;
    $calculos['pesoteor'] = $datasxxx['pesoespe']; //PESO TEORICO  (GRAMOS)
    return $calculos;
  }

  private function casa($idcasaxx, $datasxxx)
  {
    $casasxxx = new Casas();
    $requtota = 0;


    $medicame = $datasxxx[$idcasaxx];
    switch ($idcasaxx) {
      case 1: // casa de los aminoacidos
        $requtota = $casasxxx->aminoacidos($medicame, $datasxxx);
        break;
      case 3: // casa carbohidratos
        $requtota = $casasxxx->carbohidratos($medicame, $datasxxx);
        break;
      case 16: // casa lipidos
        $requtota = $casasxxx->lipidos($medicame, $datasxxx);
        break;
    }
    return $requtota;
  }

  private function calculosadultos($calculos, $datasxxx)
  {
    //VOLUMEN DE LA MULTIVITAMIANA
    $volumult = isset($datasxxx[17]['volumenx']) ? $datasxxx[17]['volumenx'] : 0;

    $glutamin = isset($datasxxx[10]) ? $datasxxx[10]['requerim'] : 0;

    // CONCENTRACION DE PROTEINAS (%)	
    $aminoaci = $this->casa(1, $datasxxx)['requerim'] + $glutamin;
    $calculos['concprot'] = (($aminoaci) / $calculos['volutota']) * 100;
    // CONCENTRACION DE CARBOHIDRATO (%)
    if (isset($datasxxx[3])) {
      $carbohid = $this->casa(3, $datasxxx);
      $calculos['concarbo'] = ($carbohid['requerim'] / $calculos['volutota']) * 100;
    } else {
      $calculos['concarbo'] = 0;
      $carbohid['requerim'] = 0;
    }
    //CONCENTRACIÓN DE L�?PIDOS (%)       (>1%)
    $lipidosx = $this->casa(16, $datasxxx)['requerim'];
    $calculos['conclipi'] = (($lipidosx + $volumult / 5) / $calculos['volutota']) * 100;
    //GRAMOS TOTALES DE NITROGENO
    $calculos['gramtota'] = $aminoaci / 6.25;
    //CALORIAS PROTEICAS 						2%
    $calculos['caloprot'] = $aminoaci * 4;
    //CALORIAS CARBOHIDRATOS 						9%
    $calculos['calocarb'] = $carbohid['requerim'] * 3.4;
    //CALORIAS LIPIDOS 89%
    $calculos['calolipi'] = $lipidosx * 9 + $volumult * 1.12;
    //CALORIAS TOTALES 						100%
    $calculos['calotota'] = $calculos['caloprot'] + $calculos['calocarb'] + $calculos['calolipi'];
    //relación: Cal No proteícas/g Nitrogeno 
    if ($calculos['gramtota'] == 0) {
      $calculos['protnitr'] = 0;
    } else {
      $calculos['protnitr'] = ($calculos['calolipi'] + $calculos['calocarb']) / $calculos['gramtota'];
    }

    //Relación: Cal No proteícas/g A.A 
    if ($aminoaci == 0) {
      $calculos['proteica'] = 0;
    } else {
      $calculos['proteica'] = ($calculos['calolipi'] + $calculos['calocarb']) / $aminoaci;
    }

    //Calorías totales/Kg./día 
    $calculos['caltotkg'] = $calculos['calotota'] / $calculos['pesoxxxx'];
    //RELACIÓN CALCIO/FOSFÓRO                 (<2) 
    $calculos['calcfosf'] = ($datasxxx[6]['requtota'] * 9.3 / 1 / $calculos['volutota'] * 1000 / 40) * ($this->casa(2, $datasxxx)['volumenx'] * 31 / 1 / $calculos['volutota'] * 1000 / 31) / 100;

    return $calculos;
  }

  private function calculosneopediatrico($calculos, $datasxxx)
  {
    //VOLUMEN DE LA MULTIVITAMIANA
    $volumult = $datasxxx[17]['volumenx'];
    // CONCENTRACION DE PROTEINAS (%)	
    $aminoaci = $this->casa(1, $datasxxx)['requerim'];
    $calculos['concprot'] = (($aminoaci) / $calculos['volutota']) * 100;
    // CONCENTRACION DE CARBOHIDRATO (%)
    if (isset($datasxxx[3])) {
      $carbohid = $this->casa(3, $datasxxx);
      $calculos['concarbo'] = ($carbohid['requerim'] / $calculos['volutota']) * 100;
    } else {
      $calculos['concarbo'] = 0;
      $carbohid['requerim'] = 0;
    }
    //CONCENTRACIÓN DE L�?PIDOS (%)       (>1%)
    $lipidosx = $this->casa(16, $datasxxx)['requerim'];
    $calculos['conclipi'] = (($lipidosx + $volumult / 5) / $calculos['volutota']) * 100;
    //GRAMOS TOTALES DE NITROGENO
    $calculos['gramtota'] = $aminoaci / 6.25;
    //CALORIAS PROTEICAS 						2%
    $calculos['caloprot'] = $aminoaci * 4;
    //CALORIAS CARBOHIDRATOS 						9%
    $calculos['calocarb'] = $carbohid['requerim'] * 3.4;
    //CALORIAS LIPIDOS 89%
    $calculos['calolipi'] = $lipidosx * 9 + $volumult * 1.12;
    //CALORIAS TOTALES 						100%
    $calculos['calotota'] = $calculos['caloprot'] + $calculos['calocarb'] + $calculos['calolipi'];
    //relación: Cal No proteícas/g Nitrogeno 
    $calculos['protnitr'] = ($calculos['calolipi'] + $calculos['calocarb']) / $calculos['gramtota'];
    //Relación: Cal No proteícas/g A.A 
    $calculos['proteica'] = ($calculos['calolipi'] + $calculos['calocarb']) / $aminoaci;
    //Calorías totales/Kg./día 
    $calculos['caltotkg'] = $calculos['calotota'] / $calculos['pesoxxxx'];
    //RELACIÓN CALCIO/FOSFÓRO                 (<2) 
    $calculos['calcfosf'] = ($datasxxx[6]['requtota'] * 9.3 / 1 / $calculos['volutota'] * 1000 / 40) * ($this->casa(2, $datasxxx)['volumenx'] * 31 / 1 / $calculos['volutota'] * 1000 / 31) / 100;

    return $calculos;
  }
}
