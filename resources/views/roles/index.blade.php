@extends('layouts.adminlte')

@section('styles')
<link href="https://cdn.datatables.net/1.10.12/css/jquery.dataTables.min.css" rel="stylesheet">
@endsection

@section('content')
<div class="container">
  <div class="row">
    <div class="panel panel-default">
      <div class="panel-heading">Listado de Roles

        @can('users.create')
        <a href="{{route('roles.create')}}" class="btn btn-sm btn-info pull-right"  role="button">Crear</a>
        @endcan
      </div>
      <div class="panel-body">
        <table id="tablepacientes" class="table table-hover table-bordered table-striped datatable" style="width:100%">
          <thead>
            <tr>
              <th>Id</th>
              <th>Rol</th>
              <th>Slug</th>
              <th>Descripción</th>
              <th style="width: 100px">Acciones</th>
            </tr>
          </thead>
          <tfoot>
            <tr>
              <th>Id</th>
              <th>Rol</th>
              <th>Slug</th>
              <th>Descripción</th>
              <th style="width: 100px">Acciones</th>
            </tr>
          </tfoot>
        </table>
      </div>
    </div>
  </div>
</div>
@endsection
@section('scripts')
<script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
<script type="text/javascript">
  datatabl = {
    processing: true,
    serverSide: true,
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
    ajax: '{{ route("roles.getdata") }}',
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
          @can('roles.show')
                  show = "{!!URL::to('roles/" + cellData + "')!!}";
          @endcan
                  @can('roles.edit')
                  edit = "{!!URL::to('roles/" + cellData + "/edit')!!}";
          @endcan
                  $(td).html(buttonsTable(show, edit));
        }

      }],
    initComplete: function () {
      this.api().columns().every(function () {
        var column = this;
        var select = $('<select><option value=""></option></select>')
                .appendTo($(column.footer()).empty())
                .on('change', function () {
                  var val = $.fn.dataTable.util.escapeRegex(
                          $(this).val()
                          );
                  column
                          .search(val ? '^' + val + '$' : '', true, false)
                          .draw();
                });
        column.data().unique().sort().each(function (d, j) {
          select.append('<option value="' + d + '">' + d + '</option>')
        });
      });
    }
  };
</script>
@endsection