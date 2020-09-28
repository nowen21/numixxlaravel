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
    var preg = /^([0-9]+\.?[0-9]{0,2})$/;
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
    var f_peso_establecido = function(dataxxxx) {
        $('#limitesx').empty();
      $.ajax({
        url: "{{route('controlt.pesoreal')}}",
        data: dataxxxx.dataxxxx,
        type: 'GET',
        dataType: 'json',
        success: function(json) {
            $("#limitesx").append('<option value="'+json.valuexxx+'">'+json.opcionxx+'</option>');
        },
        error: function(xhr, status) {
          alert('Disculpe, existió un problema');
        },
      });
    }
    $('#realxxx_').keyup(function() {
      f_peso_establecido({dataxxxx:{pesoreal:$(this).val(),pesoteor:$("#teorico_").val()}});
    });

  });
</script>
