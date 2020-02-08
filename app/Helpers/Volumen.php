<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Helpers;

use App\Helpers\Requetotal;

/**
 * Description of Volumen
 *
 * @author Nowen21
 */
class Volumen {

  public function cantidad($dataxxxx) {
    $cantidad = 0;
    switch ($dataxxxx['medicame']) {
      case 9:
      case 10:
        $cantidad = $dataxxxx['otrofosf'];
        break;
      case 26: //echo $dataxxxx['multivit'];
        if ($dataxxxx['npt_idxx'] == 3) {
          if ($dataxxxx['multivit'] != 17) {
            $cantidad = $dataxxxx['multivi2'];
          }
        } else {
          $cantidad = $dataxxxx['multvolu'];
        }
        break;
      case 27:
      case 28:
        $cantidad = $dataxxxx['multivi2'];
        break;
    }
    return $cantidad;
  }

  public function volumen($dataxxxx) {
    $cantidad = $this->cantidad($dataxxxx);
    $formulax = [];
    $nrequtot = new Requetotal;
    $requtota = $nrequtot->requetotal($dataxxxx, $cantidad)['rtotal'];
    $formulax[1] = ['volumen' => ( $requtota * 10)]; //AMINOÁCIDOS ADULTOS 10% S/E
    $formulax[2] = ['volumen' => ( $requtota * 6.7)]; //AMINOÁCIDOS ADULTOS 15% S/E
    $formulax[3] = ['volumen' => ( $requtota * 10)]; //AMINOÁCIDO PEDIÁTRICO
    $formulax[4] = ['volumen' => $requtota]; //FOSFATO -  /PARENTERAL (GLICEROFOSFATO DE SODIO SODIO 2 MEQ ML  FÓSFORO 1 MM ML      
    $formulax[5] = ['volumen' => $requtota / 2.6]; //FOSFATO  PARENTERAL  (FOSFATO DE POTASIO CORPAUL POTASIO 3,8 MEQ/ML - FÓFORO 2,6 MM/ML)     
    $formulax[6] = ['volumen' => $requtota]; //FOSFATO  PARENTERAL  (FOSFATO DE POTASIO PISA POTASIO 2 MEQ/ML - FÓSFORO 1 MM/ML)      
    $formulax[7] = ['volumen' => $requtota * 2]; //CARBOHIDRATOS  DAD 50%     
    $formulax[8] = ['volumen' => $requtota * 10]; //CARBOHIDRATOS  DAD 10%   
    $formulax[9] = ['volumen' => $requtota / 2]; //SODIO CLORURO
// calcular las otras formulas de potasio


    $formulax[10] = ['volumen' => $requtota / 2]; //POTASIO CLORURO

    if ($dataxxxx['npt_idxx'] == 3) {
      $formulax[11] = ['volumen' => $requtota / 9.2]; //CALCIO GLUCONATO 10%  
    } else {
      $formulax[11] = ['volumen' => $requtota / 100]; //CALCIO GLUCONATO 10% 
    }
    if ($dataxxxx['npt_idxx'] == 3) {
      $formulax[12] = ['volumen' => $requtota / 20]; //MAGNESIO SULFATO 20%
    } else {
      $formulax[12] = ['volumen' => $requtota / 200]; //MAGNESIO SULFATO 20%  
    }

    $formulax[13] = ['volumen' => $requtota / 0.33]; //ELEMENTOS TRAZA. ZINC (MGZN/DIA). TRACUT
    $formulax[14] = ['volumen' => $requtota / 0.654]; //Elementos Traza. Zinc (mgZn/dia). Addame
    $formulax[15] = ['volumen' => $requtota]; //ELEMENTOS TRAZA. ZINC (MGZN/DIA). CORPAU     
    $formulax[16] = ['volumen' => $requtota / 250]; //ELEMENTOS TRAZA. ZINC (MCGZN/KG/DIA). PEDITRACE 250 MCGZN/ML     
    $formulax[17] = ['volumen' => $requtota]; //MULTIVITAMINAS CERNEVIT 105 MCG VITAMINA
    $formulax[18] = ['volumen' => $requtota]; //MULTIVITAMINAS. VITALIPID ADULTO  99 MCG      
    $formulax[19] = ['volumen' => $requtota]; //MULTIVITAMINAS. SOLUVIT 40 MCG AC. FOLIC

    $formulax[20] = ['volumen' => $requtota * 5]; //ALANIL-GLUTAMINA. ALANIL-GLUTAMINA 20%.

    $formulax[21] = ['volumen' => $requtota / 100]; //VITAMINA C 500 MG/5ML     
    $formulax[22] = ['volumen' => $requtota]; //COMPLEJO B
    //echo ' => '.$requtota;
    $formulax[23] = ['volumen' => $requtota / 100]; //TIAMINA 100 MG/ ML
    $formulax[24] = ['volumen' => $requtota]; //ÁCIDO FÓLICO
    $formulax[25] = ['volumen' => $requtota * 0.1]; //VITAMINA K  
    // realizar el calculo para los lipidos
    switch ($dataxxxx['medicame']) {
      case 26://LIPIDOS MCT/LCT 20%
      case 27://LIPIDOS MCT/LCT/ Ω3 20%
      case 28://OMEGAVEN Ω3 10%
        $resta = 0;
        $factor = 5; //echo $cantidad;
        if ($cantidad > 0) { //echo $dataxxxx['npt_idxx'];
          if ($dataxxxx['npt_idxx'] == 3) { //echo $cantidad;
            $resta = $cantidad / 0.099;
          } else {
            $resta = $cantidad;
          }
        }
        if ($dataxxxx['medicame'] == 28) {
          $factor = 10;
        } //echo $requtota .' => '.$resta.' => '.$factor;
        $volumen = ($requtota - 0.1 * $resta) * $factor;
        $formulax[$dataxxxx['medicame']] = ['volumen' => $volumen]; //f23 f24 f25  
        break;
    }
    $formulax[29] = ['volumen' => $requtota]; //MULTIVITAMINA VITALIPID INFANT  230 UI VITAMINA A/ML  
    
    //return ['volumen' => number_format($formulax[$dataxxxx['medicame']]['volumen'], 2, '.', '')];
    return ['volumen' => number_format($formulax[$dataxxxx['medicame']]['volumen'], 2, '.', '')];
  }

}
