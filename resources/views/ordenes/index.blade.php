@extends('layouts.adminlte')

@section('styles')
<link href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" rel="stylesheet">
<link href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.dataTables.min.css" rel="stylesheet">
@endsection

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-10 col-md-offset-1">
      <div class="panel panel-default">
        <div class="panel-heading">Listado de Órdenes de Producción

        </div>

        <div class="panel-body">
          <div class="table-responsive">
            <table class="table table-hover table-bordered table-striped datatable" style="width:100%">
              <thead>
                <tr>
                  <th>Id</th>
                  <th style="width:50px">Acciones</th>
                  <th>Oreden de Producción</th>
                  <th>Fecha</th>  

                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th>Id</th>
                  <th style="width: 50px">Acciones</th>
                  <th>Oreden de Producción</th>
                  <th>Fecha</th>  

                </tr>
              </tfoot>
            </table>
          </div>
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
    ajax: '{{ route("ordenes.getdata") }}',
    columns: [
      {data: 'id', name: 'id'},
      {data: 'opciones', name: 'opciones'},
      {data: 'ordeprod', name: 'ordeprod'},
      {data: 'fechcrea', name: 'fechcrea'},
    ],
    order: [[3, "desc"]],
    columnDefs: [{
        targets: 1,
        createdCell: function (td, cellData, rowData, row, col) {

          var form = ' <span class="d-inline-block" tabindex="0" data-toggle="tooltip" title="Imprimir Orden">';
          var formu = "{!!URL::to('reportes/ordenes/" + rowData.ordeprod + "')!!}";
          form += '<a class="btn btn-xs btn-info" style=" margin-left:30px " target="_blank" href="' + formu + '"><span class="glyphicon glyphicon-print"></span></a>';
          form += '</span>';

          $(td).html(form);
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