<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ url('img/favicon-96x96.png') }}">


    <title>{{ config('app.name', 'Numixx SAS') }}</title>
    @include('layouts.partialsadminlte.css')
    @yield('styles')
    <style>
      .anchoxxx{
        margin-right: 5px;
        margin-top: 14px;
      }
    </style>
  </head>
  <body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">
      <!-- Contenido para el encabezado -->

      @include('layouts.partialsadminlte.header')

      <!-- menu de la izquierda con el titulo -->
      @include('layouts.partialsadminlte.menuizquierdo') 
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper" style="">
        <!-- Content Header (Page header) -->


        <!-- Main content -->
        <section class="content">
          @if(session('info'))
          <div class="container">
            <div class="row">
              <div class="col-md-8 col-md-offset-2">
                <div class="alert alert-success">
                  {{session('info')}}
                </div>
              </div>
            </div>
          </div>
          @endif
          @if(count($errors))
          <div class="container">
            <div class="row">
              <div class="col-md-8 col-md-offset-2">
                <div class="alert alert-danger">
                  <ul>
                    @foreach($errors->all() as $error)
                    <li>
                      {{$error}}
                    </li>
                    @endforeach
                  </ul>
                </div>
              </div>
            </div>
          </div>
          @endif

          @yield('content')
        </section>
        <!-- /.content -->
      </div>
      <!-- /.content-wrapper -->
      <footer class="main-footer">
        <div class="pull-right hidden-xs">
          <b>Version</b> 2.3.8
        </div>
        <strong style="w">Copyright &copy; 2014-2016 <a href="http://almsaeedstudio.com">Almsaeed Studio</a>.</strong> All rights
        reserved.
      </footer>

    </div>
    <!-- ./wrapper -->
    @include('layouts.partialsadminlte.js')
    <script type="text/javascript">
      function buttonsTable(ver, editar) {
        var btn = '';
        if (ver != '') {
          btn += '<a class="btn btn-xs btn-info" data-toggle="tooltip" title="Ver" style=" margin-right:5px" href="' + ver + '" ><span class="glyphicon glyphicon-eye-open"></a>';
        }
        if (editar != '') {
          btn += '<a class="btn btn-xs btn-warning" style=" margin-right:5px" data-toggle="tooltip" title="Editar" href="' + editar + '"><span class="glyphicon glyphicon-edit"></span></a>';
        }
        return  btn;
      }
      var datatabl = {}
    </script>

    @yield('scripts')

    <script>

      $(document).ready(function () {
        if (Object.entries(datatabl).length != 0) {
          $('.datatable').DataTable(datatabl);
        }
        var alertas = 0;
        @can('alertas.alertas')
                setInterval(function () {
                  $.ajax({
                    url: "{{url('alertas/alertas')}}",
                    type: 'POST',
                    data: {_token: $("input[name='_token']").val(),
                    },
                    dataType: 'json',
                    success: function (json) {
                      $("#" + json.numaleid).text(json.numalert);
                      $("#" + json.cabezaid).text(json.informex);
                      $("#alertasx").empty()
                      $.each(json.dataxxxx, function (i, datosxxx) {
                        var alertasx = '';
                        alertasx += '<li>';
                        alertasx += '<a href="' + datosxxx.urlxxxxx + '">';
                        alertasx += datosxxx.mensange;
                        alertasx += '</a>';
                        alertasx += '</li>';
                        $("#alertasx").append(alertasx)
                      });
                    },
                    error: function (xhr, status) {
                      console.log(xhr + ' Disculpe, existió un problema ' + status)
                      //alert('Disculpe, existió un problema');
                    }
                  });
                }, 5000);
        @endcan
      });
    </script>
  </body>
</html>
