
<table class="table table-bordered" style="margin-top: 10px">
    <tbody id="formulaciontable">
        <tr >
            <td colspan="2">VOLUMEN TOTAL (ml)</td>
            <td id="volutota" style="text-align: right;"> {{number_format($todoxxxx['calculos']['volutota'],2,',','.')}} </td>
            <td> VOLUMEN CON PURGA (ml)</td>
            <td id="velopurg" style="text-align: right;"> {{number_format($todoxxxx['calculos']['velopurg'],2,',','.')}} </td>
        </tr>
        <tr>
            <td colspan="2">VELOCIDAD DE INFUSIÓN (ml/hora)</td>
            <td id="veloinfu" style="text-align: right;">{{number_format($todoxxxx['calculos']['veloinfu'],2,',','.')}} </td>
            <td rowspan="2" ></td>
        </tr>
        <tr>
            <td>CONCENTRACIÓN DE CARBOHIDRATOS (%)</td>
            <td id="carbvali">{{$todoxxxx['calculos']['carbvali']}}</td>
            <td id="concarbo" style="text-align: right;">{{number_format($todoxxxx['calculos']['concarbo'],2,',','.')}}</td>
        </tr>
        <tr>
            <td>CONCENTRACIÓN DE PROTEÍNA (%) (>1%)</td>
            <td id="concprov" >{{$todoxxxx['calculos']['concprov']}}</td>
            <td id="concprot" style="text-align: right;">{{number_format($todoxxxx['calculos']['concprot'],2,',','.')}}</td>
            <td colspan="2" class="align-bottom" rowspan="2"> VÍA DE ADMINISTRACIÓN</td>
        </tr>
        <tr>
            <td>CONCENTRACIÓN DE LÍPIDOS (%) (>1%)</td>
            <td id="conclipv">{{$todoxxxx['calculos']['conclipv']}}</td>
            <td id="conclipi" style="text-align: right;">{{number_format($todoxxxx['calculos']['conclipi'],2,',','.')}}</td>
        </tr>
        <tr>
            <td colspan="2">OSMOLARIDAD (mOsm/L)</td>
            <td id="osmolari" style="text-align: right;">{{number_format($todoxxxx['calculos']['osmolari'],2,',','.')}}</td>
            <td id="osmolarv" colspan="2">{{$todoxxxx['calculos']['osmolarv']}}</td>
        </tr>
        <tr>
            <td colspan="2">GRAMOS TOTALES DE NITRÓGENO</td>
            <td id="gramtota" style="text-align: right;">{{number_format($todoxxxx['calculos']['gramtota'],2,',','.')}}</td>
            <td colspan="2" rowspan="8"></td>
        </tr>
        <tr>
            <td colspan="2">RELACIÓN: Caloría No proteícas/g Nitrógeno</td>
            <td id="protnitr" style="text-align: right;">{{number_format($todoxxxx['calculos']['protnitr'],2,',','.')}}</td>
        </tr>
        <tr>
            <td colspan="2">RELACIÓN: Caloría No proteícas/g A.A</td>
            <td id="proteica" style="text-align: right;">{{number_format($todoxxxx['calculos']['proteica'],2,',','.')}}</td>
        </tr>
        <tr>
            <td>CALORÍAS PROTEICAS</td>
            <td id="caloprov" style="text-align: right;">{{number_format($todoxxxx['calculos']['caloprov'],0)}}%</td>
            <td id="caloprot" style="text-align: right;">{{number_format($todoxxxx['calculos']['caloprot'],2,',','.')}}</td>
        </tr>
        <tr>
            <td>CALORÍAS LÍPIDOS</td>
            <td id="calolipv" style="text-align: right;">{{number_format($todoxxxx['calculos']['calolipv'],0)}}%</td>
            <td id="calolipi" style="text-align: right;">{{number_format($todoxxxx['calculos']['calolipi'],2,',','.')}}</td>
        </tr>
        <tr>
            <td>CALORÍAS CARBOHIDRATOS</td>
            <td id="calocarv" style="text-align: right;">{{number_format($todoxxxx['calculos']['calocarv'],0)}}%</td>
            <td id="calocarb" style="text-align: right;">{{number_format($todoxxxx['calculos']['calocarb'],2,',','.')}}</td>
        </tr>
        <tr>
            <td>CALORÍAS TOTALES</td>
            <td id="calototv" style="text-align: right;">{{number_format($todoxxxx['calculos']['calototv'],0)}}%</td>
            <td id="calotota" style="text-align: right;">{{number_format($todoxxxx['calculos']['calotota'],2,',','.')}}</td>
        </tr>
        <tr>
            <td colspan="2">CALORÍAS TOTALES/Kg//Día</td>
            <td id="caltotkg" style="text-align: right;">{{number_format($todoxxxx['calculos']['caltotkg'],2,',','.')}}</td>
        </tr>
        <tr>
            <td colspan="2">RELACIÓN CALCIO/FÓSFORO (<2)</td>
            <td id="calcfosf" style="text-align: right;">{{number_format($todoxxxx['calculos']['calcfosf'],2,',','.')}}</td>
            <td id="calcfosv" colspan="2" >{{$todoxxxx['calculos']['calcfosv']}}</td>
        </tr>
        <tr>
            <td colspan="2">PESO TEÓRICO</td>
            <td id="pesoteor" style="text-align: right;">{{number_format($todoxxxx['calculos']['pesoteor'],2,',','.')}}</td>
            <td colspan="2"></td>
        </tr>
    </tbody>
</table>
