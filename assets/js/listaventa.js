$('#fecini').change(function(){
    var fecha=moment($('#fecini').val()).format('Y-MM-DD');
    console.log(fecha);
    $('#fecfin').val(fecha);
    $('#fecfin').attr('min',fecha);
});
   
   
   $('#exampleModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget) // Button that triggered the modal
        var idventa = button.data('idventa') // Extract info from data-* attributes
        var check="on";
        var dev="";
        var totalv=0;
        var parametros = {
                          "idventa" : idventa
                  };
                  $.ajax({
                          data:  parametros,
                          url:   'verdatoventa',
                          type:  'post',
                          beforeSend: function () {
                                  //$("#resultado").html("Procesando, espere por favor...");
                          },
                          success:  function (response) {
                              console.log(response);
                              var datos=JSON.parse(response);
                              $('#idVenta').html(datos.idVenta);
                              $('#idVen').prop('value',datos.idVenta);
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
                                url:   'listaBoletos',
                                type:  'post',
                                                beforeSend: function () {
                                                        //$("#resultado").html("Procesando, espere por favor...");
                                                },
                                                success:  function (response) { 
                                    var cadena=""; 
                                    var asiento;
                                    var datos2=JSON.parse(response);
                                    console.log(datos2);
                                    datos2.forEach(row => {
                                        if(row.devuelto=='SI')
                                            asiento = '-'
                                        else 
                                        asiento=String.fromCharCode(parseInt(row.fila) + 64)+'-'+row.fila+"-"+row.columna+'';
                                        cadena+="<tr>";
                                        cadena=cadena+"<td>"+row.fecha+"</td>";
                                        cadena=cadena+"<td>"+row.numboc+"</td>";
                                        cadena=cadena+"<td>"+row.titulo+"</td>";
                                        cadena=cadena+"<td>"+row.fechaFuncion+"</td>";
                                        cadena=cadena+"<td>"+row.horaFuncion+"</td>";
                                        cadena=cadena+"<td>"+row.serieTarifa+"/"+row.costo+"</td>";
                                        cadena=cadena+"<td>"+asiento+"</td>";
                                        cadena+="</tr>";
                                    
                                    $('#tabbody').html(cadena);
                                    if (datos.estado=="ANULADO"){
                                        $('#btnImpresion').hide();
                                    } else{
                                        $('#btnImpresion').show();
                                    }

                                })
                                }

                                
                            })
                            $('#btnDevolver').click(function(){
                                var id=$('#idVen').prop('value');
                                
                                var conf=prompt('Esta Seguro de Devolver Motivo?') ;
                                if(conf!=null && dev=='ACTIVO') {console.log('ok')
                                var param = {
                                                    "idventa" : id,
                                                    "motivo" : conf,
                                                    "total" : totalv
                                            }; 
                                console.log(param);  
                                
                                $.ajax({
                                    data:  param,
                                    url:   'devolucion',
                                    type:  'post',
                                                    beforeSend: function () {
                                                            //$("#resultado").html("Procesando, espere por favor...");
                                                    },
                                                    success:  function (response) { 
                                        console.log(response);
                                    }
                                })}
                                $("#exampleModal").modal('hide');//ocultamos el modal
                                window.location.href = 'listaVenta';
                            });

                          } 
                  });
          $('#btnImpresion').click(function(){
              id=$('#idVen').val();
            if ( $('#tipoventa').val()=="FACTURA"){
                $.ajax({
                    url:   'VentaCtrl/imprimirfactura/'+id,
                                    beforeSend: function () {
                                            //$("#resultado").html("Procesando, espere por favor...");
                                    },
                                    success:  function (response) { 
                                console.log(response);
                                myWindow = window.open("", "myWindow", "width=200,height=100");
                                myWindow.document.write(response);
                                myWindow.document.close();
                                myWindow.focus();
                                setTimeout(imprimirfa(),1000);
                                // myWindow.print();
                                // myWindow.close();
                    }
                })
            } else{
                //$('#btnImpresion').prop('href',url+'VentaCtrl/printR/'+datos.idVenta);
            }

          });

          
      })
 

