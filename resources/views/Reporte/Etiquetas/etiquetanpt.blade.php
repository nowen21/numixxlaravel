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
$npt_idxx = $cformula->paciente->npt_id;
foreach ($cformula->dformulas as $value) {
    $volumdia += $value->volumen;
    switch ($value->medicame_id) {
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
        case 26: //LIPIDOS MCT/LCT 20%
        case 27: //LIPIDOS MCT/LCT/ Ω3 20%
        case 28: //OMEGAVEN Ω3 10%
            $lipidoxx = $value->rtotal;
            break;
        case 29:
            $vitalipx = $value->rtotal;
            break;
    }
    if ($value->cantidad > 0) {
        if ($npt_idxx == 3) {
            $osmo += $value->medicame->osmoralidad * $value->purga;
        } else {
            $osmo += $value->medicame->osmoralidad * $value->purga;
        }


        $htmlxxxx .= '<tr>';
        $htmlxxxx .= ' <td style="  text-align: left; background: #d2d6dc" >';
        $htmlxxxx .= $value->medicame->nombgene;
        $htmlxxxx .= '</td>';
        $htmlxxxx .= '<td style="  text-align: right;">';
        $htmlxxxx .= $value->cantidad;
        $htmlxxxx .= '</td>';
        $htmlxxxx .= '<td style="  text-align: right;">';
        $htmlxxxx .= number_format($value->volumen, 2);
        $htmlxxxx .= '</td>';
        $htmlxxxx .= '<td style=" text-align: right;">';
        $htmlxxxx .= number_format($value->purga, 2);
        $htmlxxxx .= '</td>';
        $htmlxxxx .= '</tr>';
    }
}
?>



<div style="font-size: {{isset($tamaniox)==true?$tamaniox:9}}px">
    <table style=" width: 90%;">
        <tr>
            <td style="width: 40%; text-align: left; height: 75px; " rowspan="3">
                <img src="{{ url('img/Numixx_Nuevo_Logo.png') }}" style="width: 135px; height: 76px;" alt="logo">
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
    <table style=" width: 100%; ">
        <tr>
            <td style=" width: 60%; text-align: left; ">
                NUTRICIÓN PARENTERAL
            </td>
            <td style=" width: 20%; text-align: left; ">
                LOTE No.
            </td>
            <td style=" width: 20%; text-align: left; ">
                {{$cformula->id}}
            </td>
        </tr>
    </table>
    <table style=" width: 100%; ">
        <tr>
            <td style=" width: 25%; text-align: left; ">
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
            <td style=" width: 25%; text-align: left; ">
                {{$cformula->paciente->cedula}}

            </td>
            <td style=" width: 25%; text-align: left; ">
                {{$cformula->paciente->cama}}
            </td>
            <td style=" width: 25%; text-align: left; ">
                {{$cformula->paciente->servicio->servicio}}
            </td>
            <td style=" width: 25%; text-align: left; ">
                {{ date("Y-m-d",strtotime(explode(' ',$cformula->created_at)[0]."+ 2 days"))}}

            </td>
        </tr>
    </table>
    <table style=" width: 100%; ">
        <tr>
            <td style=" width: 50%; text-align: left;">
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
            <td style=" width: 50%; text-align: left; ">
                {{$cformula->paciente->nombres}} {{$cformula->paciente->apellidos}}
            </td>
            <td style=" width: 25%; text-align: left; ">
                {{$cformula->peso}}
            </td>
            <td style=" width: 25%; text-align: left; ">
                {{$calculos['osmolarv']}}
            </td>
        </tr>
    </table>
    <table style=" width: 100%; ">
        <tr>
            <td style=" width: 25%; text-align: left; ">
                Clínica
            </td>
            <td style=" width: 50%; text-align: left; ">
                {{$cformula->sis_clinica->clinica->clinica}}
            </td>
            <td style=" width: 25%; text-align: left; ">
                {{$cformula->paciente->npt->nombre}}
            </td>
        </tr>
    </table>
    <table style=" width: 100%;">
        <thead>
            <tr>
                <th style=" width: 60%; text-align: left; border-top: 2px #000 solid;border-bottom: 2px #000 solid;">
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
        <tbody>
            <?= $htmlxxxx ?>

        </tbody>
    </table>
    <table style=" width: 100%; font-size: 10px">
        <tr>
            <td style=" width:30%;">
                CONTENIDO
            </td>
            <td style=" width:15%;">
                {{$cformula->volumen + $cformula->purga}}
            </td>
            <td style=" width:30%;">
                VOLUMEN DÍA
            </td>
            <td style=" width:25%;">
                {{number_format($volumdia+$cformula->aguax_id,2)}}
            </td>
        </tr>
        <tr>
            <td style=" width:30%;">
                DURACIÓN
            </td>
            <td style=" width:15%;">
                {{$cformula->tiempo}}
            </td>
            <td style=" width:30%;">
                VELOCIDAD
            </td>
            <td style=" width:25%;">
                {{number_format($cformula->velocidad,2)}}
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
                OSMOLARIDAD
            </td>
            <td style=" width:25%;">

            </td>
        </tr>
        <tr>
            <td>
                {{explode(' ',$cformula->created_at)[0]}}
            </td>
            <td>
                {{number_format(($carbohid*3.4 + $lipidoxx*9 +$vitalipx*1.12)/(($aminoaci+$glutamin)/6.25),2)}}
            </td>

            <td>
                {{number_format($calculos['osmolari'],2)}}
            </td>
            <td>

            </td>
        </tr>

        <tr>

            <td>
                CALORÍAS TOTALES
            </td>
            <td>
                CAL TOTAL/Kg/DÍA
            </td>
            <td>
                RELACIÓN Ca/FÓSFORO (<2) </td> <td>

            </td>
        </tr>
        <tr>

            <td>
                {{number_format(($lipidoxx*9 +$vitalipx*1.12)+($carbohid*3.4)+($aminoaci+$glutamin)*4,2)}}
            </td>
            <td>
                {{number_format((($lipidoxx*9 +$vitalipx*1.12)+($carbohid*3.4)+($aminoaci+$glutamin)*4)/$cformula->peso,2)}}
            </td>
            <td>
                {{$calculos['calcfosv']}}
            </td>
            <td>
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
            <td>
                Q.F. {{$preparad}}
            </td>
            <td>
                Q.F. {{$liberado}}
            </td>
        </tr>
    </table>

    <!-- <table style="width: 100%">
        <tr>
            <td style=" width:50%;">
                <img src="{{ url('qrcodes/qrcode.svg') }}" style="width: 100px; height: 100px;" alt="logo">
            </td>
        </tr>
    </table> -->

</div>
