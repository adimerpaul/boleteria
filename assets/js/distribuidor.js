
    $('#exampleModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget) // Button that triggered the modal
        var iddistrib = button.data('iddistrib') // Extract info from data-* attributes
        var parametros = {
                          "iddistrib" : iddistrib,
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
                              $('#iddistrib').prop('value',datos.idDistrib);
                              $('#nombre').prop('value',datos.nombreDis);
                              $('#direccion').prop('value',datos.direccionDis);
                              $('#localidad').prop('value',datos.localidadDis);
                              $('#nit').prop('value',datos.nit);
                              $('#telefono').prop('value',datos.telefonoDis);
                              $('#email').prop('value',datos.email);
                              $('#responsable').prop('value',datos.responsable); 
                          }
                  });
          
      })