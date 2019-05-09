
    $('#exampleModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget) // Button that triggered the modal
        var idosif = button.data('idosif') // Extract info from data-* attributes
        var parametros = {
                          "idDosif" : idosif,
                         "mostrar" : 'codigo'
                  };
                  $.ajax({
                          data:  parametros,
                          url:   'datos',
                          type:  'post',
                          beforeSend: function () {
                                  //$("#resultado").html("Procesando, espere por favor...");
                          },
                          success:  function (response) {
                              console.log(response);
                              var datos=JSON.parse(response);
                              $('#idosif').prop('value',datos.idDosif);
                              $('#tramite').prop('value',datos.nroTramite);
                              $('#autorizacion').prop('value',datos.nroAutorizacion);
                              $('#inicial').prop('value',datos.nroFactIni);
                              $('#llave').prop('value',datos.llaveDosif);
                              $('#fechad').prop('value',datos.fechaDesde);
                              $('#fechah').prop('value',datos.fechaHasta);
                              $('#leyenda').prop('value',datos.leyenda);
                              if(datos.activo!=0)
                                $('#activo').bootstrapToggle('on');
                              else 
                                $('#activo').bootstrapToggle('off');
                            
                                 
                          }
                  });
          
      })