<script>
  $(function(){
    $('.select2').select2({
      language: "es"
    });
    $("#servicio").keyup(function () {
      $(this).val($(this).val().toUpperCase())
    });
  });
</script>