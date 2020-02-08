@extends('layouts.adminlte')

@section('styles')
<link href="https://cdn.datatables.net/1.10.12/css/jquery.dataTables.min.css" rel="stylesheet">
@endsection
@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-10 col-md-offset-1">
      <div class="panel panel-default">
        <div class="panel-heading">Listado Clínicas Remisiones
          @can('remisiones.create')
          <a href="{{route('remisiones.create')}}" class="btn btn-sm btn-info pull-right" role="button">Crear</a>
          @endcan
        </div>
        <div class="panel-body">
          <table class="table table-hover table-bordered table-striped datatable" style="width:100%">
            <thead>
              <tr>
                <th>Lote</th>
                <th style="width: 120px">Opciones</th>
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
<script type="text/javascript">

  $(document).ready(function () {
    $('.datatable').DataTable({
      processing: true,
      serverSide: true,
      ajax: '{{ route("remisiones.getdata") }}',
      columns: [
        {data: 'id', name: 'id'},
        {data: 'opciones', name: 'opciones'},
        {data: 'clinicax', name: 'clinicax'},

        {data: 'estad_id', name: 'estad_id'},
      ],
      columnDefs: [{
          targets: 1,
          createdCell: function (td, cellData, rowData, row, col) {
            var show = '';
            var edit = '';
            var prinremi = '';
            @can('reportes.remision')
                    prinremi = '<a class="btn btn-xs btn-info" data-toggle="tooltip" title="Imprimir Remisión" style=" margin-left:5px" target="_blank" href="reportes/remision/' + rowData.id + '"><span class="glyphicon glyphicon-cloud-download"></span></a>';
            @endcan
                    @can('rangos.show')
                    show = "{!!URL::to('remisiones/" + rowData.id + "')!!}";
            @endcan

                    @can('rangos.edit')
                    edit = "{!!URL::to('remisiones/" + rowData.id + "/edit')!!}";
            @endcan
                    $(td).html(buttonsTable(show, edit) + prinremi);
          }
        }]
    });
  });
</script>
@endsection