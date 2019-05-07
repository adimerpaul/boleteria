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

                                })
                                }

                                
                            })
                            $('#btnDevolver').click(function(){
                                var id=$('#idVen').prop('value');
                                var param = {
                                                    "idventa" : id
                                            };   
                                var conf=confirm('Esta Seguro de Devolver') ;
                                if(conf==true && dev=='ACTIVO') {console.log('ok')
                        
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
                            });

                          } 
                  });
          
      })
 
