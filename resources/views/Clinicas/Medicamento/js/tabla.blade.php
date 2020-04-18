<script>
    $(function() {
        f_reaload = function(tablaxxx) {
            tablaxxx.ajax.reload()
        }
        var f_asingnarMedicamento = function(dataxxxx) {
            $.ajax({
                url: "{{url('api/clinica/asignarmedicame')}}",
                type: 'GET',
                data: dataxxxx,
                dataType: 'json',
                success: function(json) {
                    f_reaload(cmedicamentos)
                    f_reaload(medicamentos)
                },
                error: function(xhr, status) {
                    alert('Disculpe, existió un problema');
                },
            });
        }



        $('#cmedicamentos tbody').on('click', 'tr', function() {
            if ($(this).hasClass('btn-success')) {
                $(this).removeClass('btn-success');
            } else {
                var d = cmedicamentos.row(this).data().id;
                cmedicamentos.$('tr.btn-success').removeClass('odd btn-success');
                $(this).addClass('btn-success');
            }
        });

        @can($todoxxxx['permisox'].
            '-asiganar')
        $('#medicamentos tbody').on('click', 'tr', function() {
            if ($(this).hasClass('btn-success')) {
                $(this).removeClass('btn-success');
            } else {
                var d = medicamentos.row(this).data().id;
                medicamentos.$('tr.btn-success').removeClass('odd btn-success');

                f_asingnarMedicamento({
                    medicame: d,
                    clinicax: '{{$todoxxxx["clinicax"]}}'
                });;
                $(this).addClass('btn-success');
            }
        });
        @endcan


        $('#cmedicame').on('click', '.estadoxx', function() {
            $.ajax({
                url: "{{route('cmedicame.inactivar',$todoxxxx['parametr'])}}",
                type: 'GET',
                data: {registro:$(this).prop('id')},
                dataType: 'json',
                success: function(json) {
                    f_reaload(cmedicamentos);
                },
                error: function(xhr, status) {
                    alert('Disculpe, existió un problema');
                },
            });
        });
    });
</script>