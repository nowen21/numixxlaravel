@extends('layouts.adminlte')

@section('styles')
<link href="https://cdn.datatables.net/1.10.12/css/jquery.dataTables.min.css" rel="stylesheet">
@endsection

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-10 col-md-offset-1">
      <div class="panel panel-default">
        <div class="panel-heading">Usuarios
          @can('users.create')
          <a href="{{route('users.create')}}" class="btn btn-sm btn-info pull-right" role="button">Crear</a>
          @endcan
        </div>

        <div class="panel-body">
          <table class="table table-hover table-bordered table-striped datatable" style="width:100%">
            <thead>
              <tr>
                <th>Id</th>
                <th>Nombres</th>
                <th>Email</th>
                <th style="width: 70px">Opciones</th>
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
          ajax: '{{ route('users.getdata') }}',
          columns: [
          {data: 'id', name: 'id'},
          {data: 'name', name: 'name'},
          {data: 'email', name: 'email'},
          {data: 'id', name: 'id'},
          ],
          columnDefs:[{
          targets:3,
                  createdCell:function(td, cellData, rowData, row, col){
                  var show = '';
                  var edit = '';
                  @can('users.show')
                          show = "{!!URL::to('users/" + cellData + "')!!}";
                  @endcan
                          @can('users.edit')
                          edit = "{!!URL::to('users/" + cellData + "/edit')!!}";
                  @endcan
                          $(td).html(buttonsTable(show, edit));
                  }
          }]
  };
</script>
@endsection