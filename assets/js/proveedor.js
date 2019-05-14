
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
                              $('#idproveedor').prop('value',datos.idProveedor);
                              $('#razonsocial').prop('value',datos.razonSocial);
                              $('#nit').prop('value',datos.nitProv);
                              $('#email').prop('value',datos.email);
                              $('#telefono').prop('value',datos.telefono);
                              $('#direccion').prop('value',datos.direccion);
                             
                             
                             if (datos.activo == 1)
                             $('#activo').bootstrapToggle('on');
                             else
                            $('#activo').bootstrapToggle('off');
                             
                          } 
                  });
          
      })