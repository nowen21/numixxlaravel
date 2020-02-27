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
  $(document).ready(function () {
    $('.select2').select2({
      language: "es"
    });

    $('#multivit').on('change', function (e) {
      if ($(this).val() == 20) {
        $('#ocultarx').hide("fast");
      } else {
        $('#ocultarx').show("slow");
      }
    })
    var recalcular = function () {
      var agua = $('#formulario').serializeArray()
      $.each(agua, function (i, valor) {
        var valido = valor.name.split('_')
        if (valido.length > 1 && valido[1] == 'cant' && valor.value > 0) {
          f_ajax(valido[0] + '_cant');
        }
      });
    }
    $('.medicamento').on('change', function (e) {
      if ($(this).prop('id') != 'aguaeste') {
        recalcular();
      }
    })
    $('.calcularvolumen').on('keyup', function () {

      $("#velocidad").val($('#volumen').val() / $('#tiempo').val());
    });
    $('#peso').on('keyup', function () {
      recalcular();
    });
    //dataxxxx={'medicame':?,'campo_id':?,'compauxi':?}
    var f_ajax = function (campo_id) {
      var dataxxxx = $('#formulario').serializeArray()
      dataxxxx.push({name: "npt_id", value: '{{$todoxxxx["paciente"]->npt_id}}'});
      $("#" + campo_id.split('_')[0] + '_cant').prop('title', '');
      $.ajax({
        url: "{{url('api/cformula/volumen')}}",
        type: 'GET',
        data: {
          dataxxxx: dataxxxx,
          campo_id: campo_id
        },
        dataType: 'json',
        success: function (json) {
          $("#" + campo_id.split('_')[0] + '_unid').text(json.unidadxx)
          if (json.tipocamp == 'cant') {
            $("#" + json.campvolu).val(json.valovolu);
          } else {
            $("#" + json.campcant).val(json.valocant);
          }
          if (json.mostmess) {
            $("#" + campo_id.split('_')[0] + '_cant').attr("data-original-title", json.menssage);
            //$("#"+campo_id.split('_')[0]+'_cant').prop('title',json.menssage);
            $("#" + campo_id.split('_')[0] + '_cant').tooltip("show");
            //, 'title'=>""
          } else {
            $("#" + campo_id.split('_')[0] + '_cant').prop('title', ''); //, 'title'=>""
            $("#" + campo_id.split('_')[0] + '_cant').tooltip("hide");
          }

        },
        error: function (xhr, status) {
          alert('Disculpe, existió un problema');
        }
      });
    }

    var windowsx = function () {
      var respuest = false;
      var isMobile = {
        Android: function () {
          return navigator.userAgent.match(/Android/i);
        },
        BlackBerry: function () {
          return navigator.userAgent.match(/BlackBerry/i);
        },
        iOS: function () {
          return navigator.userAgent.match(/iPhone|iPad|iPod/i);
        },
        Opera: function () {
          return navigator.userAgent.match(/Opera Mini/i);
        },
        Windows: function () {
          return navigator.userAgent.match(/IEMobile/i);
        }
      };
      if (isMobile.Android()){
        respuest = true;
      } else if (isMobile.BlackBerry()){
        respuest = true;
      } else if (isMobile.iOS()){
        respuest = true;
      } else if (isMobile.Opera()){
        respuest = true;
      } else if (isMobile.Windows()){
        respuest = true;
      }
      return respuest;
    }

    $('.input-number').on('keyup', function (event) {


      var aguaeste = $(this).attr('id').split('_');
      var codigo = event.keyCode;
      if ((((codigo >= 96 && codigo <= 105) || (codigo >= 48 && codigo <= 57)) && aguaeste[0] != 'aguaeste') || codigo == 8 && aguaeste[0] != 'aguaeste' || windowsx()==true) {

        if (!$("#tiempo").val() > 0) {
          $(this).val('');
          alert('primero ingrese el tiempo de infosión');
          $("#tiempo").focus();
          return false;
        }
        if (!$("#velocidad").val() > 0) {
          $(this).val('');
          alert('primero ingrese la velocidad de infosión');
          $("#velocidad").focus();
          return false;
        }
        if (!$("#purga").val() > 0) {
          $(this).val('');
          alert('primero ingrese la prurga');
          $("#purga").focus();
          return false;
        }
        if (!$("#peso").val() > 0) {
          $(this).val('');
          alert('primero ingrese el peso');
          $("#peso").focus();
          return false;
        }
        f_ajax($(this).attr('id'));
      }
    });
    setInterval(function () {

      var aguax_id = 0;

      var agua = $('#formnpt').serializeArray()
      $.each(agua, function (i, valor) {
        var valido = valor.name.split('_')
        if (valido.length > 1 && valido[1] == 'volu' && valor.value > 0 && valido[0] != 'aguaeste') {
          aguax_id = parseFloat(aguax_id) + parseFloat(valor.value);
        }
      });
      $("#aguaeste_volu").val($("#volumen").val() - aguax_id);
    }, 500);



    $('.guardarx').click(function () {
      var hayalmenosuno = 0;
      var vaciosxx = 0
      $("#formulaciontable input").each(function () {
        if ($(this).val() > 0) {
          hayalmenosuno = 1;
        }
        if ($(this).prop('id').split('_')[1] == 'cant' && $(this).val() == 0 || $(this).val() == '') {
          vaciosxx++;
        }

      });
      var title = '';
      var content = '';

      content = 'Nota. Usted va a enviar una formulación, ¿Está usted seguro de los requerimientos diligenciados..?';

      $("#formvaci").val(hayalmenosuno);
      $.confirm({
        title: 'FAVOR REVISAR Y CONFIRMAR!',
        content: content,
        type: 'red',
        typeAnimated: true,
        buttons: {
          tryAgain: {
            text: 'SI',
            btnClass: 'btn-red',
            action: function () {
              $.confirm({
                title: '¡Reconfirmación de envío..!!',
                content: content,
                type: 'red',
                typeAnimated: true,
                buttons: {
                  tryAgain: {
                    text: 'SI',
                    btnClass: 'btn-red',
                    action: function () {
                      $("#formnpt").submit();
                    }
                  },
                  close: function () {
                  }
                }
              });
            }
          },
          close: function () {
          }
        }
      });
    });

    $("#formulaciontable select").each(function () {
      $.ajax({
        url: "{{url('api/cformula/rangos')}}",
        type: 'GET',
        data: {
          npt_id:'{{$todoxxxx["paciente"]->npt_id}}',
          medicame: $(this).val(),
          idmedica: $(this).prop('id'),

        },
        dataType: 'json',
        success: function (json) {
          $('#' + json.idmedica).text(json.medicame);

        },
        error: function (xhr, status) {
          alert('Disculpe, existió un problema');
        }
      });

    });
  });

</script>