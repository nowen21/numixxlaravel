<script>
    function filterFloat(evt, input) {
        // Backspace = 8, Enter = 13, ‘0′ = 48, ‘9′ = 57, ‘.’ = 46, ‘-’ = 43
        var key = window.Event ? evt.which : evt.keyCode;
        var chark = String.fromCharCode(key);
        var tempValue = input.value + chark;
        if (key >= 48 && key <= 57) {
            if (filter(tempValue) === false) {
                return false;
            } else {
                return true;
            }
        } else {
            if (key == 8 || key == 13 || key == 0) {
                return true;
            } else if (key == 46) {
                if (filter(tempValue) === false) {
                    return false;
                } else {
                    return true;
                }
            } else {
                return false;
            }
        }
    }
    function filter(__val__) {
        var preg = /^-?[0-9]+([,\.][0-9]*)?$/;
        if (preg.test(__val__) === true) {
            return true;
        } else {
            return false;
        }

    }
    $(function() {
        $('.select2').select2({
            language: "es",
            theme: 'bootstrap4'
        });
        var f_condicio = function(dataxxxx) {
            $('#condicio_id').empty();
            $.ajax({
                url: "{{url('api/clinica/condicio')}}",
                type: 'GET',
                data: {
                    clinicax: '{{$todoxxxx["clinicax"]}}',
                    crangoxx: dataxxxx.crangoxx
                },
                dataType: 'json',
                success: function(json) {
                    $.each(json, function(i, d) {
                        var selected = '';
                        if (dataxxxx.selected == d.valuexxx) {
                            selected = 'selected';
                        }
                        $('#condicio_id').append('<option ' + selected + ' value="' + d.valuexxx + '">' + d.optionxx + '</option>')
                    });
                },
                error: function(xhr, status) {
                    alert('Disculpe, existió un problema');
                },

            });
        }
        $("#rango_id").change(function() {
            f_condicio({
                selected: '',
                crangoxx: $(this).val()
            })

        });
    });
</script>
