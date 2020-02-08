@extends('layouts.adminlte')

@section('styles')
<link href="https://cdn.datatables.net/1.10.12/css/jquery.dataTables.min.css" rel="stylesheet">
@endsection

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-10 col-md-offset-1">
      <div class="panel panel-default">
        <div class="panel-heading">Listado de pacientes
          @can('pacientes.create')
          <a href="{{route('pacientes.create')}}" class="btn btn-sm btn-info pull-right" role="button">Crear</a>
          @endcan
        </div>
        <div class="panel-body">
          <table id="tablepacientes" class="table table-hover table-bordered table-striped datatable" style="width:100%">
            <thead>
              <tr>
                <th>Id</th>
                <th>Paciente</th>
                <th>Tiempo</th>
                <th>Velocidad</th>
                <th style="width: 200px">Acciones</th>
              </tr>
            </thead>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
@section('scripts')
<script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
<script type="text/javascript">
  $(document).ready(function () {
  $('.datatable').DataTable({
  processing: true,
          serverSide: true,
          ajax: '{{ route('reportes.getdata') }}',
          columns: [
          {data: 'id', name: 'id'},
          {data: 'paciente_id', name: 'paciente_id'},
          {data: 'tiempo', name: 'tiempo'},
          {data: 'velocidad', name: 'velocidad'},
          {data: 'id', name: 'id'},
          ],
          columnDefs:[{
          targets:4,
                  createdCell:function(td, cellData, rowData, row, col){
                  var show = '';
                  var edit = '';
                  var form = ' <span class="d-inline-block" tabindex="0" data-toggle="tooltip" title="Imprimir PDF">';
                  var formu="{!!URL::to('reportes/etiqueta/" + cellData + "/1')!!}";
                  form += '<a class="btn btn-xs btn-info" style=" margin-left:30px " href="'+formu+'"><span class="glyphicon glyphicon-download-alt"></span></a>';
                  form += '</span>';
                  @can('reportes.show')
                          show = "{!!URL::to('reportes/" + cellData + "')!!}";
                  @endcan
                          @can('reportes.edit')
                          edit = "{!!URL::to('reportes/" + cellData + "/edit')!!}";
                  @endcan
                          $(td).html(buttonsTable(show, edit)+form);
                  }
          }]
  });
  });
</script>
@endsection