<table class="table table-bordered" style="margin-top: 10px">
    <tbody id="formulaciontable">
        <tr>
            <td colspan="2">VOLUMEN TOTAL (mL)</td>
            <td id="volutota"> {{$todoxxxx['calculos']['volutota']}} </td>
            <td> VOLUMEN CON PURGA (mL)</td>
            <td id="velopurg"> {{$todoxxxx['calculos']['velopurg']}} </td>
        </tr>
        <tr>
            <td colspan="2">VELOCIDAD DE INFUSIÓN (ml/hora)</td>
            <td id="veloinfu">{{$todoxxxx['calculos']['veloinfu']}} </td>
            <td rowspan="2"></td>
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
            <td colspan="2" rowspan="2"> VÍA DE ADMINISTRACIÓN</td>
        </tr>
        <tr>
            <td>CONCENTRACIÓN DE LÍPIDOS (%) (>1%)</td>
            <td id="conclipv">{{$todoxxxx['calculos']['conclipv']}}</td>
            <td id="conclipi">{{number_format($todoxxxx['calculos']['conclipi'],2)}}</td>
        </tr>
        <tr>
            <td colspan="2">OSMOLARIDAD (mOsm/L)</td>
            <td id="osmolari">{{number_format($todoxxxx['calculos']['osmolari'],2)}}</td>
            <td id="osmolarv">{{$todoxxxx['calculos']['osmolarv']}}</td>
        </tr>
        <tr>
            <td colspan="2">GRAMOS TOTALES DE NITRÓGENO</td>
            <td id="gramtota">{{number_format($todoxxxx['calculos']['gramtota'],2)}}</td>
            <td colspan="2" rowspan="8"></td>
        </tr>
        <tr>
            <td colspan="2">RELACIÓN: Cal No proteícas/g Nitrógeno</td>
            <td id="protnitr">{{number_format($todoxxxx['calculos']['protnitr'],2)}}</td>
        </tr>
        <tr>
            <td colspan="2">RELACIÓN: Cal No proteícas/g A.A</td>
            <td id="proteica">{{number_format($todoxxxx['calculos']['proteica'],2)}}</td>
        </tr>
        <tr>
            <td>COLORÍAS PROTEICAS</td>
            <td id="caloprov">{{number_format($todoxxxx['calculos']['caloprov'],0)}}%</td>
            <td id="caloprot">{{$todoxxxx['calculos']['caloprot']}}</td>
        </tr>
        <tr>
            <td>COLORÍAS LÍPIDOS</td>
            <td id="calolipv">{{number_format($todoxxxx['calculos']['calolipv'],0)}}%</td>
            <td id="calolipi">{{$todoxxxx['calculos']['calolipi']}}</td>
        </tr>
        <tr>
            <td>COLORÍAS CARBOHIDRATOS</td>
            <td id="calocarv">{{number_format($todoxxxx['calculos']['calocarv'],0)}}%</td>
            <td id="calocarb">{{$todoxxxx['calculos']['calocarb']}}</td>
        </tr>
        <tr>
            <td>COLORÍAS TOTALES</td>
            <td id="calototv">{{number_format($todoxxxx['calculos']['calototv'],0)}}%</td>
            <td id="calotota">{{$todoxxxx['calculos']['calotota']}}</td>
        </tr>
        <tr>
            <td colspan="2">COLORÍAS TOTALES/Kg//Día</td>
            <td id="caltotkg">{{$todoxxxx['calculos']['caltotkg']}}</td>
        </tr>
        <tr>
            <td colspan="2">RELACIÓN CALCIO/FÓSFORO (<2)</td> <td id="calcfosf">{{$todoxxxx['calculos']['calcfosf']}}</td>
            <td id="calcfosv">{{$todoxxxx['calculos']['calcfosv']}}</td>
        </tr>
        <tr>
            <td colspan="2">PESO TEÓRICO</td>
            <td id="pesoteor">{{$todoxxxx['calculos']['pesoteor']}}</td>
            <td colspan="2"></td>
        </tr>
    </tbody>
</table>
