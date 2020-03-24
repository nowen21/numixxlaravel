<script>
  $(function(){
    $('.select2').select2({
      language: "es"
    });
    $("#name").keyup(function () {
      $(this).val($(this).val().toUpperCase())
    });
  });
</script>