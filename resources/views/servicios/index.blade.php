@extends('layouts.adminlte')

@section('styles')
<link href="https://cdn.datatables.net/1.10.12/css/jquery.dataTables.min.css" rel="stylesheet">
<link href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.dataTables.min.css" rel="stylesheet">
@endsection

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-10 col-md-offset-1">
      <div class="panel panel-default">
        <div class="panel-heading">Listado Servicios
          @can('servicios.create')
          <a href="{{route('servicios.create')}}"  class="btn btn-sm btn-info pull-right" role="button">Crear</a>
          @endcan
        </div>

        <div class="panel-body">
          <table class="table table-hover table-bordered table-striped datatable" style="width:100%">
            <thead>
              <tr>
                <th>Id</th>
                <th style="width: 70px">Opciones</th>
                <th>Nombre</th>
                <th>Clínica</th>
                <th>Estado</th>                
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
<script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
<script type="text/javascript">

  $(document).ready(function () {
    $('.datatable').DataTable({
      processing: true,
      responsive: true,
      serverSide: true,
      ajax: '{{ route("servicios.getdata") }}',
      columns: [
        {data: 'id', name: 'id'},
        {data: 'opciones', name: 'opciones'},
        {data: 'nombre', name: 'nombre'},
        {data: 'clinicax', name: 'clinicax'},
        {data: 'estado', name: ' estado'},
        
      ],
      columnDefs: [{
          targets: 1,
          createdCell: function (td, cellData, rowData, row, col) {
            var show = '';
            var edit = '';
            @can('servicios.show')
                    show = "{!!URL::to('servicios/" + rowData.id + "')!!}";
            @endcan
                    @can('servicios.edit')
                    edit = "{!!URL::to('servicios/" + rowData.id + "/edit')!!}";
            @endcan
                    $(td).html(buttonsTable(show, edit));
          }
        }]
    });
  });
</script>
@endsection