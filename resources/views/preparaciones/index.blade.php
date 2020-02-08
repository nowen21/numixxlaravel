@extends('layouts.adminlte')

@section('styles')
<link href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" rel="stylesheet">
<link href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.dataTables.min.css" rel="stylesheet">
@endsection

@section('content')
<div class="container">
  <div class="row">
    <div class="panel panel-default">
      <div class="panel-heading">Listado Preparaciones</div>
      <div class="panel-body">

        <table class="table table-hover table-bordered table-striped datatable" style="width:100%">
          <thead>
            <tr>
              <th>Lote Interno</th>  
              <th style="width: 70px">Opciones</th>
              <th>Cédula</th>
              <th>Paciente</th>
              <th>Clinica</th>
              <th>Fecha</th>
              <th>Estado</th>
              <th>Estado Preparación</th>   

            </tr>
          </thead>
          <tfoot>
            <tr>
              <th>Lote Interno</th>
              <th style="width: 70px">Opciones</th>
              <th>Cédula</th>
              <th>Paciente</th>
              <th>Clinica</th>
              <th>Fecha</th>
              <th>Estado</th>
              <th>Estado Preparación</th>
            </tr>
          </tfoot>
        </table>
      </div>
    </div>

  </div>
</div>
@endsection

@section('scripts')
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
<script>

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
          responsive:true,
          processing: true,
          serverSide: true,
          order: [ [ 7, "desc" ]],
          ajax: '{{ route("preparaciones.getdata") }}',
          columns: [
          {data: 'id', name: 'id'},
          {data: 'opciones', name: 'opciones'},
          {data: 'cedulaxx', name: 'cedulaxx'},
          {data: 'paciente', name: 'paciente'},
          {data: 'clinicax', name: 'clinicax'},
          {data: 'fechaxxx', name: 'fechaxxx'},
          {data: 'estadoxx', name: 'estadoxx'},
          {data: 'mensajex', name: 'mensajex'},
          ],
          columnDefs: [{
          targets: 1,
                  createdCell: function (td, cellData, rowData, row, col) {
                  var show = '';
                  var edit = '';
                  @can('preparaciones.show')
                          show = "{!!URL::to('preparaciones/" + rowData.id + "')!!}";
                  @endcan
                          @can('preparaciones.edit')
                          if (rowData.actualiz == 1){
                  edit = "{!!URL::to('preparaciones/" + rowData.id + "/edit')!!}";
                  }

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