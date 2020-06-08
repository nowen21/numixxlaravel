<style>
  .cabecera {
    font-size: 10px;
  }

  .letras {
        font-size: 10px;
      }
</style>

<table class="table table-bordered table-responsiv" style="margin-top: 10px">
  <thead>
    <tr>
      <th class="cabecera">DISPOSITIVO MÉDICO</th>
      <th class="cabecera">LOTE</th>
      <th class="cabecera">CANTIDAD CONSUMIDA</th>
      <th class="cabecera">CANTIDAD ALISTADA</th>
      <th class="cabecera">CANTIDAD SOBRANTE</th>
      <th class="cabecera">MEDICAMENTO</th>
      <th class="cabecera">LOTE</th>
      <th class="cabecera">CANTIDAD CONSUMIDA</th>
      <th class="cabecera">CANTIDAD ALISTADA</th>
      <th class="cabecera">CANTIDAD SOBRANTE</th>
    </tr>
  </thead>
  <tbody id="formulaciontable">
    @foreach($detallex['dispoxxx'] as $key=> $alistami)
    <tr>
      <td scope="col" class="letras">
        {{$alistami['medidisp']}}</td>
      <td scope="col" class="letras">{{$alistami['lotexxxx']}}</td>
      <td scope="col" class="letras">
        {{$alistami['consumid']}}
      </td>
      <td scope="col" class="letras" style="width: 100px">
        {{$alistami['alistada']}}
      </td>
      <td scope="col" class="letras">
        {{$alistami['sobrante']}}
      </td>
      <td scope="col" class="letras">{{$detallex['medicxxx'][$key]['medidisp']}}</td>
      <td scope="col" class="letras">{{$detallex['medicxxx'][$key]['lotexxxx']}}</td>
      <td scope="col" class="letras">
        {{$detallex['medicxxx'][$key]['consumid']}}
      </td>
      <td scope="col" class="letras" style="width: 100px">
        {{$detallex['medicxxx'][$key]['alistada']}}
      </td>
      <td scope="col" class="letras">
        {{$detallex['medicxxx'][$key]['sobrante']}}
      </td>
    </tr>
    @endforeach
  </tbody>
</table>