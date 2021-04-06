<table class="table">
    <thead>
        <tr>
            <th scope="col">Fecha de elaboraci&oacute;n Nutrici&oacute;n</th>
            <th scope="col">N&uacute;mero de remisi&oacute;n</th>
            <th scope="col">Descripci&oacute;n del rango</th>
            <th scope="col">Volumen de la nutrici&oacute;n</th>
        </tr>
    </thead>
    <tbody>
    @foreach($todoxxxx['modeloxx'] as $registro)
        <tr>
            <th>{{$registro['fechanpt']}}</th>
            <td>{{$registro['paciente']}}</td>
            <td>{{$registro['tiponutr']}}</td>
            <td>{{$registro['volumenx']}}</td>
        </tr>
        @endforeach
    </tbody>
</table>
