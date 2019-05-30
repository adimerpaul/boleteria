
    $('#exampleModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget) // Button that triggered the modal
        var idtarifa = button.data('idtarifa') // Extract info from data-* attributes
        var parametros = {
                          "idtarifa" : idtarifa,
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
                              $('#idtarifa').prop('value',datos.idTarifa);
                              $('#serie').prop('value',datos.serie);
                              $('#descrip').prop('value',datos.descripcion);
                              $('#precio').prop('value',datos.precio);

                             if (datos.tv == 1)
                             $('#tv').bootstrapToggle('on');
                             else
                            $('#tv').bootstrapToggle('off');
                             
                              if (datos.defecto == 1)                               
                              $('#defecto').bootstrapToggle('on');
                              else
                             $('#defecto').bootstrapToggle('off');

                             if (datos.ventaWeb == 1)                               
                             $('#web').bootstrapToggle('on');
                             else
                            $('#web').bootstrapToggle('off');
                            if (datos.mostrarBol == 1)                               
                            $('#mostrarbol').bootstrapToggle('on');
                            else
                           $('#mostrarbol').bootstrapToggle('off');
                           if (datos.activo == 1)                               
                           $('#activa').bootstrapToggle('on');
                           else
                           $('#activa').bootstrapToggle('off');
                           if (datos.lunes == 1)
                           $('#lunes').prop('checked',true);
                           else
                           $('#lunes').prop('checked',false);

                           if (datos.martes == 1)
                           $('#martes').prop('checked',true);
                           else
                           $('#martes').prop('checked',false);

                           if (datos.miercoles == 1)
                           $('#miercoles').prop('checked',true);
                           else
                           $('#miercoles').prop('checked',false);

                           if (datos.jueves == 1)
                           $('#jueves').prop('checked',true);
                           else
                           $('#jueves').prop('checked',false);

                           if (datos.viernes == 1)
                           $('#viernes').prop('checked',true);
                           else
                           $('#viernes').prop('checked',false);

                           if (datos.sabado == 1)
                           $('#sabado').prop('checked',true);
                           else
                           $('#sabado').prop('checked',false);

                           if (datos.domingo == 1)
                           $('#domingo').prop('checked',true);
                           else
                           $('#domingo').prop('checked',false);

                           if (datos.diaFestivo == 1)
                           $('#festivo').prop('checked',true);
                           else
                           $('#festivo').prop('checked',false);

                           if (datos.d2 == 1)
                           $('#dosd').prop('checked',true);
                           else
                           $('#dosd').prop('checked',false);
                           if (datos.d3 == 1)
                           $('#tresd').prop('checked',true);
                           else
                           $('#tresd').prop('checked',false);
                           $('#promo').bootstrapToggle(datos.promo);
                           
                          } 
                  });
          
      })