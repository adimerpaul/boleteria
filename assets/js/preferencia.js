
    $('#exampleModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget) // Button that triggered the modal
        var idpreferencia = button.data('idpreferencia') // Extract info from data-* attributes
        var parametros = {
                          "idpreferencia" : idpreferencia,
                  };
                  $.ajax({
                          data:  parametros,
                          url:   'PreferenciaCtrl/datos',
                          type:  'post',
                          beforeSend: function () {
                                  //$("#resultado").html("Procesando, espere por favor...");
                          },
                          success:  function (response) {
                              console.log(response);
                              var datos=JSON.parse(response);
                              $('#idpref').prop('value',datos.idPreferencia);
                              $('#nombreup').prop('value',datos.nombrePref);
                              $('#descup').prop('value',datos.descripcion);
                             
                             if (datos.activa == "SI")
                             $('#activoup').bootstrapToggle('on');
                             else
                            $('#activoup').bootstrapToggle('off');
                             
                          } 
                  });
          
      })