

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
  var template=function(json){
    var mensaje={     
        title:'<div class="alert alert-danger text-center popover-title"><strong>'+json.menssage[3]+'</strong></div>', 
        content: '<div class="alert alert-info">'+json.menssage[2]+'</div>',
        placement: "left",html: true
      };
    return mensaje;
  }

    var pedineon=function(){
      $.ajax({
        url: "{{route('formular.pedineon',$todoxxxx['parametr'])}}",
        type: 'GET',
        data: {
          dataxxxx: f_dataxxxx(),
        },
        dataType: 'json',
        success: function (json) {
          $.each(json,function(i,d){
            $("#" + d.campcant).val(d.cantidad); // mostrar requerimiento diario o volumen
            $("#" + d.campvolu).val(d.volumenx); // mostrar requerimiento diario o volumen
          });          
        },
        error: function (xhr, status) {
          alert('Disculpe, existió un problema');
        }
      });
    }
    var f_dataxxxx=function(){
      var dataxxxx = $('#formulario').serializeArray()
          dataxxxx.push({name: "npt_id", value: '{{$todoxxxx["paciente"]->npt_id}}'});
          return dataxxxx;
    }
    var f_ajax = function (campo_id) {
      
      $("#" + campo_id.split('_')[0] + '_cant').prop('title', '');
      $.ajax({
        url: "{{route('formular.formular',$todoxxxx['parametr'])}}",
        type: 'GET',
        data: {
          dataxxxx: f_dataxxxx(),
          campo_id: campo_id
        },
        dataType: 'json',
        success: function (json) {
          $("#" + json.unidadxx[0]).text(json.unidadxx[1]) // mostrar la unidad
          $("#" + json.cantvolu[0]).val(json.cantvolu[1]); // mostrar requerimiento diario o volumen
          $("#" + json.menssage[0]).popover('dispose');
          if(json.menssage[2]!=''){
            $("#" + json.menssage[0]).popover(template(json));
            $("#" + json.menssage[0]).popover(json.menssage[1]); 
          }
        },
        error: function (xhr, status) {
          alert('Disculpe, existió un problema');
        }
      });
      
    }
    $('#multivit').on('change', function (e) {
      if ($(this).val() == 30) {
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
     // $("#velocidad").val($('#volumen').val() / $('#tiempo').val());
      $.ajax({
        url: "{{url('api/cformula/calcular')}}",
        type: 'GET',
        data: {
          volumenx: $('#volumen').val(),
          tiempoxx: $('#tiempo').val(),
        },
        dataType: 'json',
        success: function (json) {
          $("#velocidad").val(json.calculox);
        },
        error: function (xhr, status) {
          alert('Disculpe, existió un problema');
        }
      });
    });
    $('#peso').on('keyup', function () {
      if($(this).val()>0 && eval('{{$todoxxxx["paciente"]->npt_id}}')<3){
        pedineon($(this).val())
      }
      recalcular();
    });
    //dataxxxx={'medicame':?,'campo_id':?,'compauxi':?}
    

   

    $('.input-number').on('keyup', function (event) {


      var aguaeste = $(this).attr('id').split('_');
      var codigo = event.keyCode;
      if ((((codigo >= 96 && codigo <= 105) || (codigo >= 48 && codigo <= 57)) && aguaeste[0] != 'aguaeste') || codigo == 8 && aguaeste[0] != 'aguaeste' ) {

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

      var agua = $('#formulario').serializeArray()
      $.each(agua, function (i, valor) {
        var valido = valor.name.split('_')
        if (valido.length > 1 && valido[1] == 'volu' && valor.value > 0 && valido[0] != 'aguaeste') {
          aguax_id = parseFloat(aguax_id) + parseFloat(valor.value);
        }
      });
      $.ajax({
        url: "{{route('formular.redondear',$todoxxxx['parametr'])}}",
        type: 'GET',
        data: {
          redendeo: $("#volumen").val() - aguax_id,
         
        },
        dataType: 'json',
        success: function (json) {
          $("#aguaeste_volu").val(json.redendeo);
        },
        error: function (xhr, status) {
          alert('Disculpe, existió un problema');
        }
      });
     
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
                      $("#formulario").submit();
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
        url: "{{route('formular.rangvolu',$todoxxxx['parametr'])}}",
        type: 'POST',
        data: {
          _token: $("input[name='_token']").val(),
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