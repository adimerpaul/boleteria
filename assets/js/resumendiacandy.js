$(document).ready(function(){
    calculaCaja();
    calculaDetalle();
});  

$('#fechacandy').change(function(){ 
    calculaCaja();
    calculaDetalle();
});

function calculaCaja(){
    var fecha=$('#fechacandy').val();
    var param={
        'fecha':fecha
    };
    var resFactura="";
    var resdetalle="";
    var total=0;
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
            console.log(param);
            datos2.forEach(row => {
                resFactura+="<tr>";
                resFactura+="<td>"+row.idVentaCandy+"</td>";                
                resFactura+="<td>"+row.fechaVenta+"</td>";                
                resFactura+="<td>"+row.nombreCl+" "+row.apellidoCl+"</td>";                
                resFactura+="<td>"+row.total+"</td>";                
                resFactura+="</tr>";
                total=total+parseFloat(row.total);
            });
            resFactura+="<tr><th></th><th></th><th>Total</th><th>"+total+"</th></tr>";
            $('#rfactura').html(resFactura);
            
        }
    })
};

function calculaDetalle(){
    var fecha=$('#fechacandy').val();
    var param={
        'fecha':fecha
    };
    var resdetalle="";
    var total=0;
    $.ajax({
        data:  param,
        url:   'detalleProducto',
        type:  'post',
        beforeSend: function () {
            //$("#resultado").html("Procesando, espere por favor...");
            //$('#listaeliculas').html("procesando...");
        },
        success:  function (response){
            $('#rdetalle').html('');
            console.log(response);
            datos2=JSON.parse(response);
            console.log(param);
            datos2.forEach(row => {
                resdetalle+="<tr>";
                resdetalle+="<td>"+row.idProducto+"</td>";                
                resdetalle+="<td>"+row.nombreProd+" "+row.nombrePref+"</td>";                
                resdetalle+="<td>"+row.cant+"</td>";                
                resdetalle+="<td>"+row.precioVenta+"</td>";                
                resdetalle+="<td>"+row.total+"</td>";                
                resdetalle+="</tr>";
                total=total+parseInt(row.total);
            });
            $.ajax({
                data:  param,
                url:   'detalleCombo',
                type:  'post',
                beforeSend: function () {
                    //$("#resultado").html("Procesando, espere por favor...");
                    //$('#listaeliculas').html("procesando...");
                },
                success:  function (response){
                    dat=JSON.parse(response)
                    dat.forEach(row => {
                        resdetalle+="<tr>";
                        resdetalle+="<td>"+row.idCombo+"</td>";                
                        resdetalle+="<td>"+row.nombreCombo+"</td>";                
                        resdetalle+="<td>"+row.cant+"</td>";                
                        resdetalle+="<td>"+row.precioVenta+"</td>";                
                        resdetalle+="<td>"+row.total+"</td>";                
                        resdetalle+="</tr>";
                        total=total+parseInt(row.total);   
                    });
                    resdetalle+="<tr><th></th><th></th><th></th><th>Total</th><th>"+total+"</th></tr>";

                    $('#rdetalle').html(resdetalle);
                }})


            
        }
    })
};

$('#imprimirCandy').click(function(){
    var fecha=$('#fechacandy').val();
    
    var param={
        'fecha':fecha
    };
    var url='imprimirCandy';
    
    $.post(url,param);
});