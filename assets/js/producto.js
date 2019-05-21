/*the only js is to continuously checking the value of the dropdown. for posterity*/
var i = setInterval(function(){$("#trace").val($("input[name=line-style]:checked").val());},100);
$( "#nombre" ).keyup(function() {
    actualizarEjemplo();
  });

  $( "#upnombre" ).keyup(function() {
    actualizarEjemplo2();
  });

  $("#coloricono").change(function(){
    actualizarEjemplo();
      
  });
  $("#icono").change(function(){
    actualizarEjemplo();      
  });
   $("#upcoloricono").change(function(){
    actualizarEjemplo2();
       
   });
   $("#upicono").change(function(){
    actualizarEjemplo2();
       
   });
function actualizarEjemplo() {
    $('#divEjemplo').empty();
    var nombre = $("#nombre").val();
    var color = $("#coloricono").val();
    var icono = $("#icono").val();

    var burl = $("#burl").val();
    console.log(icono);

    if (icono !== "") {
        icono = "<i><img src='" + burl + 'assets/imagenes/' + icono + "' alt='LOGO' style='height:90px; width:90px;'/></i>";
    }


    if(color !== ""){                 
        var ejemplo = 
        "<div class='tile bg-"+color+"' style='margin-left: 30px;'>" +
                "<div class='tile-body'>" +icono+ "</div>" +
                    "<div class='tile-object'>" +
                    "<h5 style='font-weight: bold;'>" + nombre +
                    "</h5></div>" +
        "</div>";

        $('#divEjemplo').html(ejemplo);
    }
}

function actualizarEjemplo2() {
    $('#updivEjemplo').empty();
    var nombre = $("#upnombre").val();
    var color = $("#upcoloricono").val();
    var icono = $("#upicono").val();

    var burl = $("#burl").val();
    console.log(icono);

    if (icono !== "") {
        icono = "<i><img src='" + burl + 'assets/imagenes/' + icono + "' alt='LOGO' style='height:90px; width:90px;'/></i>";
    }


    if(color !== ""){                 
        var ejemplo = 
        "<div class='tile bg-"+color+"' style='margin-left: 30px;'>" +
                "<div class='tile-body'>" +icono+ "</div>" +
                    "<div class='tile-object'>" +
                    "<h5 style='font-weight: bold;'>" + nombre +
                    "</h5></div>" +
        "</div>";

        $('#updivEjemplo').html(ejemplo);
    }
}

$('#pventa').change(function(){
    calutilidad();
});
$('#pcosto').change(function(){
    calutilidad();
});
$('#uppventa').change(function(){
    calutilidad2();
});
$('#uppcosto').change(function(){
    calutilidad2();
});

function calutilidad(){
    var venta = $('#pventa').val();
    var costo = $('#pcosto').val();
    var ganancia =0;
    var iva=0;
    var porc=0;
    if (venta>0 && costo >0)
     {ganancia=venta-costo-(venta*0.13);
        porc=Math.round(ganancia*100/costo);
        $('#utilidad').html('Utilidad('+porc+'%): '+ganancia );
        if(ganancia >=0)
        $('#utilidad').css('color','green');
        else
        $('#utilidad').css('color','red');        
        $('#utilidad').show();
        $('#utl').prop('value',ganancia);
    }
    else{
        $('#utilidad').html('');
        $('#utilidad').hide();}

    if(venta>0.00){
        iva=venta*0.13;
        $('#iva').html('IVA(13%):'+iva);    
        $('#iva').show();
        
    }
    else{
        $('#iva').html();    
        $('#iva').hide();}
    
}

function calutilidad2(){
    var venta = $('#uppventa').val();
    var costo = $('#uppcosto').val();
    var ganancia =0;
    var iva=0;
    var porc=0;
    if (venta>0 && costo >0)
     {ganancia=venta-costo-(venta*0.13);
        porc=Math.round(ganancia*100/costo);
        $('#uputilidad').html('Utilidad('+porc+'%): '+ganancia );
        if(ganancia >=0)
        $('#uputilidad').css('color','green');
        else
        $('#uputilidad').css('color','red');        
        $('#uputilidad').show();
        $('#uputl').prop('value',ganancia);
    }
    else{
        $('#uputilidad').html('');
        $('#uputilidad').hide();}

    if(venta>0.00){
        iva=venta*0.13;
        $('#upiva').html('IVA(13%):'+iva);    
        $('#upiva').show();
        
    }
    else{
        $('#upiva').html();    
        $('#upiva').hide();}
    
}

$('#exampleModal').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget) // Button that triggered the modal
    var idproducto = button.data('idproducto') // Extract info from data-* attributes
    var parametros = {
                      "idproducto" : idproducto,
              };
              $.ajax({
                      data:  parametros,
                      url:   'ProductoCtrl/datos',
                      type:  'post',
                      beforeSend: function () {
                              //$("#resultado").html("Procesando, espere por favor...");
                      },
                      success:  function (response) {
                          console.log(response);
                          var datos=JSON.parse(response);
                          $('#idproducto').prop('value',datos.idProducto);
                          $('#upnombre').prop('value',datos.nombreProd);
                          $('#updesc').prop('value',datos.descripcion);
                          $('#uppcosto').prop('value',datos.precioCosto);
                          $('#uppventa').prop('value',datos.precioVenta);
                          $('#uputl').prop('value',datos.utilidad);
                          $('#upidrubro').prop('value',datos.idRubro);
                          $('#upcantidad').prop('value',datos.cantidad);
                        $('#upicono').prop('value',datos.imagen);
                        $('#upcoloricono').prop('value',datos.colorFondo);
                         if (datos.activo == "SI")
                         $('#upactivo').bootstrapToggle('on');
                         else
                        $('#upactivo').bootstrapToggle('off');
                        actualizarEjemplo2();
                        calutilidad2();
                        $.ajax({
                            data: parametros,
                            url: 'ProductoCtrl/datoPref',
                            type: 'post',
                            beforeSend: function () {
                                                            //$("#resultado").html("Procesando, espere por favor...");
                            },
                            success:  function (response) {
                            console.log(response);
                            var datos2=JSON.parse(response);
                            var pref2=[];
                            datos2.forEach(row => {
                                pref2.push(datos2.idPreferencia);
                                var id=row.idPreferencia;
                                console.log(id);
                                $("#uppref option[value='" + id + "']").prop("selected", true);
                            });
                                }
                        })
                      } 
              });
      
  })