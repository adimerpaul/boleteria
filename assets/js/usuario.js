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


                        cadenaSeccion += '<div class="row-fluid">';
                        cadenaSeccion += '<div class="span6">';
                        cadenaSeccion += '<div class="control-group">';
                        cadenaSeccion += '<label class="control-label checkbox">';
                        cadenaSeccion += row.nombreSec;
                        cadenaSeccion += ' <input name="chkPermiso[]" type="checkbox" value="' + row.idSeccion + '"/>';
                        cadenaSeccion += '</label>';
                        cadenaSeccion += '<div class="controls" >';	
                        cadenaSeccion += '<div class="col-md-2"></div>';	
                        cadenaSeccion += '<div class="col-md-10">';	
                        for(i=0;i<datos.length;i++){
                            if(datos[i].seccion_padre_id==row.idSeccion)
                            {
                                cadenaSeccion += '<label class="checkbox line">';
			            		cadenaSeccion += '<input name="chkPermiso[]" type="checkbox" value="' + datos[i].idSeccion + '"/> ';
			            		cadenaSeccion += datos[i].nombreSec;
			            		cadenaSeccion += '</label><br>';
                            }
                        }
                        cadenaSeccion+='</div>';
                        cadenaSeccion+='</div>';
                        cadenaSeccion+='</div>';
                        cadenaSeccion+='</div>';
                        cadenaSeccion+='</div>';

                    }
    
                        });
 
                        //$('#idemp').prop('value',datos.idEmpresa);
;	
                            $("#secciones").html(cadenaSeccion);
                            $("#secciones .controls").each(function(i,v){							
                                $(this).hide();							
                            });	
                            setSeccionesPadreListener();
    

                    }

            });
	
 							

 

}
);
setSeccionesPadreListener = function(){
    $(".control-label input:checkbox").click(function(e){		

        if($(this).is(':checked')){						
            $(this).closest(".control-group").find(".controls").show();						
        
        }else{						
            $(this).closest(".control-group").find(".controls").hide();
            $(this).closest(".control-group").find(".controls input:checkbox").each(function(i,v){
                
                if($(this).is(':checked')){
                    $(this).click();								
                }
                
            });					
        }					
    });	
}
