$(document).ready(function(){
    calculaCaja();
    calculaDetalle();
    calculototal();
});  

$('#fechacandy').change(function(){ 
    calculaCaja();
    calculaDetalle();
    calculototal();
});
$('#vendedor').change(function(){
    calculaCaja();
    calculaDetalle();
    calculototal();
})
function calculaCaja(){
    var fecha=$('#fechacandy').val();
    var id=$('#vendedor').val();
    var param={
        'fecha':fecha,
        'id':id
    };
    var resFactura="";
    var resdetalle="";
    var total=0;
    var estadoVenta='';
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
            $('#rfactura').html(resFactura);
            
        }
    })
};

function calculaDetalle(){
    var fecha=$('#fechacandy').val();
    var id=$('#vendedor').val();
    var param={
        'fecha':fecha,
        'id':id
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
                resdetalle+="<td>"+row.nombreProd+"</td>";                
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
    var id=$('#vendedor').val();
    var param={
        'fecha':fecha,
        'id':id
    };
    $.ajax({
        data:  param,
        url:   'pruebaCandy',
        type:  'post',
        beforeSend: function () {
            //$("#resultado").html("Procesando, espere por favor...");
        },
        success:  function (response){
            console.log(response);
            var myWindow = window.open("", "myWindow", "width=200,height=100");
            myWindow.document.write(response);
              myWindow.document.close();
              myWindow.focus();
              myWindow.print();
              myWindow.close();
        }})
        $.ajax({
            data:  param,
            url:   'pruebaFactCandy',
            type:  'post',
            beforeSend: function () {
                //$("#resultado").html("Procesando, espere por favor...");
            },
            success:  function (response){
                console.log(response);
                var myWindow = window.open("", "myWindow", "width=200,height=100");
                myWindow.document.write(response);
                  myWindow.document.close();
                  myWindow.focus();
                  myWindow.print();
                  myWindow.close();
            }})
});

function calculototal(){
    var fecha=$('#fechacandy').val();
    var id=$('#vendedor').val();
    var param={
        'fecha':fecha,
        'id':id
    };
    $.ajax({
        data:  param,
        url:   'total',
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