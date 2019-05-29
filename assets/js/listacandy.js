$('#fecini').change(function(){
    var fecha=moment($('#fecini').val()).format('Y-MM-DD');
    console.log(fecha);
    $('#fecfin').val(fecha);
    $('#fecfin').attr('min',fecha);
});
   
   
   $('#exampleModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget) // Button that triggered the modal
        var idventa = button.data('idventacandy') // Extract info from data-* attributes
        var check="on";
        var dev="";
        var totalv=0;
        var parametros = {
                          "idventacandy" : idventa
                  };
                  $.ajax({
                          data:  parametros,
                          url:   'ListadoCandyCtrl/verdatoventa',
                          type:  'post',
                          beforeSend: function () {
                                  //$("#resultado").html("Procesando, espere por favor...");
                          },
                          success:  function (response) {
                              console.log(response);
                              var datos=JSON.parse(response);
                              $('#idVentaCandy').html(datos.idVentaCandy);
                              $('#idVenCandy').prop('value',datos.idVentaCandy);
                              $('#nroComp').html(datos.nroComprobante);
                              $('#totalVenta').html(datos.total);
                              totalv=datos.total;
                              $('#fechaVenta').html(datos.fechaVenta);
                              $('#nombre').html(datos.nombreCl+' '+datos.apellidoCl);
                              $('#nombreUser').html(datos.user);
                              $('#codControl').html(datos.codigoControl);
                              $('#tipoventa').html(datos.tipoVenta);
                              dev=datos.estado;
                              $.ajax({
                                data:  parametros,
                                url:   'ListadoCandyCtrl/listaProductos',
                                type:  'post',
                                                beforeSend: function () {
                                                        //$("#resultado").html("Procesando, espere por favor...");
                                                },
                                                success:  function (response) { 
                                    var cadena=""; 
                                    var asiento;
                                    var datos2=JSON.parse(response);
                                    console.log(datos2);
                                    var i=0;
                                    var subt=0;
                                    var total=0;
                                    datos2.forEach(row => {
                                        i++;
                                        subt=parseFloat(row.cantidad)* parseFloat(row.precioVenta);
                                        total=total+parseFloat(subt);
                                        cadena+="<tr>";
                                        cadena=cadena+"<td>"+i+"</td>";
                                        cadena=cadena+"<td>"+row.nom+"</td>";
                                        cadena=cadena+"<td>"+row.cantidad+"</td>";
                                        cadena=cadena+"<td>"+row.precioVenta+"</td>";
                                        cadena=cadena+"<td>"+subt+"</td>";
                                        cadena+="</tr>";
                                    
                                    if (datos.estado=="ANULADO"){
                                        $('#btnImpresion').hide();
                                    } else{
                                        $('#btnImpresion').show();
                                    }
                                    if (datos.tipoVenta=="FACTURA"){
                                        $('#btnImpresion').prop('href',url+'FacturaCandy/printF/'+datos.idVenta);
                                    } else{
                                        $('#btnImpresion').prop('href',url+'FacturaCandy/printR/'+datos.idVenta);
                                    }

                                })
                                cadena+="<tr><td></td><td></td><td></td><td><b>TOTAL:</b></td><td><b>"+total+"</b></td></tr>";
                                $('#tabbody').html(cadena);
                            }

                                
                            })
                            $('#btnDevolver').click(function(){
                                var id=$('#idVenCandy').prop('value');
                                var conf=prompt('Esta Seguro de Devolver Motivo?') ;
                                if(conf!=null && dev=='ACTIVO') {console.log('ok')
                                var param = {
                                                    "idventacandy" : id,
                                                    "motivo" : conf,
                                                    "total" : totalv
                                            }; 
                                console.log(param);  
                                
                                $.ajax({
                                    data:  param,
                                    url:   'ListadoCandyCtrl/devolucionCandy',
                                    type:  'post',
                                                    beforeSend: function () {
                                                            //$("#resultado").html("Procesando, espere por favor...");
                                                    },
                                                    success:  function (response) { 
                                        console.log(response);
                                    }
                                })}
                                $("#exampleModal").modal('hide');//ocultamos el modal
                                window.location.href = '';
                            });

                          } 
                  });
          
      })
 
