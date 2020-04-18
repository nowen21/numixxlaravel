<script>
  $(function(){
    $('.select2').select2({
      language: "es"
    });
    $(".numerico").keyup(function () {
      var id = $(this).prop('id').split('_')

      $.ajax({
        url: "{{route('concilia.esnumerico')}}",
        type: 'POST',
        data: {_token: $("input[name='_token']").val(),
          cantcons: $(this).val(),
          idcancon: id,
          cantalis: $('#' + id[0] + '_' + id[1]).val()
        },
        dataType: 'json',

        success: function (json) {
          if (json.cantmayo) {
            alert('la cantidad sobrante no puede ser mayor a la alistada')
            $('#' + json.idiferen).val(json.cantalis);
            $('#' + json.idcancon).val(0);
          } else {
            $('#' + json.idcancon).val(json.diferenc);

          }
        },

        error: function (xhr, status) {
          alert('Disculpe, existió un problema');
        },

      });
    });

  });
</script>