
$('#exampleModal').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget) // Button that triggered the modal
    var idventacandy = button.data('idventacandy') // Extract info from data-* attributes
    var url=$('#burl').val();
    var param = {
                      "idventacandy" : idventacandy
              };
      //console.log(param);
              $.ajax({
                      data:  param,
                      url:   url+'ReporteCandy/datosVenta',
                      type:  'post',
                      beforeSend: function () {
                              //$("#resultado").html("Procesando, espere por favor...");
                        //console.log("error");
      
                      },
                      success:  function (response) {
                          console.log(response);
                           var datos=JSON.parse(response);
                        //console.log(datos);
                           $('#fechaventa').html(datos.fecha);
                           $('#horaventa').html(datos.hora);
                           $('#vendedor').html(datos.user);
                           $('#cliente').html(datos.nombre);

                        $.ajax({
                            data: param,
                            url: url+'ReporteCandy/detalleventa',
                            type: 'post',
                            beforeSend: function () {
                                                            //$("#resultado").html("Procesando, espere por favor...");
                            },
                            success:  function (response) {
                            console.log(response);
                            var datos2=JSON.parse(response);
                            var tabla="";
                            var total=0;
                            var i=0;
                            $('#detalleventa').html("");
                            datos2.forEach(row => {
                                i++;
                                tabla+="<tr>";
                                tabla+="<td>"+i+"</td>";                                
                                tabla+="<td>"+row.nombreP+"</td>";                                
                                tabla+="<td>"+row.cantidad+"</td>";                                
                                tabla+="<td>"+row.pUnitario+"</td>";                                
                                tabla+="<td>"+row.subtotal+"</td>";                                
                                tabla+="</tr>";
                                total=total+parseFloat(row.subtotal);
                            });
                            tabla+="<tr><td></td><td></td><td></td><td><b>TOTAL:</b></td><td>"+total+"</td></tr>";
                            $('#detalleventa').html(tabla);
                            
                                }
                        })
                      } 
              });
      
  });


/*  $('.detalle').click(function(e){
     var idcandy= $(this).attr('data-idventacandy');
    console.log(idcandy);
    var param = {
                        "idventacandy" : idcandy
                };
                $.ajax({
                        data:  param,
                        url:   'http://localhost/Boleteria/ReporteCandy/datosVenta',
                        type:  'post',
                        success:  function (response) {
                            console.log(response);
                        }
                    });
  });*/