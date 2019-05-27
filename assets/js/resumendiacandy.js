$('#fechacandy').change(function(){});

function calculaCaja(){
    var fecha=$('#fecha').val();
    var param=[
        'fecha'=fecha
    ];
    var resFactura="";
    var resdetalle="";
    $.ajax({
        data:  param,
        url:   'reportediaCandy',
        type:  'post',
        beforeSend: function () {
            //$("#resultado").html("Procesando, espere por favor...");
            //$('#listaeliculas').html("procesando...");
        },
        success:  function (response){
            $('#rfactura').html('');
            console.log(response);
            datos2=JSON.parse(response);
            console.log(datos2);
            datos2.forEach(row => {
                resFactura+="<tr>";
                resFactura+="<td>"+row.idVentaCandy+"</td>";                
                resFactura+="<td>"+row.fechaVenta+"</td>";                
                resFactura+="<td>"+row.nombreCl+" "+row.apellidoCl+"</td>";                
                resFactura+="<td>"+row.total+"</td>";                
                resFactura+="</tr>";
            });
        }
    })
};