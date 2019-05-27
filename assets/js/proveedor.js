
    $('#exampleModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget) // Button that triggered the modal
        var idproveedor = button.data('idproveedor') // Extract info from data-* attributes
        var parametros = {
                          "idproveedor" : idproveedor
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
                              $('#idproveedor2').prop('value',datos.idProveedor);
                              $('#razonsocial2').prop('value',datos.razonSocial);
                              $('#nit2').prop('value',datos.nitProv);
                              $('#email2').prop('value',datos.email);
                              $('#telefono2').prop('value',datos.telefono);
                              $('#direccion2').prop('value',datos.direccion);
                              $('#activo2').bootstrapToggle(datos.activo);
                             
                          } 
                  });
          
      })