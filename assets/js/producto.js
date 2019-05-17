/*the only js is to continuously checking the value of the dropdown. for posterity*/
var i = setInterval(function(){$("#trace").val($("input[name=line-style]:checked").val());},100);
$( "#nombre" ).keyup(function() {
    actualizarEjemplo();
  });

  $("#coloricono").change(function(){
    actualizarEjemplo();
      
  });
   $("#icono").change(function(){
    actualizarEjemplo();
       
   });
function actualizarEjemplo() {
    $('#divEjemplo').empty();
    var nombre = $("#nombre").val();
    var color = $("#coloricono").val();
    var icono = $("#icono").val();

    if(icono !== ""){
        icono = "<i><img src='"+icono+"' alt='logo' style='height:90px; width:90px;'/></i>";
    }

    if(color !== ""){                 
        var ejemplo = 
        "<div class='tile bg-"+color+"' style='margin-left: 30px;'>" +
                "<div class='tile-body'>" +icono+ "</div>" +
                    "<div class='tile-object'>" +
                    "<h5 style='font-weight: bold;'>" + nombre +
                    "</h5></div>" +
        "</div>";

        $('#divEjemplo').html(ejemplo);
    }
}

$('#pventa').change(function(){
    calutilidad();
});
$('#pcosto').change(function(){
    calutilidad();
});

function calutilidad(){
    var venta = $('#pventa').val();
    var costo = $('#pcosto').val();
    var ganancia =0;
    if (venta>0 && costo >0)
    {ganancia=venta-costo-(venta*0.13);
        $('#utilidad').html('Utilidad: '+ganancia );
        if(ganancia >=0)
        $('#utilidad').css('color','green');
        else
        $('#utilidad').css('color','red');
        
        $('#utilidad').show();
    }
    else{
        $('#utilidad').html('');
        $('#utilidad').hide();
}}