<table class="table">
    <?php
    $colspanx = 8;
    ?>
    <thead>
        <tr>
            <th scope="col" colspan="{{$colspanx}}" style="text-align: center;"></th>
        </tr>
        <tr>
            <th scope="col" colspan="{{$colspanx}}" style="text-align: center;">
                RELACI&Oacute;N DE NUTRICIONES PARENTALES
            </th>
        </tr>
        <tr>
            <th scope="col" colspan="{{$colspanx}}" style="text-align: center;">
               {{$todoxxxx['clinicay']->clinica}}
            </th>
        </tr>
        <tr>
            <th scope="col" colspan="{{$colspanx}}" style="text-align: center;">
            {{$todoxxxx['clinicay']->nitxxxxx}}
            </th>
        </tr>
        <tr>
            <th scope="col" colspan="{{$colspanx}}" style="text-align: center;">
                PERIODO: {{$todoxxxx['periodox']}}
            </th>
        </tr>
        <tr>
            <th scope="col" colspan="{{$colspanx}}" style="text-align: center;">
                SOPORTE FACTURA
            </th>
        </tr>
        <tr style="text-align: center;">
            <th scope="col">FECHA DE</th>
            <th scope="col">NOMBRE DEL </th>
            <th scope="col"></th>
            <th scope="col">TIPO DE</th>
            <th scope="col" colspan="2">VOLUMENT TOTAL</th>
            <th scope="col">CANTIDAD</th>
            <th scope="col">VALOR</th>
        </tr>
        <tr style="text-align: center;">
            <th scope="col">Npt</th>
            <th scope="col">PACIENTE</th>
            <th scope="col">HISTORIA CL&Oacute;NICA</th>
            <th scope="col">NUTRICI&Oacute;N</th>
            <th scope="col">CON L&Iacute;DOS</th>
            <th scope="col">SIN L&Iacute;DOS</th>
            <th scope="col">NPTS</th>
            <th scope="col">UNIAD NPT</th>
        </tr>
    </thead>
    <tbody>
        @foreach($todoxxxx['modeloxx'] as $registro)
        @if($registro['totalxxx']['totalxxx']==0)
        <tr>
            <th>{{$registro['fechanpt']}}</th>
            <td>{{$registro['paciente']}}</td>
            <td>{{$registro['histclin']}}</td>
            <td>{{$registro['tiponutr']}}</td>
            <td>{{$registro['volulipi']}}</td>
            <td>{{$registro['volsinli']}}</td>
            <td>{{$registro['cantinpt']}}</td>
            <td>{{$registro['valornpt']}}</td>
        </tr>
        @else
        <tr>
            <th></th>
            <td colspan="5" style="font-weight: bold;">TOTAL D&Iacute;A {{$registro['totalxxx']['fechadia']}}</td>

            <td style="font-weight: bold;">{{$registro['totalxxx']['totalxxx']}}</td>
            <td></td>
        </tr>
        @endif
        @endforeach

    </tbody>
</table>
