@extends('layouts.adminlte')

@section('styles')
<link href="https://cdn.datatables.net/1.10.12/css/jquery.dataTables.min.css" rel="stylesheet">
<link href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.dataTables.min.css" rel="stylesheet">
@endsection

@section('content')
<div class="container">
  <div class="row">

    <div class="panel panel-default">
      <div class="panel-heading">Listado de Productos Terminados

        @can('terminados.create')
        <a href="{{route('terminados.create')}}" class="btn btn-sm btn-info pull-right"  role="button">Crear</a>
        @endcan
      </div>
      <div class="panel-body">

        <table id="tablepacientes" class="table table-hover table-bordered table-striped datatable" style="width:100%">
          <thead>
            <tr>
              <th>Id</th>
              <th style="width: 70px">Acciones</th>
              <th>Proceso</th>
              <th>Lote Interno</th>
              <th>Fecha</th>

            </tr>
          </thead>
          <tfoot>
            <tr>
              <th>Id</th>
              <th style="width: 70px">Acciones</th>
              <th>Proceso</th>
              <th>Lote Interno</th>
              <th>Fecha</th>

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
<script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
<script type="text/javascript">
  datatabl = {
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
    responsive: true,
    processing: true,
    serverSide: true,
    ajax: '{{ route("terminados.getdata") }}',
    columns: [
      {data: 'id', name: 'id'},
      {data: 'opciones', name: 'opciones'},
      {data: 'procesox', name: 'procesox'},
      {data: 'lotexxxx', name: 'lotexxxx'},
      {data: 'fechaxxx', name: 'fechaxxx'},
    ],
    order: [[3, "desc"]],
    columnDefs: [{
        targets: 1,
        createdCell: function (td, cellData, rowData, row, col) {
          var show = '';
          var edit = '';
          @can('terminados.show')
                  show = "{!!URL::to('terminados/" + rowData.id + "')!!}";
          @endcan
                  if (rowData.actualiz == 1) {
            @can('terminados.edit')
                    edit = "{!!URL::to('terminados/" + rowData.id + "/edit')!!}";
            @endcan
          }
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