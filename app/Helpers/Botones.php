<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Helpers;

/**
 * Description of Botones
 *
 * @author Nowen21
 */
class Botones {
  public static function getBotones($dataxxxx) {
    $urlbasex=url("/{$dataxxxx['carpetax']}/{$dataxxxx['vistaxxx']}");
    
    return $urlbasex ;
  }
}
