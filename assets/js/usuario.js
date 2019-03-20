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