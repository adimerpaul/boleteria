$('#pass').keyup(compararpass);
$('#confpass').keyup(compararpass);
function compararpass(){
    var cont = $('#pass').prop('value');
    var cont2 = $('#confpass').prop('value');
    
    if ((cont == cont2) ) {
        if ((cont=='') &&(cont2=='')) $('#mensaje_error').hide();
        else{
        $('#mensaje_error').hide();
        $('#mensaje_error').attr("class", "control-label col-md-12 text-success");
        $('#mensaje_error').show();
        $('#mensaje_error').html("Las constraseñas si coinciden");}
    } else {
         $('#mensaje_error').html("Las constraseñas no coinciden");
        $('#mensaje_error').show();
    
}
}


$('#textuser').keyup(verifiUser);
    function verifiUser(){
    var button = $(event.relatedTarget) // Button that triggered the modal
    var user1 = $('#textuser').prop('value'); // Extract info from data-* attributes
    var parametros = {
                      "user1" : user1,
                     "mostrar" : 'codigo'
              };
              $.ajax({
                      data:  parametros,
                      url:   'datos',
                      type:  'post',
                      beforeSend: function () {
                              //$("#resultado").html("Procesando, espere por favor...");
                      },
                      success:  function (response) {
                          console.log(response);
                          var datos=JSON.parse(response);
                          if (datos.user==''){
                            $('#user_error').html("");
                            $('#user_error').hide(); }
                            else
                           {
                            $('#user_error').html("el usuario existe");
                            $('#user_error').show();
                           
                          }                    
                      } 
              });
      
  }

$(document).ready(
    
function(){
    var cadenaSeccion="";
            $.ajax({
                    
                    url:   'recuperaSeccion',

                    beforeSend: function () {
                            $("#secciones").html("Procesando, espere por favor...");
                    },
                    success:  function (response) {
                        //console.log(response);
                        var datos=JSON.parse(response);
                        console.log(datos[0].nombreSec);
                        datos.forEach(row => {
                            if(row.seccion_padre_id==0){
                        console.log(row.nombreSec);
                        cadenaSeccion+='<label class="form-check-label">';
                        cadenaSeccion+='<input type="checkbox" class="form-check-input" id="'+row.nombreSec+'" name="'+row.nombreSec+'">'+row.nombreSec;
                        cadenaSeccion+='</label><br>';
                    }
                            
                        });
                        //$('#idemp').prop('value',datos.idEmpresa);

                            $("#secciones").html(cadenaSeccion);
                    }
            });
});


$('#empresa1').change(function(){
    if($('#empresa1').is(':checked')==true)
        $('#empresa12').removeAttr('hidden');
    else
        $('#empresa12').attr('hidden',true);
});

$('#pelicula1').change(checkpelicula);
function checkpelicula(){
    if($('#pelicula1').is(':checked')==true)
        $('#pelicula12').removeAttr('hidden');
    else
        $('#pelicula12').attr('hidden',true);       
}

$('#distrib1').change(checkdistrib);
function checkdistrib(){
    if($('#distrib1').is(':checked')==true)
        $('#distrib12').removeAttr('hidden');
    else
        $('#distrib12').attr('hidden',true);       
}

$('#sala1').change(checksala);
function checksala(){
    if($('#sala1').is(':checked')==true)
        $('#sala12').removeAttr('hidden');
    else
        $('#sala12').attr('hidden',true);       
}


$('#tarifa1').change(checktarifa);
function checktarifa(){
    if($('#tarifa1').is(':checked')==true)
        $('#tarifa12').removeAttr('hidden');
    else
        $('#tarifa12').attr('hidden',true);       
}

$('#programacion1').change(checkprogramacion);
function checkprogramacion(){
    if($('#programacion1').is(':checked')==true)
        $('#programacion12').removeAttr('hidden');
    else
        $('#programacion12').attr('hidden',true);       
}
