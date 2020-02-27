<script>
    $(function(){
        f_reaload=function(tablaxxx){
            tablaxxx.ajax.reload()
        }
        var f_asingnarMedicamento=function(dataxxxx){
            $.ajax({
                url: "{{url('api/clinica/asignarRango')}}",
                type: 'GET',
                data: dataxxxx,
                dataType: 'json',
                success: function (json) {
                    f_reaload(tablacrango)
                    f_reaload(tablarango)
                },
                error: function (xhr, status) {
                alert('Disculpe, existió un problema');
                },
            });
        }

       

    $('#tablacrango tbody').on( 'click', 'tr', function () {
        if ( $(this).hasClass('btn-success') ) {
            $(this).removeClass('btn-success');
        }
        else { 
            var d = tablacrango.row( this ).data().id;
            tablacrango.$('tr.btn-success').removeClass('odd btn-success');
            $(this).addClass('btn-success');
        }
    } );
   
    @can($todoxxxx['permisox'].'-asiganar')
        $('#tablarango tbody').on( 'click', 'tr', function () {
            if ( $(this).hasClass('btn-success') ) {
                $(this).removeClass('btn-success');
            }
            else { 
                var d = tablarango.row( this ).data().id; 
                tablarango.$('tr.btn-success').removeClass('odd btn-success');
                f_asingnarMedicamento({rangoxxx:d,clinicax:'{{$todoxxxx["clinicax"]}}'});
                $(this).addClass('btn-success');
            }
        });
    @endcan
});
</script>