$('#fecfuncion').change(listado);
$('#fecfuncion').change(function(){
    if($(this).prop('value') < new Date())
    bloqueobtn();
    caltotalventa();
}); 

$(document).ready(listado());
$(document).ready(caltotalventa());
$(document).ready(valDosificacion());  
$(document).ready(calculo());
$(document).ready(VerificaDosificacion());
$(document).ready(
    function(){
        console.log($('#tabPreVenta tr').length);
if ($('#tabPreVenta tr').length > 0 || parseInt($('#lblCantidadEntradas').html())>0)
    $('#btnAgregar').removeClass("disabled");
    else 
    $('#btnAgregar').addClass("disabled");
$('#cupon').hide();
if($('#selecost').html()=="" && $('#selecfun').html()=="")    
{$('#btnAceptar').addClass("disabled");
if ($('#totalPre').html()!="0")
$('#btnAceptar').removeClass("disabled");
}
else
$('#btnAceptar').removeClass("disabled");

}
);
function caltotalventa(){
    param={'fecha':$('#fecfuncion').val() }
        $.ajax({                        
                        data:  param,
                        url:   'VentaCtrl/totalventa',  
                        type:  'post',
                        beforeSend: function () {
                                //$("#selecfun").html("Procesando, espere por favor... "+parametros['idpel']);
                        },
                        success:  function (response) {
                           console.log(response);
                          var datos=JSON.parse(response)[0];
                          if($.isNumeric(datos.totalv))
                          $('#tventa').html('Venta Boletos Dia: '+datos.totalv);
                          else 
                          $('#tventa').html('Venta Boletos Dia: 0');
                      }
                  }
              ) 
};

function datosiniciales(){
    $('#lblEntradasDisponibles').html(0);
    $('#lblEntradasVendidas').html(0);
    $('#lblEntradasDevueltas').html(0);
    $('#lblCapacidadSala').html(0);  
} 
function mostrardatos(varid){
    console.log(varid);
    var parametros = {
                        "idfun" : varid
                          };
              $.ajax({                        
                      data:  parametros,
                      url:   'VentaCtrl/boletoFuncion',  
                      type:  'post',
                      beforeSend: function () {
                              //$("#selecfun").html("Procesando, espere por favor... "+parametros['idpel']);
                      },
                      success:  function (response) {
                         console.log(response);
                        var datos=JSON.parse(response)[0];
                        $('#lblEntradasDisponibles').html(parseInt(datos.ctotal)-parseInt(datos.vendido)-parseInt(datos.temp));
                        $('#lblEntradasVendidas').html(parseInt(datos.vendido)+parseInt(datos.temp));
                        $('#lblEntradasDevueltas').html(parseInt(datos.devuelto));
                        $('#lblCapacidadSala').html(parseInt(datos.ctotal));
                        
                        
                    }
                }
            )
}

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
            $('#selecost li:first').addClass('ui-selected');
            $("#lblPrecio").html("0Bs");
            $("#lblCantidadEntradas").html("0");
            //mostrardatos($("#selecfun .ui-selected").prop('value'));
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
                                        row.porcentaje=100-row.porcentaje;
                                       /* if(row.porcentaje>=0 && row.porcentaje<=5)
                                        var fondo=" style='background:red;'";
                                        else{
                                            if(row.porcentaje>5 && row.porcentaje<=50)
                                                var fondo=" style='background:yellow;'";
                                            else{
                                                if(row.porcentaje>50 && row.porcentaje<=100)
                                                var fondo=" style='background:green;'";
                                                else 
                                                var fondo=" style='background:gray;'";
                                            }
                                        }*/
                                        cadenahorario=cadenahorario+'<li class="ui-widget-content" style="" value="'+row.idFuncion+'"><span>S'+row.nroSala+'     </span> '+row.horaIn+' ('+row.horaF+')';
                                        cadenahorario=cadenahorario+'<input type=hidden value='+ row.idSala+'>';
                                        cadenahorario=cadenahorario+'<label hidden>'+ row.horaIn+'</label>';
                                        cadenahorario=cadenahorario+'<h6 hidden>'+ row.porcentaje+'</h6>';
                                        cadenahorario=cadenahorario+'</li>';
 
                                     }),


                                         $("#selecfun").html(cadenahorario);          
                                         //$('#selecfun li:first').addClass('ui-selected');
                                         //mostrardatos($("#selecfun .ui-selected").prop('value'));
                                         datosiniciales();
                                         colorfuncion();
                                         $("#lblPrecio").html("0Bs");
                                         $("#lblCantidadEntradas").html("0");
                                         bloqueobtn();
                              },
                          })

               
        });
    }
  });
  
function colorfuncion(){
    $('#selecfun li').each(function(){
        var por=$("h6",this).html();
        console.log(por);
        if(por>=0 && por<=5)
        var fondo=" background:red;color:black";
        else{
            if(por>5 && por<=50)
                var fondo=" background:yellow;color:black";
            else{
                if(por>50 && por<=100)
                var fondo=" background:green";
                else 
                var fondo=" background:gray";
            }
        }
        $(this).attr('style',fondo);
    })
}
    $( "#selecfun").selectable(    {
        stop: function(){
            console.log($("#selecfun .ui-selected").prop('value'));
          /* $(this).each(function() {
               if(!$(this).hasClass("ui-selected")){
                   var aaa=$(this,"li span").html();
                if(aaa>=0 && aaa<=5)
                var fondo=" background:red";
                else{
                    if(aaa>5 && aaa<=50)
                        var fondo=" background:yellow";
                    else{
                        if(aaa>50 && aaa<=100)
                        var fondo=" background:green";
                        else 
                        var fondo=" background:gray";
                    }
                }
                $(this,"li span").attr('style',fondo);
               }
           }),   */        
            $( ".ui-selected", this ).each(function() {
                colorfuncion();
                $("#selecfun .ui-selected").attr('style','');
              var cadenacosto="";
              var param = {
                                "idfun":  $("#selecfun .ui-selected").prop('value')
                                  };
                      $.ajax({                        
                              data:  param,
                              url:   'VentaCtrl/horario2',  
                              type:  'post',
                              beforeSend: function () {
                                      $("#selecost").html("Procesando, espere por favor... ");
                              },
                              success:  function (response) {
                                $("#selecost").html("");
                                 console.log(response);
                                 console.log(param);
                                var datos=JSON.parse(response);
                                    datos.forEach(row => {
                                        cadenacosto=cadenacosto+'<li class="ui-widget-content" value="'+row.precio+'">'+row.serie+' => ' +row.precio+' Bs';
                                        cadenacosto=cadenacosto+'<input type=hidden value='+ row.serie+'>';
                                        cadenacosto=cadenacosto+'<label hidden name="tarifa">'+row.idTarifa+'</label>';
                                        cadenacosto=cadenacosto+'<span hidden name="tarifa">'+row.precio+'</span>';
                                        cadenacosto=cadenacosto+'</li>';
                                     }),
               
                                         $("#selecost").html(cadenacosto);
                                         $('#selecost li:first').addClass('ui-selected');
                                         $("#lblPrecio").html("0Bs");
                                         $("#lblCantidadEntradas").html("0");
                                            mostrardatos($("#selecfun .ui-selected").prop('value'));
                                         if( moment().format('Y-MM-DD') > $('#fecfuncion').prop('value'))
                                         bloqueobtn();
                                         else
                                         desbloqueobtn();      
                              },
                          })
            
            
        })}
 
    });

  $( "#selecfun" ).selectable({
      start : function(){}
  });
}
);

$( "#selecfun" ).selectable();

$('#lblCantidadEntradas').bind("DOMSubtreeModified",function(){
    var tarifa=parseFloat($('#selecost .ui-selected span').html());
    var valor=parseFloat($('#lblCantidadEntradas').html());
    var total=(valor*tarifa);
    $('#lblPrecio').html(total+'Bs');    
    
    if ($('#tabPreVenta tr').length > 0 || parseInt($('#lblCantidadEntradas').html())>0)
    
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
                        console.log(response);
                        var dd="";
                        var datos=JSON.parse(response);
                        datos.forEach(row => {
                            if(row.formato == 1) dd="3D";
                            else dd="2D";   
                            cadenapelicula=cadenapelicula+'<li class="ui-widget-content" value="'+row.idPelicula+'" > ';
                            cadenapelicula=cadenapelicula+'<input type="hidden" value="'+row.nombre+' '+dd+'">';
                            cadenapelicula=cadenapelicula+''+row.nombre+' <br><div class="row detalle"><p class="ptipo">'+ dd +'</p><p class="pnum"> '+ row.totalp+'</p></div> ';
                            cadenapelicula=cadenapelicula+'</li>'; 
                        }),
                         $("#selectable").html(cadenapelicula)
                          

                    },
                })
    }; 

    function bloqueobtn(){
        $('#btnEntradaMenos').addClass("disabled");
        $('#btnEntradaMas').addClass("disabled");
        $('#btnCancelar').addClass("disabled");
        if ($('#tabPreVenta tr').length > 0 && $('#totalPre').html()!="0" )
            {$('#btnAceptar').removeClass("disabled");
            VerificaDosificacion();
            }
        else
            $('#btnAceptar').addClass("disabled");
        $('#btnAgregar').addClass("disabled");
        $('#lblCantidadEntradas').addClass("disabled");
        $('#lblCantidadEntradas').html("0");
        $('#lblPrecio').html('0Bs');
        
    }

       function desbloqueobtn(){
        $('#btnEntradaMenos').removeClass("disabled");
        $('#btnEntradaMas').removeClass("disabled");
        $('#btnCancelar').removeClass("disabled");
        if ($('#tabPreVenta tr').length > 0 && $('#totalPre').html()!="0" )        
        $('#btnAceptar').removeClass("disabled");
        VerificaDosificacion();
    }
 
  
var capacidad=0;
var asientos;

$('#exampleModal').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget) // Button that triggered the modal
    var idsala = $("#selecfun .ui-selected input").prop('value'); // Extract info from data-* attributes
    var cantidad = parseInt( $('#lblCantidadEntradas').html());
    var cantaux = 0;
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
                             var idtar=$('#selecost .ui-selected label').html();
                             var costo=$('#selecost .ui-selected span').html();
                             var codSala=$('#selecfun .ui-selected input').prop('value');
                             var fecfun=$('#fecfuncion').prop('value');
                             var idfunreg=$('#selecfun .ui-selected').prop('value');
                             var horafun=$('#selecfun .ui-selected label').html()+":00";
                             var pelicula=$('#selectable .ui-selected input').prop('value');
                             var validar=0;
                             if(parseInt($('#totalentrada').html())==parseInt($('#numasignada').html())){
                                validar=0;
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
                                                           "idtarifa":idtar,
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
                                                                $('#btnAceptar').removeClass("disabled");
                                                                relleno();
                                                                calculo();
                                                                if(response==1){
                                                                    alert('Ticket registrado');
                                                                    validar=1;
                                                                    $.ajax({
                                                                        data:{},
                                                                        url:'VentaCtrl/pruebadeleteTempAll',
                                                                        type:'post',
                                                                        success:function(r){}
                                                                    })
                                                                }
                                                    
                                                            }
                                                        })
                                            
                                     
                                 
                                //console.log(idsien+' '+idfunreg+' '+numerofuncion+' '+tarSerie+' '+nunSala+' '+codSala+' '+fecfun+' '+costo+' '+col+' '+fil+' '+pelicula+' '+horafun);
                            })

                            $("#exampleModal").modal('hide');//ocultamos el modal
                            $('#lblCantidadEntradas').html("0");
                            $('#lblPrecio').html('0Bs');
                            //location.reload();
                                 wait(750);
                                 relleno();
                                 calculo();
                                 $('#body').html('');
                                 console.log(validar);

                             }
                         
                            }
                    );
                   
                }
            });

        }
        
    });

})

function wait(ms){
    var start = new Date().getTime();
    var end = start;
    while(end < start + ms) {
        end = new Date().getTime();
    }
}

function relleno(){
    $.ajax({
        url: 'VentaCtrl/relleno',
        type: 'post',
        beforeSend: function () {
            $('#tabPreVenta').html('cargando....');
        },
        success: function (response) {
            $('#tabPreVenta').html(response);
            //console.log(response);
            var total=0.0;
            $('.costo').each(function(){
                //console.log(($(this).html())),
                total = total + parseFloat($(this).html())
            });
            $('#totalPre').html(total);
            $('#prepago').prop('value',total);
            
        }
    });
}
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
                c=c+"<td align='center' style='color: white;font-size: 20px' data-numero='"+j+"' data-fila='"+asientos[cont].fila+"' data-estado='1' data-idasiento='"+asientos[cont].idAsiento+"' class='lugar libre'>"+L[asientos[cont].fila -1 ]+"-"+j+"</td>";
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
    buscarCl();});

$('#cinit1').keyup(function(){
    buscarCl();
});
function buscarCl(){
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
                $('#idcliente').prop('value',datos.idCliente);
                $('#cinit').prop('value',datos.cinit);
                $('#nombre').prop('value',datos.nombreCl);
                $('#apellido').prop('value',datos.apellidoCl);
                $('#email').prop('value',datos.email);
                $('#telef').prop('value',datos.telefono);
                if (datos.cinit=='0')
                    $('#vtipo').bootstrapToggle('off');
                else 
                    $('#vtipo').bootstrapToggle('on');    
            }
        }
    })
};

$('#checkcupon').on('click',function(){
    if ($("#checkcupon").is(":checked"))
{
    $('#cupon').show();
    $('#vtipo').bootstrapToggle('off');
    $('#vtipo').bootstrapToggle('disable');
    $('#cinit1').prop('value',0);
    $('#cinit1').prop('readonly',true);
    buscarCl();
    $("#cupon").prop('required',true);
}
else {
    $('#cupon').hide();
    $('#cupon').prop('value','');          
    $('#vtipo').bootstrapToggle('enable');
    $('#cinit1').prop('readonly',false);
    $("#cupon").prop('required',false);
    $('#errorcupon').html('');
}
});
function validacp(){
    var par={"idcupon": $('#cupon').prop('value')};
    $.ajax({
        data:  par,
        url:   'VentaCtrl/validaCuponreg',
        type:  'post',
        beforeSend: function () {
            //$("#resultado").html("Procesando, espere por favor...");
        },
        success:  function (response){
            //var datos=JSON.parse(response);
            console.log(response);
            var datocupon =JSON.parse(response);
            console.log(datocupon.length);
            if(datocupon.length > 0)
            $('#errorcupon').html('Esta Registrado');
            else {
            $('#errorcupon').html('');
            $.ajax({
                data:  par,
                url:   'VentaCtrl/validaCupon',
                type:  'post',
                beforeSend: function () {
                    //$("#resultado").html("Procesando, espere por favor...");
                },
                success:  function (response){
                    //var datos=JSON.parse(response);
                    console.log(response);
                    var datocupon =JSON.parse(response);
                    console.log(datocupon.length);
                    if(datocupon.length > 0)
                    $('#errorcupon').html('');
                    else 
                    $('#errorcupon').html('No existe cupon o caduco');
                    
                }})}
            
        }})};

 
$('#cupon').keyup(function(){
    validacp();
});

$('#registrarVenta').click(function(){
    var idcl=0;
    var varidDosif;
    var varnroAutorizacion;
    var varllaveDosif;
    var varfechaHasta;
    var varleyenda;
    var varnroFactura;
    var varfechaventa;
    var codControl;
    var factCinit;
    var codControl="";
    var nitEmpresa;
    var codqr;
    var tipo;
    var validocupon=false;
    if ($("#checkcupon").is(":checked")){
        if($("#errorcupon").html() == '' && $("#checkcupon").prop('value')!="")
        validocupon=true;
        else 
        validocupon=false;
    }
    else 
    validocupon=true;


    if($('#cinit').prop('value')!='' && $('#apellido').prop('value')!='' && $('#apellido').val().length>=2 && validocupon && $('#tabPreVenta tr').length > 0)
    {   
    if($('#idcliente').prop('value')==''){
        var parametros = {
            "cinit" : $('#cinit').prop('value'),
            "nombre": $('#nombre').prop('value'),
            "apellido": $('#apellido').prop('value'),
            "email": $('#email').prop('value'),
            "telefono":$('#telef').prop('value')
        };
        $.ajax({
            data:  parametros,
            url:   'VentaCtrl/registrarVenta',
            type:  'post',
            beforeSend: function () {
                //$("#resultado").html("Procesando, espere por favor...");
            },
            success:  function (response){
                //var datos=JSON.parse(response);
                console.log(response);
                idcl=response;
            }
        })                    
    }
    else{
        var parame = {
                "id":$('#idcliente').prop('value'),            
                "nombre": $('#nombre').prop('value'),
                "apellido": $('#apellido').prop('value'),
                "email": $('#email').prop('value'),
                "telefono":$('#telef').prop('value')
            };
            $.ajax({
                data:  parame,
                url:   'VentaCtrl/updatecliente',
                type:  'post',
                success:  function (response){
                    //var datos=JSON.parse(response);
                    console.log(response);
                }
            })                    
    
            idcl=$('#idcliente').prop('value');
        }
    factCinit=$('#cinit').prop('value');
    $('#cinit').prop('value','');
    $('#apellido').prop('value','');
    var montoTotal=parseFloat($('#totalPre').html());
    var cancelado=0;
    if ($.isNumeric($('#pago').val())) 
    cancelado=$('#pago').val();
    else
    cancelado=0;
    $.ajax({
        url: 'DosificacionCtrl/ultimaDosificacion', 
        type: 'post',
        beforeSend: function () {
            //$("#resultado").html("Procesando, espere por favor...");
        },
        success:  function (response){
            var vardosif=JSON.parse(response)[0];
            console.log(vardosif);
            varidDosif =vardosif.idDosif;
            varnroAutorizacion=vardosif.nroAutorizacion;
            varllaveDosif=vardosif.llaveDosif;
            varfechaHasta=vardosif.fechaHasta;
            varleyenda=vardosif.leyenda;
            varnroFactura=parseInt(vardosif.nroFactura) + 1;//incrementar 1!!!!!!!
            varfechaqr=moment().format('YMMDD');
            varfechaventa=moment().format('Y-MM-DD H:i:s');
            
            //console.log(codControl);
            parametro={
                "numeroa": varnroAutorizacion,
                "nroFact":varnroFactura,
                "cinit":factCinit,
                "fecha":varfechaqr,
                "total":montoTotal,
                "llave":varllaveDosif

            };
            $.ajax({
                data:  parametro,                
                url: 'VentaCtrl/cControl', 
                type: 'post',
                beforeSend: function () {
                    //$("#resultado").html("Procesando, espere por favor...");
                },
                success:  function (response){
                    console.log(response);
                    codControl=response;

                    codqr= '329448023|'+varnroFactura+'|'+varnroAutorizacion+'|'+varfechaqr+'|'+montoTotal+'|'+montoTotal+'|'+codControl+'|'+factCinit+'|0|0|0|0.00';
                    if($('#vtipo').is(':checked'))
                        tipo='FACTURA';
                    else
                        {tipo='RECIBO';
                            codControl='';
                            codqr='';
                        }
                        var parventa = {
                            'total':montoTotal,
                            'ccontrol':codControl ,
                            'codigoqr': codqr,
                            'tipo':tipo ,
                            'idCliente': idcl,
                            'iddosif':varidDosif,
                             "cancelado":cancelado,                            
                            'cupon': $('#cupon').prop('value')
                        };
                        $.ajax({
                            data:  parventa,
                            url:   'VentaCtrl/regVenta',
                            type:  'post',
                            beforeSend: function () {
                                //$("#resultado").html("Procesando, espere por favor...");
                            },
                            success:  function (response){
                                console.log(response);
                                var idventa=response;
                            $("#clienteModal").modal('hide');
                            if(idventa==0) alert('error al Registrar intente nuevamente');
                            else{
                            if (tipo=='FACTURA'){
                                $.ajax({
                                    url: 'VentaCtrl/imprimirfactura/'+idventa,
                                    success: async function (e) {
                                        console.log(e);
                                        var myWindow = window.open("", "myWindow", "width=200,height=100");
                                        var te= await e;
                                        myWindow.document.write(te);
                                        myWindow.document.close();
                                        myWindow.focus();
                                        setTimeout(function(){
                                            myWindow.print();
                                            myWindow.close();
                                            boletos(idventa);
                                           //aniversario(idventa);

                                        },500);
                                    }
                                });
                                
                                }else {
                                    boletos(idventa);
                                    //aniversario(idventa);
                                }
                            }
                                
                            }
                            
                        })
                }
            })
        }

    })
    
    }
    else
    alert('Verifique monto y los campos esten llenados');
    /*codigo de control:  numero de autorizacion; numerode orden; cinit; fecha venta; monto ; keydosificacion/*/
    /*codigoQR nit empresa|numero fact1 | nroautoriz| fechaemis|total|importe=total| codigo de control|nitci clinet|0|0|0|0.00 */
});
function boletos(idventa){
    //console.log(idventa+'estas en la venta');
    $.ajax({
        url: 'VentaCtrl/imprimirboletos/'+idventa,
        success: async function (e) {
            var dato=JSON.parse(e);
            var contador=0;
            for (var i=0;i<dato.length;i++) {
                var idboleto = dato[i].idBoleto;
                //  setTimeout(function(){
                boleto(idboleto);
                $.ajax({
                    url: 'VentaCtrl/tienepromo/'+idboleto,
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

            };
            relleno();
            
        }
    });
    
}


async function recarga(){
    location.reload();}

function boleto(idboleto){
    $.ajax({
        url: 'VentaCtrl/impBoleto/'+idboleto,
        success: async function (e) {
            var myWindow = window.open("", "myWindow", "width=200,height=100");
            myWindow.document.write(e);
            myWindow.document.close();
            myWindow.focus();
            myWindow.print();
            myWindow.close();
        }
    });

    // $.ajax({
    //     url: 'VentaCtrl/tienepromo/'+idboleto,
    //     success: async function (e) {
    //        console.log(e);
    //     }
    // });
}
function aniversario(idventa){
    $.ajax({
        url: 'VentaCtrl/impAniv/'+idventa,
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
        url: 'VentaCtrl/impPromo/'+idventa,
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

$('#btnAceptar').click(function () {
    $('#cinit1').val('');
    $('#pago').val('');
});
function calculo(){
    var total=0.0;
    $('.costo').each(function(){    
        //console.log(($(this).html())),
        total = total + parseFloat($(this).html())
    
});
    $('#totalPre').html(total);
    $('#prepago').prop('value',total);
};

function insertVenta(){
    var totalventa=$('#totalPre').html();
} 


$('#pago').keyup(function(event){
    $p = $('#pago').val();
    $pp = $('#prepago').val();
        $res=($p) - ($pp);
        $('#resultado').prop('value',$res);
        if( $('#resultado').val()<0)
        $('#resultado').css('color','red');
        else
        $('#resultado').css('color','green');
        
        console.log($p);
});

function valDosificacion(){
    parm={'fdosif':moment().add(5, 'days').format('Y-MM-DD')}
    $.ajax({
        data: parm,
        url: 'VentaCtrl/verifDosifcacion', 
        type: 'post',
        beforeSend: function () {
            //$("#resultado").html("Procesando, espere por favor...");
        },
        success:  function (response){
            console.log(response);
            if (response == false){
                alert('Dosificacion Falta menos de 5 Dias');}
        }
    })
};
function VerificaDosificacion(){
    parm={'fdosif':moment().format('Y-MM-DD')}
    $.ajax({
        data: parm,
        url: 'VentaCtrl/verifDosifcacion', 
        type: 'post',
        beforeSend: function () {
            //$("#resultado").html("Procesando, espere por favor...");
        },
        success:  function (response){
            console.log(response);
            if (response == false){
            $('#btnAceptar').addClass("disabled");
            $.ajax({
                url:'VentaCtrl/UpDosificacion',
                type: 'post',
                beforeSend: function () {
                    //$("#resultado").html("Procesando, espere por favor...");
                },
                success:  function (response){
                    if (response == false)
                    alert('No se Cuenta con Dosificacion');
                }
            })

        }

        }
    })
}


function datostarifa(idtarifa){
    param={'idtarifa':idtarifa};
    console.log(param);
    $.ajax({
        data: parm,
        url: 'VentaCtrl/datotarifa/'+idtarifa, 
        beforeSend: function () {
            //$("#resultado").html("Procesando, espere por favor...");
        },
        success:  function (response){
            console.log(response);
            var dato=JSON.parse(response)[0];
            console.log(dato.precio);
            
        }
    })

}