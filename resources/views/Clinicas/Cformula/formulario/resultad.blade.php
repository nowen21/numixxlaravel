<table class="table table-bordered" style="margin-top: 10px">
    <tbody id="formulaciontable">
        <tr>
            <td colspan="2">VOLUMEN TOTAL (ml)</td>
            <td id="volutota"> {{$todoxxxx['calculos']['volutota']}} </td>
            <td> VOLUMEN CON PURGA (ml)</td>
            <td id="velopurg"> {{$todoxxxx['calculos']['velopurg']}} </td>
        </tr>
        <tr>
            <td colspan="2">VELOCIDAD DE INFUSIÓN (ml/hora)</td>
            <td id="veloinfu">{{$todoxxxx['calculos']['veloinfu']}} </td>
            <td rowspan="2" ></td>
        </tr>
        <tr>
            <td>CONCENTRACIÓN DE CARBOHIDRATOS (%)</td>
            <td id="carbvali">{{$todoxxxx['calculos']['carbvali']}}</td>
            <td id="concarbo">{{number_format($todoxxxx['calculos']['concarbo'],2)}}</td>
        </tr>
        <tr>
            <td>CONCENTRACIÓN DE PROTEÍNA (%) (>1%)</td>
            <td id="concprov">{{$todoxxxx['calculos']['concprov']}}</td>
            <td id="concprot">{{number_format($todoxxxx['calculos']['concprot'],2)}}</td>
            <td colspan="2" class="align-bottom" rowspan="2"> VÍA DE ADMINISTRACIÓN</td>
        </tr>
        <tr>
            <td>CONCENTRACIÓN DE LÍPIDOS (%) (>1%)</td>
            <td id="conclipv">{{$todoxxxx['calculos']['conclipv']}}</td>
            <td id="conclipi">{{number_format($todoxxxx['calculos']['conclipi'],2)}}</td>
        </tr>
        <tr>
            <td colspan="2">OSMOLARIDAD (mOsm/L)</td>
            <td id="osmolari">{{$todoxxxx['calculos']['osmolari']}}</td>
            <td id="osmolarv" colspan="2">{{$todoxxxx['calculos']['osmolarv']}}</td>
        </tr>
        <tr>
            <td colspan="2">GRAMOS TOTALES DE NITRÓGENO</td>
            <td id="gramtota">{{number_format($todoxxxx['calculos']['gramtota'],2)}}</td>
            <td colspan="2" rowspan="8"></td>
        </tr>
        <tr>
            <td colspan="2">RELACIÓN: Caloría No proteícas/g Nitrógeno</td>
            <td id="protnitr">{{number_format($todoxxxx['calculos']['protnitr'],2)}}</td>
        </tr>
        <tr>
            <td colspan="2">RELACIÓN: Caloría No proteícas/g A.A</td>
            <td id="proteica">{{number_format($todoxxxx['calculos']['proteica'],2)}}</td>
        </tr>
        <tr>
            <td>CALORÍAS PROTEICAS</td>
            <td id="caloprov">{{number_format($todoxxxx['calculos']['caloprov'],0)}}%</td>
            <td id="caloprot">{{$todoxxxx['calculos']['caloprot']}}</td>
        </tr>
        <tr>
            <td>CALORÍAS LÍPIDOS</td>
            <td id="calolipv">{{number_format($todoxxxx['calculos']['calolipv'],0)}}%</td>
            <td id="calolipi">{{$todoxxxx['calculos']['calolipi']}}</td>
        </tr>
        <tr>
            <td>CALORÍAS CARBOHIDRATOS</td>
            <td id="calocarv">{{number_format($todoxxxx['calculos']['calocarv'],0)}}%</td>
            <td id="calocarb">{{$todoxxxx['calculos']['calocarb']}}</td>
        </tr>
        <tr>
            <td>CALORÍAS TOTALES</td>
            <td id="calototv">{{number_format($todoxxxx['calculos']['calototv'],0)}}%</td>
            <td id="calotota">{{$todoxxxx['calculos']['calotota']}}</td>
        </tr>
        <tr>
            <td colspan="2">CALORÍAS TOTALES/Kg//Día</td>
            <td id="caltotkg">{{$todoxxxx['calculos']['caltotkg']}}</td>
        </tr>
        <tr>
            <td colspan="2">RELACIÓNss CALCIO/FÓSFORO (<2)</td> <td id="calcfosf">{{$todoxxxx['calculos']['calcfosf']}}</td>
            <td id="calcfosv" colspan="2">{{$todoxxxx['calculos']['calcfosv']}}</td>
        </tr>
        <tr>
            <td colspan="2">PESO TEÓRICO</td>
            <td id="pesoteor">{{$todoxxxx['calculos']['pesoteor']}}</td>
            <td colspan="2"></td>
        </tr>
    </tbody>
</table>
