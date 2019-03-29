$('#fecfuncion').change(listado);

$( function() {
    $( "#selectable" ).selectable()
    }
);

$("#selectable" ).selectable({
    stop: function(){
    $( ".ui-selected", this ).each(function() {
          console.log($(this).prop('value'));
          listah($(this).attr('value'));
          function listah()
          {
              var cadenahorario="";
              var parametros = {
                                  "idpel" : '15'
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
                                  datos.forEach(row => {
                            
                                    cadenahorario=cadenahorario+row.horaInicio; 
                                  }),
                                   $("#horariopelicula").html(cadenahorario)
                                    
          
                              },
                          })
              };
        });
    }
  });

 


$(document).ready(listado());  
    
function listado(){
    var cadenapelicula="";
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
                            cadenapelicula=cadenapelicula+''+row.nombre+'';
                            cadenapelicula=cadenapelicula+'</li>'; 
                        }),
                         $("#selectable").html(cadenapelicula)
                          

                    },
                })
    }  ; 

 
  