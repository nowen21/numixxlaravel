@extends('layouts.adminlte')

@section('styles')
<link href="https://cdn.datatables.net/1.10.12/css/jquery.dataTables.min.css" rel="stylesheet">
@endsection

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-10 col-md-offset-1">
      <div class="panel panel-default">
        <div class="panel-heading">Listado Marcas para Dispositivos Médicos
          @can('medicamentos.create')
          <a href="{{route('dmarcas.create')}}" class="btn btn-sm btn-info pull-right"  role="button">Crear</a>
          @endcan
        </div>

        <div class="panel-body">
          <table class="table table-hover table-bordered table-striped datatable" style="width:100%">
            <thead>
              <tr>
                <th>Id</th>               
                <th>Nombre Comercial</th>                
                <th>Osmoralidad</th>
                <th>Peso Específico</th>
                <th>Forma Farmaceúticaa</th>
                <th>Estado</th>
                <th style="width: 100px">Opciones</th>
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
    ajax: '{{ route("dmarcas.getdata") }}',
    columns: [
      {data: 'id', name: 'id'},
      {data: 'nombcome', name: 'nombcome'},
      {data: 'osmorali', name: 'osmorali'},
      {data: 'pesoespe', name: 'pesoespe'},
      {data: 'formfarm', name: 'formfarm'},
      {data: 'estadoxx', name: 'estadoxx'},
      {data: 'opciones', name: 'opciones'},
    ],
    columnDefs: [{
        targets: 6,
        createdCell: function (td, cellData, rowData, row, col) {
          var show = '';
          var edit = '';
          @can('dmarcas.show')
                  show = "{!!URL::to('dmarcas/" + rowData.id + "')!!}";
          @endcan
                  @can('marcas.edit')
                  edit = "{!!URL::to('dmarcas/" + rowData.id + "/edit')!!}";
          @endcan
                  $(td).html(buttonsTable(show, edit));
        }
      }]
  };
</script>
@endsection