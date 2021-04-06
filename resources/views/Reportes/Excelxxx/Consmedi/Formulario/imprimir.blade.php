<table class="table">
    <thead>
        <tr>
            <th scope="col">Fecha del medicamentos consumidos</th>
            <th scope="col">Nombre de la cl&iacute;nica</th>
            <th scope="col">Nombre del paciente</th>
            <th scope="col">C&oacute;digo del medicamento</th>
            <th scope="col">Nombre del medicamentos</th>
            <th scope="col">Unidad de m&eacute;dica</th>
            <th scope="col">Cantidad de ML consumidos</th>
        </tr>
    </thead>
    <tbody>
        @foreach($todoxxxx['modeloxx'] as $registro)
        <?php
        $formulax = $registro->dformula->cformula;
        $paciente = $formulax->paciente;
        ?>
        <tr>
            <th>{{$registro->created_at}}</th>
            <td>{{$formulax->sis_clinica->clinica->clinica}}</td>
            <td>{{ $paciente->nombres}} {{ $paciente->apellidos}}</td>
            <td>{{$registro->dformula->medicame_id}}</td>
            <td>{{$registro->dformula->medicame->nombgene}}</td>
            <td>{{$registro->dformula->medicame->casa->unidmedi}}</td>
            <td style="text-align: right;">{{number_format($registro->volumenx,2)}}</td>
        </tr>
        @endforeach
    </tbody>
</table>
