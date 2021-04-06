<table class="table">
    <thead>
        <tr>
            <th scope="col">Fecha de elaboraci&oacute;n Nutrici&oacute;n</th>
            <th scope="col">N&uacute;mero de remisi&oacute;n</th>
            <th scope="col">Nombre del paciente</th>
            <th scope="col">Historia Cl&iacute;nica</th>
            <th scope="col">Nit de la cl&iacute;nica</th>
            <th scope="col">C&oacute;digo del rango asignado</th>
            <th scope="col">Descripción del rango</th>
            <th scope="col">Fecha de vencimiento</th>
        </tr>
    </thead>
    <tbody>
        @foreach($todoxxxx['modeloxx'] as $registro)
        <tr>
            <th>{{$registro['fechanpt']}}</th>
            <td>{{$registro['remision']}}</td>
            <td>{{$registro['paciente']}}</td>
            <td>{{$registro['histclin']}}</td>
            <td>{{$registro['clinicax']}}</td>
            <td>{{$registro['codigoxx']}}</td>
            <td>{{$registro['tiponutr']}}</td>
            <td>{{$registro['fechaven']}}</td>
        </tr>
        @endforeach
    </tbody>
</table>
