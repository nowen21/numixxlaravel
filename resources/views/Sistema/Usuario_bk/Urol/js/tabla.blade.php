<script>
$(function(){
    f_reaload=function(tablaxxx){
        tablaxxx.ajax.reload()
    }
    var f_asingnarQuitar=function(dataxxxx){
        $.ajax({
            url: "{{url('api/usuario/asignarol')}}",
            type: 'GET',
            data: dataxxxx,
            dataType: 'json',
            success: function (json) {
                f_reaload(tablaroles)
                f_reaload(tablauroles)
            },
            error: function (xhr, status) {
            alert('Disculpe, existió un problema');
            },
        });
    }
    $('#tablauroles tbody').on( 'click', '.btn-danger', function () { 
        f_asingnarQuitar({rolxxxxx:$(this).prop('id'),padrexxx:'{{$todoxxxx["padrexxx"]}}',asigquit:2});
    } );

    $('#tablaroles tbody').on( 'click', 'tr', function () {
        if ( $(this).hasClass('btn-success') ) { 
            $(this).removeClass('btn-success');
        }
        else { 
            var rolxxxxx = tablaroles.row( this ).data().id; 
            tablaroles.$('tr.btn-success').removeClass('odd btn-success');
            f_asingnarQuitar({rolxxxxx:rolxxxxx,padrexxx:'{{$todoxxxx["padrexxx"]}}',asigquit:1});
            $(this).addClass('btn-success');
        }
    });
   
});
</script>