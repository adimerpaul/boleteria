$('#fecfuncion').change(listado);
$('#fecfuncion').change(function(){
    if($(this).prop('value') < new Date())
    bloqueobtn();
});
$(document).ready(listado());  
$(document).ready(calculo());
$(document).ready(
    function(){
        console.log($('#tabPreVenta tr').length);
if ($('#tabPreVenta tr').length > 0)
    $('#btnAgregar').removeClass("disabled");
    else 
    $('#btnAgregar').addClass("disabled");
}
);  

$( function() { 
    
$('#elimVentaTemp').click(function(){
    var r =confirm("Seguro que Desea Eliminar");
    if(r==true)
        $(this).attr('href',"VentaCtrl/deleteTempAll");
        else
        $(this).attr('href','');
    
}); 
    $( "#selecost" ).selectable({
        stop: function(){
            var id=0;
        $( ".ui-selected", this ).each(function() {
            $('#selecfun .ui-selected').removeClass('ui-selected');
            var index=$('#selecost .ui-selected').index();
            console.log(index);
            $("#selecfun li:eq("+index+")").addClass('ui-selected');
            $("#lblPrecio").html("0Bs");
            $("#lblCantidadEntradas").html("0");
            if( moment().format('Y-MM-DD') > $('#fecfuncion').prop('value'))
            bloqueobtn();
            else
            desbloqueobtn();
        })}
    });

    $( "#selecfun" ).selectable(    {
        stop: function(){
            var id=0;
        $( ".ui-selected", this ).each(function() {
            $('#selecost .ui-selected').removeClass('ui-selected');
            var index=$('#selecfun .ui-selected').index();
            console.log(index);
            $("#selecost li:eq("+index+")").addClass('ui-selected');
            $("#lblPrecio").html("0Bs");
            $("#lblCantidadEntradas").html("0");
            if( moment().format('Y-MM-DD') > $('#fecfuncion').prop('value'))
            bloqueobtn();
            else
            desbloqueobtn();
            
            
        })}
 
    });
   

$("#selectable").selectable(
    {
    stop: function(){
        var id=0;
    $( ".ui-selected", this ).each(function() {
          console.log($(this).prop('value'));
          id=$(this).attr('value')+'';
        
              var cadenahorario="";
              var cadenacosto="";
              var parametros = {
                                "idpel" : id,
                                "fecha1" : $('#fecfuncion').prop('value')
                                  };
                      $.ajax({                        
                              data:  parametros,
                              url:   'VentaCtrl/horario',  
                              type:  'post',
                              beforeSend: function () {
                                      $("#selecfun").html("Procesando, espere por favor... "+parametros['idpel']);
                              },
                              success:  function (response) {
                                $("#selecfun").html("");
                                $("#selecost").html("");
                                 console.log(response);
                                var datos=JSON.parse(response);
                                    datos.forEach(row => {
                                        cadenahorario=cadenahorario+'<li class="ui-widget-content" value="'+row.idFuncion+'"><span>S'+row.nroSala+'     </span> '+row.horaIn+' ('+row.horaF+')';
                                        cadenahorario=cadenahorario+'<input type=hidden value='+ row.idSala+'>';
                                        cadenahorario=cadenahorario+'<label hidden>'+ row.horaIn+'</label>';
                                        cadenahorario=cadenahorario+'</li>';
                                        cadenacosto=cadenacosto+'<li class="ui-widget-content" value="'+row.precio+'">'+row.serie+' => ' +row.precio+' Bs';
                                        cadenacosto=cadenacosto+'<input type=hidden value='+ row.serie+'>';
                                        cadenacosto=cadenacosto+'</il>';
                                     }),


                                         $("#selecfun").html(cadenahorario);          
                                         $("#selecost").html(cadenacosto);
                                         $('#selecfun li:first').addClass('ui-selected');
                                         $('#selecost li:first').addClass('ui-selected');
                                         $("#lblPrecio").html("0Bs");
                                         $("#lblCantidadEntradas").html("0");
                                         if( moment().format('Y-MM-DD') > $('#fecfuncion').prop('value'))
                                         bloqueobtn();
                                         else
                                         desbloqueobtn();      
                              },
                          })
               
        });
    }
  });
  $( "#selecfun" ).selectable({
      start : function(){}
  });
}
);
$( "#selecfun" ).selectable();

$('#lblCantidadEntradas').bind("DOMSubtreeModified",function(){
    var tarifa=$('#selecost .ui-selected').prop('value');
    var valor=parseFloat($('#lblCantidadEntradas').html());
    var total=valor*tarifa;
    console.log(tarifa);
    
    $('#lblPrecio').html(total+'Bs');
    if ($('#tabPreVenta tr').length > 0)
    $('#btnAgregar').removeClass("disabled");
    else
    $('#btnAgregar').addClass("disabled");
;
    
});

$('#btnEntradaMenos').click(function(){
    var valor=parseInt($('#lblCantidadEntradas').html());
    if(valor > 0){
        valor = valor - 1;
    $('#lblCantidadEntradas').html("");
    $('#lblCantidadEntradas').html(valor);
    }

});

$('#btnEntradaMas').click(function(){
    var valor=parseInt($('#lblCantidadEntradas').html());
    if(valor < 200){
        valor = valor + 1;
    $('#lblCantidadEntradas').html("");
    $('#lblCantidadEntradas').html(valor);
    
    }
    else alert("SOLO SE PERMITE UN MAXIMO DE 200 ENTRADAS");
    
});
    
function listado(){
    var cadenapelicula="";
    $("#selecost").html("");
    $("#selecfun").html("");

    bloqueobtn();
    var parametros = {
                        "fecha1" : $('#fecfuncion').prop('value')
                };
            $.ajax({                        
                    data:  parametros,
                    url:   'VentaCtrl/listafuncion',  
                    type:  'post',
                    beforeSend: function () {
                            $("#selectable").html("Procesando, espere por favor...");
                    },
                    success:  function (response) {
                        $("#selectable").html("");
                        bloqueobtn();
                        console.log(response);
                        var dd="";
                        var datos=JSON.parse(response);
                        datos.forEach(row => {
                            if(row.formato == 1) dd="3D";
                            else dd="2D";   
                            cadenapelicula=cadenapelicula+'<li class="ui-widget-content" value="'+row.idPelicula+'" > ';
                            cadenapelicula=cadenapelicula+'<input type="hidden" value="'+row.nombre+' '+dd+'">';
                            cadenapelicula=cadenapelicula+''+row.nombre+' <br> <div class="detalle"><div class="ptipo">'+dd+'</div></div> ';
                            cadenapelicula=cadenapelicula+'</li>'; 
                        }),
                         $("#selectable").html(cadenapelicula)
                          

                    },
                })
    }  ; 
    function bloqueobtn(){
        $('#btnEntradaMenos').addClass("disabled");
        $('#btnEntradaMas').addClass("disabled");
        $('#btnCancelar').addClass("disabled");
        if ($('#tabPreVenta tr').length > 0)
        $('#btnAgregar').removeClass("disabled");
        else
        $('#btnAgregar').addClass("disabled");
        $('#btnAceptar').addClass("disabled");
        $('#lblCantidadEntradas').addClass("disabled");
        $('#lblCantidadEntradas').html("0");
        $('#lblPrecio').html('0Bs');
        
    }

       function desbloqueobtn(){
        $('#btnEntradaMenos').removeClass("disabled");
        $('#btnEntradaMas').removeClass("disabled");
        $('#btnCancelar').removeClass("disabled");
        $('#btnAceptar').removeClass("disabled");
    }
 
  
var capacidad=0;
var asientos;
$('#exampleModal').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget) // Button that triggered the modal
    var idsala = $("#selecfun .ui-selected input").prop('value') // Extract info from data-* attributes
    var cantidad = parseInt( $('#lblCantidadEntradas').html())
    var cantaux = 0
    $('#habilitados').html("");
    console.log($("#selecfun .ui-selected input").prop('value'));
    var parametros = {
        "tabla" : 'asiento',
        "where" : 'idsala',         
        "dato" : $('#selecfun .ui-selected').prop('value'),
    };
    $.ajax({
        data:  parametros,
        url:   'VentaCtrl/datosBoleto',
        type:  'post',
        beforeSend: function () {
            //$("#resultado").html("Procesando, espere por favor...");
        },
        success:  function (response){
            asientos=JSON.parse(response);
            asi=JSON.parse(response)[0];
            console.log(asientos);
            var numerofuncion=asi.nroFuncion;
            parametros= {
                "tabla" : 'sala',
                "where" : 'idsala',
                "dato" : idsala,
            };
            $.ajax({
                data:  parametros,
                url:   'VentaCtrl/datos',
                type:  'post',
                beforeSend: function () {
                    //$("#resultado").html("Procesando, espere por favor...");
                },
                success:  function (response) {
                    //console.log(response);
                    var datos=JSON.parse(response)[0];
                    //console.log(datos);

                    $('#idSala').prop('value',datos.idSala);
                    $('#nombreSala').prop('value',datos.nombreSala);
                    $('#nroSala').prop('value','SALA '+datos.nroSala+'');
                    var nunSala = datos.nroSala;
                     $('#nroColumna').prop('value',datos.nroColumna);
                    $('#nroFila').prop('value',datos.nroFila);
                    $('#idfunmodal').prop('value',$('#selecfun li .ui-selected').prop('value'));
                    $('#capacidad').prop('value',datos.capacidad);
                    capacidad=datos.capacidad;
                    // $('#invert').prop('value',datos.invert);
                    var fila=(datos.nroFila);
                    var columna=(datos.nroColumna);
                    cambio(fila,columna);
                    $('#totalentrada').html(cantidad);
                    var idfun = $('#selecfun .ui-selected').prop('value');
                             console.log(idfun );
                             pfuncion= {
                        "idFuncion" : idfun,};
                        $('.lugar').click(function (event) {
                            var varest = $(this).data('estado');
                             console.log($(this).data('estado') );
                             if (varest=="1" && cantaux < cantidad){
                                 $(this).removeClass('libre');
                                 $(this).addClass('asignado');
                                 $(this).data('estado',2);
                                 cantaux++;
                             }
                             
                             if(varest== "2"){
                                 $(this).removeClass('asignado');
                                 $(this).addClass('libre');
                                 $(this).data('estado',1);
                                 cantaux--;
                             }
                             $('#numasignada').html(cantaux);
                             
                         });
                         $('#bolacepta').click(function(){
                             var total="";
                             var tarSerie=$('#selecost .ui-selected input').prop('value');
                             var costo=$('#selecost .ui-selected').prop('value');
                             var codSala=$('#selecfun .ui-selected input').prop('value');
                             var fecfun=$('#fecfuncion').prop('value');
                             var idfunreg=$('#selecfun .ui-selected').prop('value');
                             var horafun=$('#selecfun .ui-selected label').html()+":00";
                             var pelicula=$('#selectable .ui-selected input').prop('value');
                             $('.lugar.asignado').each(function(){
                                 var idsien=$(this).data('idasiento');
                                 var col=$(this).data('numero');
                                 var fil=$(this).data('fila');
                                 var ptemporal = {
                                                   "idasiento" : idsien,
                                                   "numerofuncion" :numerofuncion,
                                                   "serietarifa":tarSerie,
                                                   "codigosala":codSala,
                                                   "numerosala":nunSala,
                                                   "fechafun": fecfun,
                                                   "horafun":horafun,
                                                   "precio":costo,
                                                   "columna":col,
                                                   "fila":fil,
                                                   "idfuncion":idfunreg,
                                                   "titulo":pelicula
                                                   
                                            };
                                            $.ajax({
                                                    data:  ptemporal,
                                                    url:   'VentaCtrl/insertTemporal',
                                                    type:  'post',
                                                    beforeSend: function () {
                                                            //$("#resultado").html("Procesando, espere por favor...");
                                                    },
                                                    success:  function (response) {

                                                    }
                                                })
                                console.log(idsien+' '+idfunreg+' '+numerofuncion+' '+tarSerie+' '+nunSala+' '+codSala+' '+fecfun+' '+costo+' '+col+' '+fil+' '+pelicula+' '+horafun);
                            }                                
                           )
                            $("#exampleModal").modal('hide');//ocultamos el modal
                            $('#lblCantidadEntradas').html("0");
                            $('#lblPrecio').html('0Bs');
                            location.reload();
                            calculo();

                        });
                   
                }
            });

        }
        
    });

})

function cambio(fila,columna) {
    //console.log(asientos);
    var t="";
    var h="<td></td>";
    var c="";
    var cont=0;
    var L=['A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z']
    for (var i=columna;i>=1;i--) {
        h=h+"<td class='numero'>"+i+"</td>";
    }

    var co=columna-1;
    var fi=fila-1;
    for (var i=0;i<fila;i++) {
        c="";
        for (var j=columna;j>=1;j--) {
            if (asientos[cont].activo=="ACTIVO"){
                if(asientos[cont].asignado == 1)
                c=c+"<td data-numero='"+j+"' data-fila='"+asientos[cont].fila+"' data-estado='3' data-idasiento='"+asientos[cont].idAsiento+"' class='lugar vendido'></td>";
                else
                c=c+"<td data-numero='"+j+"' data-fila='"+asientos[cont].fila+"' data-estado='1' data-idasiento='"+asientos[cont].idAsiento+"' class='lugar libre'></td>";
            }else{
                c=c+"<td data-numero='"+j+"' data-fila='"+asientos[cont].fila+"' data-estado='0' class='lugar ocupado'></td>";
            }
            cont=cont+1;
        }
        t=t+"<tr><td class='letra'>"+L[i]+"</td>"+c+"</tr>";
    }
    $('#body').html(t);
    $('#head').html(h);

}

$('#buscarCliente').click(function(){
    var cinit = $('#cinit1').prop('value');
    var parametros = {
        "cinit" : cinit
    };
    $.ajax({
        data:  parametros,
        url:   'ClienteCtrl/datocliente',
        type:  'post',
        beforeSend: function () {
            //$("#resultado").html("Procesando, espere por favor...");
        },
        success:  function (response){
            var datos=JSON.parse(response);
            if (datos.cinit==''){
                $('#idcliente').prop('value','');
                $('#cinit').prop('value',cinit);
                $('#nombre').prop('value','');
                $('#apellido').prop('value','');
                $('#email').prop('value','');
                $('#telef').prop('value','');}
            else{
                idcliente
                $('#idcliente').prop('value',datos.idCliente);
                $('#cinit').prop('value',datos.cinit);
                $('#nombre').prop('value',datos.nombreCl);
                $('#apellido').prop('value',datos.apellidoCl);
                $('#email').prop('value',datos.email);
                $('#telef').prop('value',datos.telefono);}

        }
    })
});

function calculo(){
    var total=0;
    $('.costo').each(function(){    
        console.log(($(this).html())),
        total = total + parseFloat($(this).html())
    
});
    $('#totalPre').html(total);
};

function insertVenta(){
    var totalventa=$('#totalPre').html();
} 