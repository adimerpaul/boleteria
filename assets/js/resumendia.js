$(document).ready(function(){
    calculaCaja();
    calculaDetalle();
    calculototal();
});  

$('#fechadia').change(function(){ 
    calculaCaja();
    calculaDetalle();
    calculototal();
});

function calculaCaja(){
    var fecha=$('#fechadia').val();
    var param={
        'fecha':fecha
    };
    var resFactura="";
    var resdetalle="";
    var total=0;
    var estadoVenta='';
    $.ajax({
        data:  param,
        url:   'ResumenDia/reportedia',
        type:  'post',
        beforeSend: function () {
            //$("#resultado").html("Procesando, espere por favor...");
            //$('#listaeliculas').html("procesando...");
        },
        success:  function (response){
            $('#tabfactura').html('');
            console.log(response);
            datos2=JSON.parse(response);
            console.log(param);
            datos2.forEach(row => {
                resFactura+="<tr>";
                resFactura+="<td>"+row.idVenta+"</td>";                
                resFactura+="<td>"+row.fechaVenta+"</td>";  
                if(row.estado=="ANULADO")              
                    resFactura+="<td>A</td>";
                else{
                    if(row.tipoVenta=="FACTURA")
                        resFactura+="<td>F</td>";
                    else
                        resFactura+="<td>R</td>";
                    
                }  
                resFactura+="<td>"+row.nombreCl+" "+row.apellidoCl+"</td>";                
                resFactura+="<td>"+row.total+"</td>";                
                resFactura+="</tr>";
                total=total+parseFloat(row.total);
            });
            resFactura+="<tr><th></th><th></th><th>Total</th><th>"+total+"</th></tr>";
            $('#tabfactura').html(resFactura);
            
        }
    })
};

function calculaDetalle(){
    var fecha=$('#fechadia').val();
    var param={
        'fecha':fecha
    };
    var resdetalle="";
    var total=0;
    $.ajax({
        data:  param,
        url:   'ResumenDia/detallePelicula',
        type:  'post',
        beforeSend: function () {
            //$("#resultado").html("Procesando, espere por favor...");
            //$('#listaeliculas').html("procesando...");
        },
        success:  function (response){
            $('#tabPelicula').html('');
            console.log(response);
            datos2=JSON.parse(response);
            console.log(param);
            datos2.forEach(row => {
                resdetalle+="<tr>";
                resdetalle+="<td>"+row.nombre+"</td>";                
                resdetalle+="<td>"+row.cantidadb+"</td>";                
                resdetalle+="<td>"+row.total+"</td>";                
                resdetalle+="</tr>";
                total=total+parseInt(row.total);
            });
            resdetalle+="<tr><th></th><th>Total</th><th>"+total+"</th></tr>";

            $('#tabPelicula').html(resdetalle);
            
        }
    })
};

$('#imprimir').click(function(){
    var fecha=$('#fechadia').val();
    
    var param={
        'fecha':fecha
    };
    var url='imprimir';
    
    $.post(url,param);
});

function calculototal(){
    var fecha=$('#fechadia').val();
    var param={
        'fecha':fecha
    };
    $.ajax({
        data:  param,
        url:   'ResumenDia/totalBol',
        type:  'post',
        beforeSend: function () {
            //$("#resultado").html("Procesando, espere por favor...");
        },
        success:  function (response){
            $('#totalrecibo').html('0');
            $('#totalfactura').html('0');
            console.log(response);
            datos2=JSON.parse(response);
            $('#totalrecibo').html(' '+datos2.trecibo+' Bs');
            $('#totalfactura').html(' '+datos2.tfactura+' Bs');
            
        }})
}