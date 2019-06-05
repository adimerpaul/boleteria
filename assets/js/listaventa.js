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
                                        cadena=cadena+"<td><a class='btn btn-success text-white btn-sm impboleto'  data-bol='"+row.idBoleto+"'>Imp</a></td>";
                                        cadena+="</tr>";
                                    
                                    $('#tabbody').html(cadena);
                                    $('.impboleto').click(function () {
                                        idboleto=$(this).data("bol");
                                        boleto(idboleto);
                                    });

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
              console.log(id);
              var idventa=id;
              $("#exampleModal").modal('hide');
              if ($('#tipoventa').html()=='FACTURA'){
                  $.ajax({
                      url: 'imprimirfactura/'+idventa,
                      success: async function (e) {
                          var myWindow = window.open("", "myWindow", "width=200,height=100");
                          var te= await e;
                          myWindow.document.write(te);
                          myWindow.document.close();
                          myWindow.focus();
                          setTimeout(function(){
                              myWindow.print();
                              myWindow.close();
                              boletos(idventa);
                          },500);
                      }
                  });
              }else {
                  boletos(idventa);
              }

          });

          
      })
function boletos(idventa){
    //console.log(idventa);
    $.ajax({
        url: 'imprimirboletos/'+idventa,
        success: async function (e) {
            var dato=JSON.parse(e);
            var contador=0;
            for (var i=0;i<dato.length;i++){
                boleto(dato[i].idBoleto);
                $.ajax({
                    url: 'tienepromo/'+dato[i].idBoleto,
                    success: async function (res) {
                        var dat=JSON.parse(res);
                        console.log(dat.promo);
                        if(dat.promo == 'on')
                        contador++;
                        if(contador==2){
                            promo(idventa);
                            contador=0;
                        }
                    }})
            } ;

            //window.location.reload();
        }
    });
}

function boleto(idboleto){
    $.ajax({
        url: 'impBoleto/'+idboleto,
        success: async function (e) {
            var myWindow = window.open("", "myWindow", "width=200,height=100");
            myWindow.document.write(e);
            myWindow.document.close();
            myWindow.focus();
            myWindow.print();
            myWindow.close();
        }
    });
}
 
function promo(idventa){
                
    $.ajax({
        url: 'impPromo/'+idventa,
        success: async function (resp) {
            var myWindow = window.open("", "myWindow", "width=200,height=100");
            myWindow.document.write(resp);
            myWindow.document.close();
            myWindow.focus();
            myWindow.print();
            myWindow.close();
        }
    });
}

