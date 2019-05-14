
    $('#exampleModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget) // Button that triggered the modal
        var idpelicula = button.data('idpelicula') // Extract info from data-* attributes
        var check="on";
        var parametros = {
                          "idpelicula" : idpelicula,
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
                              $('#idpelicula').prop('value',datos.idPelicula);
                              $('#razonsocial').prop('value',datos.razonSocial);
                              $('#nom').prop('value',datos.nombre);
                              $('#nomsuc').prop('value',datos.nombreSuc);
                              $('#duracion').prop('value',datos.duracion);
                              $('#origen').prop('value',datos.paisOrigen);
                              $('#genero').prop('value',datos.genero);
                              $('#distribuidor').prop('value',datos.idDistrib);
                              $('#clasificacion').prop('value',datos.clasficacion);
                             
                              $('#url').prop('value',datos.urlTrailer);
                              $('#sipnosis').prop('value',datos.sipnosis);
                              console.log(datos.formato);                               
                             
                             if (datos.formato == 1)
                             $('#formato').bootstrapToggle('on');
                             else
                            $('#formato').bootstrapToggle('off');
                             
                              if (datos.cartelera == 1)                               
                              $('#cartelera').bootstrapToggle('on');
                              else
                             $('#cartelera').bootstrapToggle('off');
                                                   
                          } 
                  });
          
      })