@extends('layouts.adminlte')

@section('styles')
<link href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" rel="stylesheet">
<link href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.dataTables.min.css" rel="stylesheet">
@endsection

@section('content')
<div class="container">
  <div class="row">

    <div class="panel panel-default">
      <div class="panel-heading">Listado de pacientes
        @can('pacienteservicio.create')
        <a href="{{route('pacienteservicio.create')}}" class="btn btn-sm btn-info pull-right"  role="button">Crear</a>
        @endcan
      </div>
      <div class="panel-body">
        <div class="table-responsive">
          <table id="tablepacientes" class="table table-hover table-bordered table-striped datatable" style="width:100%">
            <thead>
              <tr>
                <th>Id</th> 
                <th style="width: 200px">Acciones</th>
                <th>Nombres</th>
                <th>Apellidos</th>
                <th>Servicios</th>
                <th>Estado</th> 
              </tr>
            </thead>
            <tfoot>
              <tr>
                <th>Id</th>
                <th>Acciones</th>
                <th>Nombres</th>
                <th>Apellidos</th>
                <th>Servicios</th>
                <th>Estado</th>

              </tr>
            </tfoot>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
@section('scripts')
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
<script type="text/javascript">

  datatabl = {
    responsive: true,
    "lengthMenu": [
      [10, 25, 50, -1],
      ['10', '25', '50', 'Motrar Todos']
    ],
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
    ajax: '{{ route("pacienteservicio.getdata") }}',
    columns: [
      {data: 'id', name: 'id'},
      {data: 'acciones', name: 'acciones'},
      {data: 'nombres', name: 'nombres'},
      {data: 'apellidos', name: 'apellidos'},
      {data: 'servicio', name: 'servicio'},
      {data: 'estado_id', name: 'estado_id'},
    ],
    columnDefs: [{
        targets: 1,
        createdCell: function (td, cellData, rowData, row, col) {
          var show = '';
          var edit = '';
          @can('pacienteservicio.show')
                  show = "{!!URL::to('pacienteservicio/" + rowData.id + "')!!}";

          @endcan
                  @can('pacienteservicio.edit')
                  edit = "{!!URL::to('pacienteservicio/" + rowData.id + "/edit')!!}";
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
  }
</script>
@endsection