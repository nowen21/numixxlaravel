
<?php
$osmo = 0;
$fosfato = 0;
$htmlxxxx = '';
$calcio = 0;
$carbohid = 0;
$glutamin = 0;
$aminoaci = 0;
$lipidoxx = 0;
$vitalipx = 0;
$volumdia = 0;
$npt_idxx = $data->paciente->npt_id;
foreach ($data->formulacionmeds as $value) {
  $volumdia+=$value->volumen;
  switch ($value->medicamento_id) {
    case 1:
    case 2:
    case 3:
      $aminoaci = $value->rtotal;
      break;
    case 4:
    case 5:
    case 6:
      $fosfato += $value->volumen;
      break;
    case 7:
    case 8:
      $carbohid = $value->rtotal;
      break;

    case 11:
      $calcio = $value->volumen;
      break;
    case 18:
      $vitalipx = $value->rtotal;
      break;
    case 20:
      $glutamin = $value->rtotal;
      break;
    case 26://LIPIDOS MCT/LCT 20%
    case 27://LIPIDOS MCT/LCT/ Ω3 20%
    case 28://OMEGAVEN Ω3 10%
      $lipidoxx = $value->rtotal;
      break;
    case 29:
      $vitalipx = $value->rtotal;
      break;
  }
  if ($value->cantidad > 0) {
    if ($npt_idxx == 3) {
      $osmo += $value->medicamento->osmoralidad * $value->purga;
    } else {
      $osmo += $value->medicamento->osmoralidad * $value->purga;
    }


    $htmlxxxx .= '<tr>';
    $htmlxxxx .= ' <td style="  text-align: left; background: #d2d6dc" >';
    $htmlxxxx .= $value->medicamento->nombgene;
    $htmlxxxx .= '</td>';
    $htmlxxxx .= '<td style="  text-align: right;">';
    $htmlxxxx .= $value->cantidad;
    $htmlxxxx .= '</td>';
    $htmlxxxx .= '<td style="  text-align: right;">';
    $htmlxxxx .= number_format($value->volumen,2);
    $htmlxxxx .= '</td>';
    $htmlxxxx .= '<td style=" text-align: right;">';
    $htmlxxxx .= number_format($value->purga,2);
    $htmlxxxx .= '</td>';
    $htmlxxxx .= '</tr>';
  }
}
?>   



<div style="font-size: 9px">
<table style=" width: 90%;" >
  <tr>
    <td style="width: 40%; text-align: left; height: 75px; " rowspan="3" >
      <img src="{{ url('img/Numixx_Nuevo_Logo.png') }}"   style="width: 135px; height: 76px;" alt="logo">
    </td>
    <td style=" width: 40%; text-align: left;  " colspan="2" rowspan="2"></td>

    <td style=" width: 20%; text-align: left; ">CÓDIGO</td>
  </tr>
  <tr>     
    <td style=" width: 20%; text-align: left; ">PRO-FO-37-V0</td>
  </tr>
  <tr>          
    <td style=" width: 20%; text-align: left; "></td>      
    <td style=" width: 20%; text-align: left; "></td>      
    <td style=" width: 20%; text-align: left; "></td>      
  </tr>
</table>
<table style=" width: 100%; " >
  <tr> 
    <td style=" width: 60%; text-align: left; " >
      NUTRICIÓN PARENTERAL
    </td>
    <td style=" width: 20%; text-align: left; ">
      LOTE No.
    </td>
    <td style=" width: 20%; text-align: left; ">
      {{$data->id}}
    </td>
  </tr>
</table>
<table style=" width: 100%; " >
  <tr> 
    <td style=" width: 25%; text-align: left; " >
      N° Afiliación
    </td>      
    <td style=" width: 25%; text-align: left; ">
      N° Cama
    </td>
    <td style=" width: 25%; text-align: left; ">
      Servicio
    </td>
    <td style=" width: 25%; text-align: left; ">
      Fecha Vencimiento
    </td>
  </tr>
  <tr> 
    <td style=" width: 25%; text-align: left; " >
      {{$data->paciente->cedula}}

    </td>      
    <td style=" width: 25%; text-align: left; ">
      {{$data->paciente->cama}}
    </td>
    <td style=" width: 25%; text-align: left; ">
      {{$servicio}}
    </td>
    <td style=" width: 25%; text-align: left; ">
      {{ date("Y-m-d",strtotime(explode(' ',$data->created_at)[0]."+ 2 days"))}}

    </td>
  </tr>
</table>
<table style=" width: 100%; " >
  <tr> 
    <td style=" width: 50%; text-align: left;" >
      Nombres y Apellidos
    </td>      
    <td style=" width: 25%; text-align: left; ">
      PESO
    </td>
    <td style=" width: 25%; text-align: left; ">
      VIA
    </td>      
  </tr>
  <tr> 
    <td style=" width: 50%; text-align: left; " >
      {{$data->paciente->nombres}} {{$data->paciente->apellidos}}
    </td>      
    <td style=" width: 25%; text-align: left; ">
      {{$data->peso}}
    </td>
    <td style=" width: 25%; text-align: left; ">
     {{$calculos['osmolarv']}}
    </td>      
  </tr>
</table>
<table style=" width: 100%; " >
  <tr> 
    <td style=" width: 25%; text-align: left; " >
      Clínica
    </td>      
    <td style=" width: 50%; text-align: left; ">
      {{$data->clinica->nombre}}      
    </td>
    <td style=" width: 25%; text-align: left; ">
      {{$data->paciente->npt->nombre}}
    </td>      
  </tr>
</table>
<table style=" width: 100%;" >
  <thead >
    <tr> 
      <th style=" width: 60%; text-align: left; border-top: 2px #000 solid;border-bottom: 2px #000 solid;" >
        NUTRIENTE:
      </th>      
      <th style=" width: 10%; text-align: left; border-top: 2px #000 solid;border-bottom: 2px #000 solid;">
        REQ
      </th>
      <th style=" width: 15%; text-align: left;border-top: 2px #000 solid;border-bottom: 2px #000 solid;">
        VOLUMEN
      </th>      
      <th style=" width: 15%; text-align: left;border-top: 2px #000 solid;border-bottom: 2px #000 solid;">
        VOLUMEN PURGA
      </th>      
    </tr>
  </thead>
  <tbody >
    <?= $htmlxxxx ?>

  </tbody>
</table>
<table style=" width: 100%; font-size: 10px">
  <tr>
    <td style=" width:30%;">
      CONTENIDO
    </td>
    <td style=" width:15%;">
      {{$data->volumen + $data->purga}}      
    </td>
    <td style=" width:30%;">
      VOLUMEN DÍA
    </td>
    <td style=" width:25%;">
      {{$volumdia+$data->aguax_id}}   
    </td>
  </tr>
  <tr>
    <td style=" width:30%;">
      DURACIÓN
    </td>
    <td style=" width:15%;">
      {{$data->tiempo}}      
    </td>
    <td style=" width:30%;">
      VELOCIDAD
    </td>
    <td style=" width:25%;">
      {{$data->velocidad}}   
    </td>
  </tr>
  <tr>
    <td style=" width:30%;">
      FECHA PREP
    </td>
    <td style=" width:15%;">
      Cal NP/g P
    </td>
    <td style=" width:30%;">
      DNP
    </td>
    <td style=" width:25%;">
      Osmoralidad 
    </td>
  </tr>
  <tr>
    <td style=" width:30%;">
      {{explode(' ',$data->created_at)[0]}}
    </td>
    <td style=" width:15%;">    
      {{number_format(($carbohid*3.4 + $lipidoxx*9 +$vitalipx*1.12)/(($aminoaci+$glutamin)/6.25),2)}}
    </td>
    <td style=" width:30%;">
      {{$dnpxxxxx}}
    </td>
    <td style=" width:25%;">
      {{number_format($calculos['osmolari'],2)}}
    </td>
  </tr>

  <tr>
    <td style=" width:30%;">
      FECHA INICIO NP
    </td>
    <td style=" width:15%;">
      CALORÍAS TOTALES
    </td>
    <td style=" width:30%;">
      CAL TOTAL/Kg/DÍA
    </td>
    <td style=" width:25%;">
      RELACIÓN Ca/FÓSFORO {{"(<2)"}}
    </td>
  </tr> 
  <tr>
    <td >
      {{$data->paciente->registro}}
    </td>
    <td >
      {{number_format(($lipidoxx*9 +$vitalipx*1.12)+($carbohid*3.4)+($aminoaci+$glutamin)*4,2)}}
    </td>
    <td >
      {{number_format((($lipidoxx*9 +$vitalipx*1.12)+($carbohid*3.4)+($aminoaci+$glutamin)*4)/$data->peso,2)}}
    </td>
    <td >
      {{$calculos['calcfosv']}}
    </td>
  </tr>


</table>
<table style="width: 100%">
  <tr>
    <td style=" width:50%;">
      Preparado Por:
    </td>
    <td style=" width:50%;">
      Liberado Por:
    </td>
  </tr>
  <tr>
    <td >
      Q.F. {{$preparad}}
    </td>
    <td >
      Q.F. {{$liberado}}
    </td>      
  </tr>
</table>

</div>