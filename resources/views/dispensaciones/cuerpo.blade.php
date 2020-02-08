 <thead>
    <tr style="font-size: 14px">
<!--      <th>MEDICAMENTO</th>
      <th>UND</th>
      <th>LOTE</th>
      <th>REGISTRO INVIMA</th>
      <th>F VENC</th>                -->
      <th>DISPOSITIVO MÉDICO</th>
      <th>UND</th>
      <th>LOTE</th>
      <th>REGISTRO INVIMA</th>
      <th>F VENC</th> 
    </tr>
  </thead>
  <tbody>
    @foreach($medicame as $medicams)
    @if($medicams['medicamd']!='')
    <tr style="font-size: 12px">
      <td>{{$medicams['medicamd']}}</td>
      <td class="negrita">
        @if($medicams['medicamd']!='')
        {{ $medicams['value_di'] }} 
        @endif
      </td>
      <td>{{$medicams['lotexxxd']}}</td>          
      <td>{{$medicams['reginvid']}}</td>          
      <td style="width: 75px">{{$medicams['fechvend']}}</td> 
    </tr>
     @endif
    @endforeach

  </tbody>