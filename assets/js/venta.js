$('#fecfuncion').change(listado);
$('#fecfuncion').change(function(){
    if($(this).prop('value') < new Date())
    bloqueobtn();
}); 
$(document).ready(listado());  
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
}
);
  
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
            $('#selecfun .ui-selected').removeClass('ui-selected');
            var index=$('#selecost .ui-selected').index();
            console.log(index);
            $("#selecfun li:eq("+index+")").addClass('ui-selected');
            $("#lblPrecio").html("0Bs");
            $("#lblCantidadEntradas").html("0");
            mostrardatos($("#selecfun .ui-selected").prop('value'));
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
            mostrardatos($("#selecfun .ui-selected").prop('value'));
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
                                         mostrardatos($("#selecfun .ui-selected").prop('value'));
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
        if ($('#tabPreVenta tr').length > 0 || parseInt($('#lblCantidadEntradas').html())>0)
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
                             var costo=$('#selecost .ui-selected').prop('value');
                             var codSala=$('#selecfun .ui-selected input').prop('value');
                             var fecfun=$('#fecfuncion').prop('value');
                             var idfunreg=$('#selecfun .ui-selected').prop('value');
                             var horafun=$('#selecfun .ui-selected label').html()+":00";
                             var pelicula=$('#selectable .ui-selected input').prop('value');
                             if(parseInt($('#totalentrada').html())==parseInt($('#numasignada').html())){

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
                                //console.log(idsien+' '+idfunreg+' '+numerofuncion+' '+tarSerie+' '+nunSala+' '+codSala+' '+fecfun+' '+costo+' '+col+' '+fil+' '+pelicula+' '+horafun);
                            }                                
                           )


                            $("#exampleModal").modal('hide');//ocultamos el modal
                            $('#lblCantidadEntradas').html("0");
                            $('#lblPrecio').html('0Bs');
                            //location.reload();
                                 wait(750);
                                 relleno();
                                 calculo();
                                 $('#body').html('');

                             }

                        });
                   
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
                c=c+"<td align='center' style='color: white;' data-numero='"+j+"' data-fila='"+asientos[cont].fila+"' data-estado='1' data-idasiento='"+asientos[cont].idAsiento+"' class='lugar libre'>"+L[asientos[cont].fila -1 ]+"-"+j+"</td>";
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


    if($('#cinit').prop('value')!='' && $('#apellido').prop('value')!='' && validocupon)
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
    else
    idcl=$('#idcliente').prop('value');
    factCinit=$('#cinit').prop('value');
    var montoTotal=parseFloat($('#totalPre').html());

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
                        tipo='RECIBO';
                        var parventa = {
                            'total':montoTotal,
                            'ccontrol':codControl ,
                            'codigoqr': codqr,
                            'tipo':tipo ,
                            'idCliente': idcl,
                            'iddosif':varidDosif,
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
                            $("#clienteModal").modal('hide');//ocultamos el modal
                                // location.reload();
                                if(tipo=='RECIBO')
                                    location.href=location.href+'/printR/'+response;
                                else
                                    location.href=location.href+'/printF/'+response;
                            }
                        })
                }
            })
            



        }

    })
    

    }   
    /*codigo de control:  numero de autorizacion; numerode orden; cinit; fecha venta; monto ; keydosificacion/*/
    /*codigoQR nit empresa|numero fact1 | nroautoriz| fechaemis|total|importe=total| codigo de control|nitci clinet|0|0|0|0.00 */
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
    $p = $('#pago').prop('value');
    $pp= $('#prepago').prop('value');
    if($p>$pp){
        $res=$p - $pp;
        $('#resultado').prop('value',($p - $pp));
    }
    else
        $('#resultado').prop('value',0);
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