@extends('layouts.adminlte')
@section('styles')
@endsection
@section('content')
<div class="container">
  <div class="row">
    <div class="panel panel-default">
      <div class="panel-heading">
        <h1 style="text-align: center">{{$tituloxx}}</h1>
      </div>
      <div class="panel-body" >
        <div class="form-group" >
          <div class="col-sm-12">
            <a href="{{route('pacientes.index')}}" class="btn btn-sm btn-primary pull-right" role="button">Nueva Formulación</a>  
            <a href="{{route('npt.index')}}" class="btn btn-sm btn-primary pull-right" role="button">Volver a Formulaciones</a> 
          </div>
        </div>
        <div class="form-group">
          <strong class="control-label col-sm-2">Clínica:</strong>
          <div class="col-sm-4">
            {{$formulacione->clinica->nombre}}
          </div> 
          <strong class="control-label col-sm-2">Tiempo Infusión:</strong>
          <div class="col-sm-4">
            {{$formulacione->tiempo}}
          </div>
          <strong class="control-label col-sm-2">Velocidad Infusión:</strong>
          <div class="col-sm-4">
            {{$formulacione->velocidad}} 
          </div>
          <strong class="control-label col-sm-2">Volumen Total:</strong>
          <div class="col-sm-4">
            {{$formulacione->volumen}}     
          </div>
          <strong class="control-label col-sm-2">Purga:</strong> 
          <div class="col-sm-4">
            {{$formulacione->purga}}  
          </div>
          <strong class="control-label col-sm-2">Peso:</strong> 
          <div class="col-sm-4">
            {{$formulacione->peso}}  
          </div>
        </div>
        <hr style="border:  #000000 solid 2px; margin-top: 15px"/>
        <table class="table table-bordered" style="margin-top: 10px">
          <thead>
            <tr>
              <th>MEDICAMENTO</th>            
              <th>SELECCIÓN</th>   
              <th>UNIDAD</th>
              <th>REQUERIMIENTO</th>
              <th>VOLUMEN</th>
            </tr>
          </thead>
          <tbody id="formulaciontable">
            @foreach($formular as $formulax)
            <tr >
              <td >{{$formulax['casaxxxx']}}</td>            
              <td>{{$formulax['nombgene']}}</td>                     
              <td >{{$formulax['unidadxx']}}</td>
              <td style=" text-align: right"> {{ $formulax['requerim'] }} </td>
              <td style=" text-align: right">{{ $formulax['volumenx']}}  </td> 
            </tr>
            @endforeach
          </tbody>
        </table> 
        <table class="table table-bordered" style="margin-top: 10px">
          <tbody id="formulaciontable">
            <tr >            
              <td colspan="2">VOLUMEN TOTAL (mL)</td>            
              <td> {{$calculos['volutota']}}    </td>                     
              <td>VOLUMEN CON PURGA (mL)</td>
              <td>  {{$calculos['velopurg']}}     </td>
            </tr>
            <tr >
              <td colspan="2">VELOCIDAD DE INFUSIÓN (ml/hora)</td>                     
              <td>{{$calculos['veloinfu']}} </td>                     
              <td colspan="2" rowspan="2"></td>
            </tr>
            <tr >
              <td>CONCENTRACIÓN DE CARBOHIDRATOS (%)</td>            
              <td>{{$calculos['carbvali']}}</td>            
              <td>{{number_format($calculos['concarbo'],2)}}</td>                     
            </tr>
            <tr >
              <td>CONCENTRACIÓN DE PROTEÍNA (%) (>1%)</td>            
              <td>{{$calculos['concprov']}}</td>            
              <td>{{number_format($calculos['concprot'],2)}}</td>                     
              <td colspan="2" rowspan="2"> VÍA DE ADMINISTRACIÓN</td>
            </tr>
            <tr >
              <td>CONCENTRACIÓN DE LÍPIDOS (%) (>1%)</td>            
              <td>{{$calculos['conclipv']}}</td>            
              <td>{{number_format($calculos['conclipi'],2)}}</td>                     

            </tr>
            <tr >
              <td colspan="2">OSMOLARIDAD (mOsm/L)</td>                     
              <td>{{number_format($calculos['osmolari'],2)}}</td>                     
              <td colspan="2">{{$calculos['osmolarv']}}</td>
            </tr>
            <tr >
              <td colspan="2">GRAMOS TOTALES DE NITRÓGENO</td>                     
              <td>{{number_format($calculos['gramtota'],2)}}</td>                     
              <td colspan="2" rowspan="8"></td>
            </tr>
            <tr >
              <td colspan="2">RELACIÓN: Cal No proteícas/g Nitrógeno</td>                     
              <td>{{number_format($calculos['protnitr'],2)}}</td>                     
              
            </tr>
            <tr >
              <td colspan="2">RELACIÓN: Cal No proteícas/g A.A</td>                     
              <td>{{number_format($calculos['proteica'],2)}}</td>                     
             
            </tr>
            <tr >
              <td >COLORÍAS PROTEICAS</td>   
              <td>{{number_format($calculos['caloprov'],0)}}%</td>   
              <td>{{$calculos['caloprot']}}</td>                     
             
            </tr>
            <tr >
              <td >COLORÍAS LÍPIDOS</td>  
              <td>{{number_format($calculos['calolipv'],0)}}%</td>   
              <td>{{$calculos['calolipi']}}</td>                     
              
            </tr>
            <tr >
              <td >COLORÍAS CARBOHIDRATOS</td>  
              <td>{{number_format($calculos['calocarv'],0)}}%</td>   
              <td>{{$calculos['calocarb']}}</td>                     
              
            </tr>
            <tr >
              <td >COLORÍAS TOTALES</td>
              <td>{{number_format($calculos['calototv'],0)}}%</td>   
              <td>{{$calculos['calotota']}}</td>  
            </tr>
            <tr >
              <td colspan="2">COLORÍAS TOTALES/Kg//Día</td>    
              <td>{{$calculos['caltotkg']}}</td>                 
              
            </tr>
            <tr >
              <td colspan="2">RELACIÓN CALCIO/FÓSFORO (<2)</td>                     
              <td>{{$calculos['calcfosf']}}</td>                     
              <td colspan="2">{{$calculos['calcfosv']}}</td>
            </tr>
            <tr >
              <td colspan="2">PESO TEÓRICO</td>                     
              <td>{{$calculos['pesoteor']}}</td>                     
              <td colspan="2"></td>
            </tr>
          </tbody>
        </table> 

        <div class="form-group">
          <div class="col-sm-12">
            <a href="{{route('pacientes.index')}}" class="btn btn-sm btn-primary pull-right" role="button">Nueva Formulación</a>  
            <a href="{{route('npt.index')}}" class="btn btn-sm btn-primary pull-right" role="button">Volver a Formulaciones</a> 
          </div>
        </div>
      </div>

    </div>
  </div>
</div>
@endsection
@section('scripts')
@endsection