$('#fecfuncion').change(listado);
$(function() {
    $("#selectable").selectable();
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

                        console.log(parametros);
                        console.log(response);
                        var dd="";
                        var datos=JSON.parse(response);
                        datos.forEach(row => {
                            if(row.formato == 1) dd="3D";
                            else dd="2D";   
                            cadenapelicula=cadenapelicula+'<li class="ui-widget-content col-sm-2">';
                            cadenapelicula=cadenapelicula+'<div class="titulo"><h4>'+row.nombre+'</h4></div>';
                            cadenapelicula=cadenapelicula+'<div class="tipo">'+dd+'</div>';
                            cadenapelicula=cadenapelicula+'<div class="vendido">33</div>';
                            cadenapelicula=cadenapelicula+'</li>'; 
                        }),
                         $("#selectable").html(cadenapelicula)
                          

                    },
                })
    }


        