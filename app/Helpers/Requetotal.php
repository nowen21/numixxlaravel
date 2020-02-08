<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Helpers;

class Requetotal {

  public function requetotal($dataxxxx, $otrmecan) {
    $formulax = [];
    $formulax[1] = ['rtotal' => $dataxxxx['pesoxxxx'] * $dataxxxx['requdiar']]; //f1 amino 10
    $formulax[2] = ['rtotal' => $dataxxxx['pesoxxxx'] * $dataxxxx['requdiar']]; //f2 amino 15
    $formulax[3] = ['rtotal' => $dataxxxx['pesoxxxx'] * $dataxxxx['requdiar']]; //f2 amino 15
    if ($dataxxxx['npt_idxx'] == 3) {
      $formulax[4] = ['rtotal' => $dataxxxx['requdiar']]; //f3 fosfato glicerofosfato        
      $formulax[5] = ['rtotal' => $dataxxxx['requdiar']]; //f4 fosfato corpaul        
      $formulax[6] = ['rtotal' => $dataxxxx['requdiar']]; //f5 fostao pisa  
    } else {
      $formulax[4] = ['rtotal' => $dataxxxx['pesoxxxx'] * $dataxxxx['requdiar']]; //f3 fosfato glicerofosfato        
      $formulax[5] = ['rtotal' => $dataxxxx['pesoxxxx'] * $dataxxxx['requdiar']]; //f4 fosfato corpaul        
      $formulax[6] = ['rtotal' => $dataxxxx['pesoxxxx'] * $dataxxxx['requdiar']]; //f5 fostao pisa  
    }

    $formulax[7] = ['rtotal' => $dataxxxx['requdiar'] * $dataxxxx['pesoxxxx'] * 1.44]; //f6 carbohidrato 50        
    $formulax[8] = ['rtotal' => $dataxxxx['requdiar'] * $dataxxxx['pesoxxxx'] * 1.44]; //f7 carbohidrato 10 
    $restaxxx = 0;
    if ($dataxxxx['fosfatox'] == 4) {
      if ($dataxxxx['npt_idxx'] == 3) {
        $restaxxx = $otrmecan * 2;
      } else {
        $restaxxx = $otrmecan * $dataxxxx['pesoxxxx'] * 2;
      }
    }
    $formulax[9] = ['rtotal' => ($dataxxxx['pesoxxxx'] * $dataxxxx['requdiar']) - $restaxxx]; //f8 sodio
    // calcular las otras formulas de potasio
    if ($dataxxxx['medicame'] == 10) { 
      $restasxx = 0;
      switch ($dataxxxx['fosfatox']) {
        case 5:  
          if ($dataxxxx['npt_idxx'] == 3) {
            $restasxx = $otrmecan; //f9  potasio
          } else {
            $restasxx = $otrmecan * $dataxxxx['pesoxxxx']*3.8;
          }
          break;
        case 6:
          if ($dataxxxx['npt_idxx'] == 3) {
            $restasxx = $otrmecan * 2; //f9  potasio
          } else {
            $restasxx = $otrmecan * $dataxxxx['pesoxxxx'] * 2; //f9  potasio
          }
          break;
      }
      $formulax[10] = ['rtotal' => $dataxxxx['pesoxxxx'] * $dataxxxx['requdiar'] - $restasxx]; //f9  potasio
    }
    if ($dataxxxx['npt_idxx'] == 3){
      $formulax[11] = ['rtotal' => $dataxxxx['requdiar']]; //f10 calcio   
      
    }else{
      $formulax[11] = ['rtotal' => $dataxxxx['requdiar']*$dataxxxx['pesoxxxx']]; //f10 calcio  
    }
    if ($dataxxxx['npt_idxx'] == 3){
     $formulax[12] = ['rtotal' => $dataxxxx['requdiar']]; //f11 magnesio 
      
    }else{
      $formulax[12] = ['rtotal' => $dataxxxx['requdiar']*$dataxxxx['pesoxxxx']]; //f11 magnesio  
    }
          
          
    $formulax[13] = ['rtotal' => $dataxxxx['requdiar']]; //f12 traza tracutil
    $formulax[14] = ['rtotal' => $dataxxxx['requdiar']]; //f13 traza addamel
    $formulax[15] = ['rtotal' => $dataxxxx['requdiar']]; //f14 traza corpaul        
    $formulax[16] = ['rtotal' => $dataxxxx['requdiar'] * $dataxxxx['pesoxxxx']]; //f14 traza corpaul        
    $formulax[17] = ['rtotal' => $dataxxxx['requdiar']]; //f15 multivataminas cernivit
    $formulax[18] = ['rtotal' => $dataxxxx['requdiar'] / 0.099]; //f16 multivataminas vitalipid   
    if ($dataxxxx['npt_idxx'] == 3) {
      $formulax[19] = ['rtotal' => $dataxxxx['requdiar'] / 0.04]; //f17 multivataminas soluvit
    } else {
      $formulax[19] = ['rtotal' => $dataxxxx['requdiar']]; //f17 multivataminas soluvit
    }
    $formulax[20] = ['rtotal' => $dataxxxx['requdiar'] * $dataxxxx['pesoxxxx']]; //f18 glutamina
    $formulax[21] = ['rtotal' => $dataxxxx['requdiar']]; //f19 vitamina c      
    $formulax[22] = ['rtotal' => $dataxxxx['requdiar']]; //f20 complejo B
    $formulax[23] = ['rtotal' => $dataxxxx['requdiar']]; //f21 tiamina
    $formulax[24] = ['rtotal' => $dataxxxx['requdiar']]; //f22 acido folico
    $formulax[25] = ['rtotal' => $dataxxxx['requdiar']]; //f23 vitamina k  
    $formulax[26] = ['rtotal' => $dataxxxx['requdiar'] * $dataxxxx['pesoxxxx']]; //f23 f24 f25    
    $formulax[27] = ['rtotal' => $dataxxxx['requdiar'] * $dataxxxx['pesoxxxx']]; //f23 f24 f25    
    $formulax[28] = ['rtotal' => $dataxxxx['requdiar'] * $dataxxxx['pesoxxxx']]; //f23 f24 f25    
    $formulax[29] = ['rtotal' => $dataxxxx['requdiar']]; //f23 f24 f25    
    $formulax[32] = ['rtotal' => 1]; //agua  
    //echo $dataxxxx['medicame'];
    return $formulax[$dataxxxx['medicame']];
  }

}
