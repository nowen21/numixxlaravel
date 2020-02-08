@extends('layouts.adminlte')

@section('styles')
<link href="https://cdn.datatables.net/1.10.12/css/jquery.dataTables.min.css" rel="stylesheet">
@endsection

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-10 col-md-offset-1">
      <div class="panel panel-default">
        <div class="panel-heading">Listado de Permisos

          @can('users.create')
          <a href="{{route('permisos.create')}}" class="btn btn-sm btn-info pull-right"  role="button">Crear</a>
          @endcan
        </div>
        <div class="panel-body">
          <table id="tablepacientes" class="table table-hover table-bordered table-striped datatable" style="width:100%">
            <thead>
              <tr>
                <th>Id</th>
                <th>Rol</th>
                <th>Ruta Amigable(Slug)</th>
                <th>Descripción</th>
                <th style="width: 25px">Acciones</th>
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
    ajax: '{{ route("permisos.getdata") }}',
    columns: [
      {data: 'id', name: 'id'},
      {data: 'name', name: 'name'},
      {data: 'slug', name: 'slug'},
      {data: 'description', name: 'description'},
      {data: 'id', name: 'id'},
    ],
    columnDefs: [{
        targets: 4,
        createdCell: function (td, cellData, rowData, row, col) {
          var show = '';
          var edit = '';
          @can('permisos.show')
                  show = "{!!URL::to('permisos/" + cellData + "')!!}";
          @endcan
                  @can('permisos.edit')
                  edit = "{!!URL::to('permisos/" + cellData + "/edit')!!}";
          @endcan
                  $(td).html(buttonsTable(show, edit));
        }
      }]
  };
</script>
@endsection