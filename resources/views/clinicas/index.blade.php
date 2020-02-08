@extends('layouts.adminlte')

@section('styles')
<link href="https://cdn.datatables.net/1.10.12/css/jquery.dataTables.min.css" rel="stylesheet">
@endsection

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-10 col-md-offset-1">
      <div class="panel panel-default">
        <div class="panel-heading">Listado Clínicas
          @can('clinicas.create')
          <a href="{{route('clinicas.create')}}" class="btn btn-sm btn-info pull-right" role="button">Crear</a>
          @endcan
        </div>

        <div class="panel-body">
          <table class="table table-hover table-bordered table-striped datatable" style="width:100%">
            <thead>
              <tr>
                <th>Id</th>
                <th>Nombre</th>
                <th>Estado</th>                
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

  $(document).ready(function() {
  $('.datatable').DataTable({
  processing: true,
          serverSide: true,
          ajax: '{{ route('clinicas.getdata') }}',
          columns: [
          {data: 'id', name: 'id'},
          {data: 'nombre', name: 'nombre'},
          {data: 'estado', name: ' estado'},
          {data: 'id', name: 'id'},
          ],
          columnDefs:[{
          targets:3,
                  createdCell:function(td, cellData, rowData, row, col){
                  var show = '';
                  var edit = '';
                  @can('clinicas.show')
                          show = "{!!URL::to('clinicas/" + cellData + "')!!}";
                  @endcan

                          @can('clinicas.edit')
                          edit = "{!!URL::to('clinicas/" + cellData + "/edit')!!}";
                  @endcan
                          $(td).html(buttonsTable(show, edit));
                  }
          }]
  });
  });
</script>
@endsection