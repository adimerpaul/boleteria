$('#fecfuncion').change(listado);
$(document).ready(listado());  



$( function() {  
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
                                        cadenahorario=cadenahorario+'<li class="ui-widget-content" value="'+row.idFuncion+'"><span style="border-image: initial; border: 3px solid blue;">S'+row.nroSala+'</span> '+row.horaIn+' ('+row.horaF+')';
                                        cadenahorario=cadenahorario+'<input type=hidden value='+ row.idSala+'>';
                                        cadenahorario=cadenahorario+'</li>';
                                        cadenacosto=cadenacosto+'<li class="ui-widget-content" value="'+row.precio+'">'+row.serie+' => ' +row.precio+' Bs</il>';
                                     }),


                                         $("#selecfun").html(cadenahorario);          
                                         $("#selecost").html(cadenacosto);
                                         $('#selecfun li:first').addClass('ui-selected');
                                         $('#selecost li:first').addClass('ui-selected');
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
    if(parseInt($('#lblCantidadEntradas').html()) > 0)
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
                            cadenapelicula=cadenapelicula+'<li class="ui-widget-content" value="'+row.idPelicula+'" >';
                            cadenapelicula=cadenapelicula+''+row.nombre+' ' + dd;
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
    var idsala = $('#selecfun .ui-selected input').prop('value') // Extract info from data-* attributes
    var cantidad = parseInt( $('#lblCantidadEntradas').html())
    var cantaux = 0
    $('#habilitados').html("");
    console.log($('#selecfun .ui-selected').prop('value'));
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
            console.log(asientos);

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
                         $('#bolacepta').on('click',function(){
                             var total="";
                         console.log($('td .asignado').data('idasiento'));
                                //$('#body td .lugar.asignado').each(
                                //total = total + " "+$('#body td .asignado').data('idasiento'),
                            //console.log($('#body td .asignado').data('idasiento'))
                                
                           // )
                            
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
                c=c+"<td data-numero='"+j+"' data-estado='3' data-idasiento='"+asientos[cont].idAsiento+"' class='lugar vendido'></td>";
                else
                c=c+"<td data-numero='"+j+"' data-estado='1' data-idasiento='"+asientos[cont].idAsiento+"' class='lugar libre'></td>";
            }else{
                c=c+"<td data-numero='"+j+"' data-estado='0' class='lugar ocupado'></td>";
            }
            cont=cont+1;
        }
        t=t+"<tr><td class='letra'>"+L[i]+"</td>"+c+"</tr>";
    }
    $('#body').html(t);
    $('#head').html(h);

}



