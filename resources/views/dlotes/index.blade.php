@extends('layouts.adminlte')

@section('styles')
<link href="https://cdn.datatables.net/1.10.12/css/jquery.dataTables.min.css" rel="stylesheet">
<link href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.dataTables.min.css" rel="stylesheet">
@endsection

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-10 col-md-offset-1">
      <div class="panel panel-default">
        <div class="panel-heading">Listado Lotes
          @can('medicamentos.create')
          <a href="{{route('dlotes.create')}}" class="btn btn-sm btn-info pull-right"  role="button">Crear</a>
          @endcan
        </div>

        <div class="panel-body">
          <div class="table-responsive">
            <table class="table table-hover table-bordered table-striped datatable" style="width:100%">
              <thead>
                <tr>
                  <th>Id</th>   
                  <th style="width: 100px">Opciones</th>
                  <th>Fecha Vencimiento</th>                
                  <th>Inventario</th>                
                  <th>Lote</th>                
                  <th>Registro Invima</th>
                  <th>Dispositivo Médico</th>
                  <th>Marca</th>
                  <th>Estado</th>

                </tr>
              </thead>
            </table>
          </div>
        </div>
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
    responsive: true,
    language: {
      "decimal": "",
      "emptyTable": "No hay información",
      "info": "Mostrando _START_ a _END_ de _TOTAL_ Entradas",
      "infoEmpty": "Mostrando 0 a 0 de 0 Entradas",
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
    ajax: '{{ route("dlotes.getdata") }}',
    columns: [
      {data: 'id', name: 'id'},
      {data: 'opciones', name: 'opciones'},
      {data: 'fechvenc', name: 'fechvenc'},
      {data: 'inventar', name: 'inventar'},
      {data: 'lotexxxx', name: 'lotexxxx'},
      {data: 'reginvim', name: 'reginvim'},
      {data: 'nombgene', name: 'nombgene'},
      {data: 'formfarm', name: 'formfarm'},
      {data: 'estadoxx', name: 'estadoxx'},
    ],
    columnDefs: [{
        targets: 1,
        createdCell: function (td, cellData, rowData, row, col) {
          var show = '';
          var edit = '';
          @can('dlotes.show')
                  show = "{!!URL::to('dlotes/" + rowData.id + "')!!}";
          @endcan
                  @can('dlotes.edit')
                  edit = "{!!URL::to('dlotes/" + rowData.id + "/edit')!!}";
          @endcan
                  $(td).html(buttonsTable(show, edit));
        }
      }]
  };
</script>
@endsection