<script>
    $(function(){
        $('#tablacrango tbody').on( 'click', 'tr', function () {
            if ( $(this).hasClass('btn-success') ) {
                $(this).removeClass('btn-success');
            }
            else { 
                var d = tablacrango.row( this ).data().id;
                tablacrango.$('tr.btn-success').removeClass('odd btn-success');
                $(this).addClass('btn-success');
            }
        });
    });
</script>