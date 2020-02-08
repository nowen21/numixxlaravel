 <thead>
    <tr style="font-size: 12px; text-align: center">
      <th>MEDICAMENTO</th>
      <th>LOTE</th>
      <th>CANTIDAD CONSUMIDA</th>
      <th>CANTIDAD ALISTADA</th>
      <th>DIFERENCIA</th>
      <th>DISPOSITIVO MÉDICO</th>
      <th>LOTE</th>
      <th>CANTIDAD CONSUMIDA</th>
      <th>CANTIDAD ALISTADA</th>
      <th>DIFERENCIA</th>
    </tr>
  </thead>
  <tbody>
    @foreach($medicame as $medicams)
    <tr style="font-size: 12px; text-align: center">
      <td>{{$medicams['medicamm']}}</td>
      <td>{{$medicams['lotexxme']}}</td>
      
      <td>{{$medicams['canco_me']}}</td>   
      <td class="negrita">        
        {{ $medicams['value_me'] }} 
      </td>
      <td>{{$medicams['difer_me']}}</td>          
           

      <td>{{$medicams['medicamd']}}</td>
      <td>{{$medicams['lotexxxx']}}</td>
      <td>{{$medicams['canco_di']}}</td>  
      <td class="negrita">
        {{ $medicams['value_di'] }} 
      </td>
              
      <td>{{$medicams['difer_di']}}</td>          
    </tr>
    @endforeach
  </tbody>