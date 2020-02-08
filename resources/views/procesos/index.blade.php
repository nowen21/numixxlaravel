@extends('layouts.adminlte')

@section('styles')
<link href="https://cdn.datatables.net/1.10.12/css/jquery.dataTables.min.css" rel="stylesheet">
@endsection

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-10 col-md-offset-1">
      <div class="panel panel-default">
        <div class="panel-heading">Listado de Procesos

          @can('procesos.create')
          <a href="{{route('procesos.create')}}" class="btn btn-sm btn-info pull-right"  role="button">Crear</a>
          @endcan
        </div>
        <div class="panel-body">
          <table id="tablepacientes" class="table table-hover table-bordered table-striped datatable" style="width:100%">
            <thead>
              <tr>
                <th>Id</th>
                <th>Lote Interno</th>
                <th>Creado</th>
                <th>Actualizado</th>
                <th style="width: 100px">Acciones</th>
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
    language: {
      "decimal": "",
      "emptyTable": "No hay información",
      "info": "Mostrando _START_ a _END_ de _TOTAL_ Entradas",
      "infoEmpty": "Mostrando 0 to 0 of 0 Entradas",
      "infoFiltered": "(Filtrado de _MAX_ total registros)",
      "infoPostFix": "",
      "thousands": ",",
      "lengthMenu": "Mostrar _MENU_ registros",
      "loadingRecords": "Cargando...",
      "processing": "Procesando...",
      "search": "Buscar:",
      "zeroRecords": "Sin resultados encontrados",
      "paginate": {
        "first": "Primero",
        "last": "Ultimo",
        "next": "Siguiente",
        "previous": "Anterior"
      }
    },
    processing: true,
    serverSide: true,
    ajax: '{{ route("procesos.getdata") }}',
    columns: [
      {data: 'id', name: 'id'},
      {data: 'lotexxxx', name: 'lotexxxx'},
      {data: 'created_at', name: 'created_at'},
      {data: 'updated_at', name: 'updated_at'},
      {data: 'opciones', name: 'opciones'},
    ],
    columnDefs: [{
        targets: 4,
        createdCell: function (td, cellData, rowData, row, col) {
          var show = '';
          var edit = '';
          @can('procesos.show')
                  show = "{!!URL::to('procesos/" + rowData.id + "')!!}";

          @endcan
                  if (rowData.actualiz == 1) {
            @can('procesos.edit')
                    edit = "{!!URL::to('procesos/" + rowData.id + "/edit')!!}";
            @endcan
          }
          $(td).html(buttonsTable(show, edit));
        }

      }]
  };
</script>
@endsection