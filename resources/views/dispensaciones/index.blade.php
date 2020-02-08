@extends('layouts.adminlte')

@section('styles')
<link href="https://cdn.datatables.net/1.10.12/css/jquery.dataTables.min.css" rel="stylesheet">
@endsection

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-10 col-md-offset-1">
      <div class="panel panel-default">
        <div class="panel-heading">Listado Dispensaciones
          @can('dispensaciones.create')
          @if($dispensa==0)
          <a href="{{route('dispensaciones.create')}}"  class="btn btn-sm btn-info pull-right" role="button">Crear Dispensación</a>
          @endif
          @endcan
        </div>

        <div class="panel-body">
          <table class="table table-hover table-bordered table-striped datatable" style="width:100%">
            <thead>
              <tr>
                <th>Id</th>
                <th>Producto</th>
                <th>Fecha</th>
                <th>OP</th>
                <th>Estado</th>                
                <th style="width: 150px">Opciones</th>
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
  datatabl = {
  responsive: true,
          processing: true,
          serverSide: true,
          ajax: '{{ route("dispensaciones.getdata") }}',
          columns: [
          {data: 'id', name: 'id'},
          {data: 'producto', name: 'producto'},
          {data: 'fechaxxx', name: 'fechaxxx'},
          {data: 'ordepres', name: 'ordepres'},
          {data: 'estadoxx', name: 'estadoxx'},
          {data: 'opciones', name: 'opciones'},
          ],
          columnDefs: [{
          targets: 5,
                  createdCell: function (td, cellData, rowData, row, col) {
                  var show = '';
                  var edit = '';
                  var form = ' <span class="d-inline-block" tabindex="0" data-toggle="tooltip" title="Imprimir Alistamiento">';
                  var formu = "{!!URL::to('dispensaciones/alistamiento/" + rowData.id + "/1')!!}";
                  form += '<a class="btn btn-xs btn-info" style=" margin-left:30px " target="_blank" href="' + formu + '"><span class="glyphicon glyphicon-download-alt"></span></a>';
                  form += '</span>';
                  @can('dispensaciones.show')
                          show = "{!!URL::to('dispensaciones/" + rowData.id + "')!!}";
                  if (rowData.editarxx == 1) {
                  @endcan
                          @can('dispensaciones.edit')
                          edit = "{!!URL::to('dispensaciones/" + rowData.id + "/edit')!!}";
                  @endcan
                  }
                  $(td).html(buttonsTable(show, edit) + form);
                  }
          }]
  }
  $(document).ready(function () {

  });
</script>
@endsection