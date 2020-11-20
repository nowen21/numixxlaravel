<style>
  .letras1 {
    font-size: 10px;
  }
</style>
<thead>
  <tr>
    <th class="letras1">MEDICAMENTO</th>
    <th class="letras1">UND</th>
    <th class="letras1">LOTE</th>
    <th class="letras1">REGISTRO INVIMA</th>
    <th class="letras1">F.VENC</th>
    <th class="letras1">DISPOSITIVO MÉDICO</th>
    <th class="letras1">UND</th>
    <th class="letras1">LOTE</th>
    <th class="letras1">REGISTRO INVIMA</th>
    <th class="letras1">F.VENC</th>
  </tr>
</thead>
<tbody id="formulaciontable">
  <style>
    .letras {
      font-size: 10px;
    }
  </style>
  @foreach($detallex as $alistami)
  <tr>
    <td scope="col" class="letras">{{$alistami['medicamd']}}</td>
    <td scope="col" class="letras" style="width: 100px; text-align: right; padding-right: 10px;">
      @if($alistami['medicamd']!='')
      {{$alistami['value_di']}}
      @endif
    </td>
    <td scope="col" class="letras">{{$alistami['lotexxxd']}}</td>
    <td scope="col" class="letras">{{$alistami['reginvid']}}</td>
    <td scope="col" class="letras">{{$alistami['fechvend']}}</td>
    <td scope="col" class="letras">{{$alistami['medicamm']}}</td>
    <td scope="col" class="letras" style="width: 100px; text-align: right; padding-right: 10px;">
      @if($alistami['medicamm']!='')
      {{$alistami['value_me']}}
      @endif
    </td>
    <td scope="col" class="letras">{{$alistami['lotexxxm']}}</td>
    <td scope="col" class="letras">{{$alistami['reginvim']}}</td>
    <td scope="col" class="letras">{{$alistami['fechvenm']}}</td>
  </tr>
  @endforeach
</tbody>
