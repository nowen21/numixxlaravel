@extends('layouts.adminlte')

@section('styles')
<link href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" rel="stylesheet">
<link href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.dataTables.min.css" rel="stylesheet">
@endsection

@section('content')
<div class="container">
  <div class="row">
    <div class="panel panel-default">
      <div class="panel-heading">Listado Formulaciones</div>
      <div class="panel-body">

        <table class="table table-hover table-bordered table-striped datatable" style="width:100%">
          <thead>
            <tr>
              <th>Lote Interno</th>  
              <th style="width: 150px">Opciones</th>
              <th>Paciente</th>
              <th>Clinica</th>
              <th>Fecha</th>
              <th>Estado</th>
            </tr>
          </thead>
          <tfoot>
            <tr>
              <th>Lote Interno</th>  
              <th style="width: 150px">Opciones</th>
              <th>Paciente</th>
              <th>Clinica</th>
              <th>Fecha</th>
              <th>Estado</th>

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
  decimal: "",
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
          ajax: '{{ route("npt.getdata") }}',
          columns: [
          {data: 'id', name: 'id'},
          {data: 'opciones', name: 'opciones'},
          {data: 'paciente', name: 'paciente'},
          {data: 'clinicax', name: 'clinicax'},
          {data: 'fechaxxx', name: 'fechaxxx'},
          {data: 'estadoxx', name: 'estadoxx'},
          ],
          columnDefs:[{
          targets:1,
                  createdCell:function(td, cellData, rowData, row, col){
                  var show = '';
                  var edit = '';
                  var prinremi = '';
                  var form = '<a class="btn btn-xs btn-info" style=" margin-left:5px" data-toggle="tooltip" title="' + rowData.titlexxx + '" target="' + rowData.targetxx + '" href="' + rowData.urlxxxxx + '"><span class="glyphicon glyphicon-' + rowData.iconxxxx + '"></span></a>';
                  @can('npt.show')
                          show = "{!!URL::to('npt/" + rowData.id + "')!!}";
                  @endcan
                          @can('npt.edit')
                          if (rowData.editarxx == 1 && rowData.clinicay == 1){
                  edit = "{!!URL::to('npt/" + rowData.id + "/edit')!!}";
                  }

                  @endcan
                          $(td).html(buttonsTable(show, edit) + form + prinremi);
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