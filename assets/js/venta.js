$('#fecfuncion').change(listado);
$(document).ready(listado());  



$( function() {  
  

$("#selectable" ).selectable(
    {
    stop: function(){
        var id=0;
    $( ".ui-selected", this ).each(function() {
          console.log($(this).prop('value'));
          id=$(this).attr('value')+'';
        
              var cadenahorario="";
              var cadenacosto="";
              var parametros = {
                                  "idpel" : id
                                  };
                      $.ajax({                        
                              data:  parametros,
                              url:   'VentaCtrl/horario',  
                              type:  'post',
                              beforeSend: function () {
                                      $("#horariopelicula").html("Procesando, espere por favor... "+parametros['idpel']);
                              },
                              success:  function (response) {
                                  $("#horariopelicula").html("");
          
                                  console.log(response);
                                var datos=JSON.parse(response);
                                    cadenahorario=cadenahorario+'<ol id="selecfun">';
                                    cadenacosto=cadenacosto+'<ol id="selecfun">';
                                    datos.forEach(row => {
                                    cadenahorario=cadenahorario+'<li class="ui-widget-content"><span style="border-image: initial; border: 3px solid blue;">S'+row.nroSala+'</span> '+row.horaIn+' ('+row.horaF+')</li>';
                                    cadenacosto=cadenacosto+'<li class="ui-widget-content">'+row.serie+' ' +row.precio+'</il>';
                                  }),
                                    cadenahorario=cadenahorario+'</ol>';
                                    cadenacosto=cadenacosto+'</ol>';
                                         $("#horariopelicula").html(cadenahorario);          
                                         $("#listacosto").html(cadenacosto);          
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

    
function listado(){
    var cadenapelicula="";
    $("#horariopelicula").html("");
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
                            cadenapelicula=cadenapelicula+'<li class="ui-widget-content" value="'+row.idPelicula+'" >';
                            cadenapelicula=cadenapelicula+''+row.nombre+' ' + dd;
                            cadenapelicula=cadenapelicula+'</li>'; 
                        }),
                         $("#selectable").html(cadenapelicula)
                          

                    },
                })
    }  ; 

 
  