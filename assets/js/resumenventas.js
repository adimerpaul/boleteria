
var fecini;
var fecfin;
$(function() {
    var start = moment().subtract(29, 'days');
    var end = moment();
    function cb(start, end) {
        $('#fecha span').html(start.format('YYYY-MM-DD') + ' - ' + end.format('YYYY-MM-DD'));
        fecini=start.format('YYYY-MM-DD');
        fecfin=end.format('YYYY-MM-DD');
    }
    $('#fecha').daterangepicker({
        startDate: start,
        endDate: end,
        ranges: {
           'Hoy': [moment(), moment()],
           'Ayer': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
           'Ultimos 7 Dias': [moment().subtract(6, 'days'), moment()],
           'Ultimos 30 Dias': [moment().subtract(29, 'days'), moment()],
           'Este Mes': [moment().startOf('month'), moment().endOf('month')],
           'Ultimo Mes': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        }
    }, cb);

    cb(start, end);

});

$('#fecha span').bind("DOMSubtreeModified",function(){
    var ini=$('#fecha').data('daterangepicker').startDate;
    var fin=$('#fecha').data('daterangepicker').endDate;
    var param={
        'fechaini':ini.format('YYYY-MM-DD'),
        'fechafin':fin.format('YYYY-MM-DD')
    };
    var lista="";
    console.log(param);
    $.ajax({
        data:  param,
        url:   'listaperiodo',
        type:  'post',
        beforeSend: function () {
            //$("#resultado").html("Procesando, espere por favor...");
            $('#listapeliculas').html("procesando...");
        },
        success:  function (response){
            //var datos=JSON.parse(response);
            datos=JSON.parse(response);
            console.log(datos);
            lista+="<div class='row'>";
            datos.forEach(row => {
                    if (row.formato == 1) tipo ="3D"; else tipo="2D";

                    lista+="<div class='col-md-4'><h6>";
                    lista+="<input  type='checkbox' name='checklist[]' value='"+row.idPelicula+"' id='"+row.idPelicula+"' checked style={width: 30px; height: 30px;}>";
                    lista+="<label  for="+row.idPelicula+">";
                    lista+=row.nombre+" "+tipo;
                    lista+="</label></h6></div>";
            });
            lista+="</div>";
            
            $('#listapeliculas').html(lista);

            llenartabla();
        }
    })
    
});


function llenartabla(){
    var ini=$('#fecha').data('daterangepicker').startDate;
    var fin=$('#fecha').data('daterangepicker').endDate;
    var totalvendido=0;
    var totaldevuelto=0;
    var totalweb=0;
    var totalventa=0;
    var totaldev=0;
    var porcventa=0;
    var porcweb=0;
    var cadena="";
    var cadena2=""; 
    $('#listapeliculas input[type=checkbox]').each(function (){
        if(this.checked)
        cadena2 += $(this).val()+',';
    });
    cadena = cadena2.substr(0,(cadena2.length - 1));
    var param={
        'fechaini':ini.format('YYYY-MM-DD'),
        'fechafin':fin.format('YYYY-MM-DD'),
        'cadena':cadena
    };
    console.log(cadena);
    $.ajax({
        data:  param,
        url:   'totallistaperiodo',
        type:  'post',
        beforeSend: function () {
            //$("#resultado").html("Procesando, espere por favor...");
            //$('#listaeliculas').html("procesando...");
        },
        success:  function (response){
            //var datos=JSON.parse(response);
            datos=JSON.parse(response);
            console.log(datos);
            totalvendido=datos[0].venta;
            totaldevuelto=datos[0].devuelto;
            totalventa=datos[0].totalventa;
            totaldev=datos[0].totaldev;
            porcventa=parseInt(parseInt(totalvendido) / (parseInt(totalvendido) + parseInt(totalweb)) * 100);
            porcweb=parseInt(parseInt(totalweb) / (parseInt(totalvendido) + parseInt(totalweb)) * 100);
            if(totaldev==null) totaldev=0;
            $('#resventa span').html(totalvendido+"/"+porcventa+"%");
            $('#resweb span').html(totalweb+"/"+porcweb+"%");
            $('#resdev span').html(totaldevuelto+"/"+totaldev+" Bs");
            $('#restotal span').html(totalvendido+"/"+totalventa+" Bs");        
        }
    })
    $.ajax({
        data:  param,
        url:   'porpelicula',
        type:  'post',
        beforeSend: function () {
            //$("#resultado").html("Procesando, espere por favor...");
            //$('#listaeliculas').html("procesando...");
        },
        success:  function (response){
            console.log(response);
            datos2=JSON.parse(response.substr(1,(response.length)));
            console.log(datos2);
            var data2='';
            var label2='';
            datos2.forEach(row => {
                label2+=row.titulo+' - '+row.total+',';
                data2+=parseInt(parseFloat(row.total) / parseFloat(totalvendido) * 100)+',';
            })
            data = data2.substr(0,(data2.length - 1));
            label = label2.substr(0,(label2.length - 1));
            console.log(label);
            porpelicula(label.split(","),data.split(','));
        }
    })
    $.ajax({
        data:  param,
        url:   'portarifa',
        type:  'post',
        beforeSend: function () {
            //$("#resultado").html("Procesando, espere por favor...");
            //$('#listaeliculas').html("procesando...");
        },
        success:  function (response){
            console.log(response);
            datos3=JSON.parse(response);
            var data3='';
            var label3='';
            datos3.forEach(row =>{
                label3+=row.serie+'-'+row.descripcion+'('+row.precio+'Bs)-'+row.total+',';
                data3+=parseInt(parseFloat(row.total) / parseFloat(totalvendido) * 100)+','; 
            })
            data0 = data3.substr(0,(data3.length - 1));
            label0 = label3.substr(0,(label3.length - 1));
            portarifa(label0.split(","),data0.split(","));
        }

    })
    $.ajax({
        data:  param,
        url:   'porsemana',
        type:  'post',
        beforeSend: function () {
            //$("#resultado").html("Procesando, espere por favor...");
            //$('#listaeliculas').html("procesando...");
        },
        success:  function (response){
            var semana="";
            console.log(response);
            datos3=JSON.parse(response);
            datos3.forEach(row => {
                semana+="<tr>";
                semana+="<td>"+row.idPelicula+"</td>";
                semana+="<td>"+row.titulo+"</td>";
                semana+="<td>"+row.jueves+"</td>";
                semana+="<td>"+row.viernes+"</td>";
                semana+="<td>"+row.sabado+"</td>";
                semana+="<td>"+row.domingo+"</td>";
                semana+="<td>"+row.lunes+"</td>";
                semana+="<td>"+row.martes+"</td>";
                semana+="<td>"+row.miercoles+"</td>";
                semana+="<td>"+row.total+"</td>";
                semana+="</tr>";
            });
            $('#tabPelicula').html(semana);
        }
    })
    $.ajax({
        data:  param,
        url:   'diagrama',
        type:  'post',
        beforeSend: function () {
            //$("#resultado").html("Procesando, espere por favor...");
            //$('#listaeliculas').html("procesando...");
        },
        success:  function (response){
            var cadenaTarifa="";
            console.log(response);
            datos4=JSON.parse(response);
            var labels= [];
            var datGrafica=[];
            var dd=[];
            var i=1;
            var pr="";
            var pr2="";
            var num=datos4.length;
            console.log(datos4.length);
            for(i=0;i<num;i++){
                if(datos4[i].fec2 != pr){
                    pr=datos4[i].fec2;
                    labels.push(datos4[i].fec2);}
                    console.log(pr2);
                    console.log(dd);
                    
                    if(datos4[i].titulo != pr2)
                    {   
                        pr2=datos4[i].titulo;
                        dd=[];
                        dd.push(datos4[i].f1);}
                    else{
                        dd.push(datos4[i].f1);
                        console.log(pr2+' '+ dd);

                        if(datos4[i].titulo != datos4[i+1].titulo){
                            dataF = {
                                label: pr2+":",
                                data: dd,
                                lineTension: 0.3,
                                // Set More Options
                            }
                    console.log(dataF);
                    datGrafica.push(dataF);
                    }
                    console.log(dataF);
                        
                        
                          ;}
                 
                }
                console.log(pr2+' '+ dd);
                
                console.log(datGrafica);
            grafica(labels,datGrafica);
        }
    })


}

function porpelicula(label1,data1) {
    $('#oilChart').html('');
    var oilCanvas='';    
    var oilData="";
    var pieChar="";
    oilCanvas = document.getElementById("oilChart");

    var oilData = {
        labels: 
            label1
        ,
        datasets: [
            {
                data: data1,
            backgroundColor: [
                "#FF6384",
                "#63FF84",
                "#84FF63",
                "#8463FF",
                "red",
                "yellow",
                "#6384FF"
            ]

            }]
    };
    
    var pieChart = new Chart(oilCanvas, {
      type: 'pie',
      data: oilData
    });
};
Chart.defaults.global.defaultFontFamily = "Lato";
Chart.defaults.global.defaultFontSize = 14;   
function portarifa(label1,data1) {
    var oilCanvas='';    
    var oilData="";
    var pieChar="";
    
    $('#oilChart2').html('');    
        var oilCanvas = document.getElementById("oilChart2");
    
       
    
        var oilData = {
            labels: 
                label1
            ,
            datasets: [
                {
                    data: data1,
                backgroundColor: [
                    "#FF6384",
                    "#63FF84",
                    "#84FF63",
                    "#8463FF",
                    "red",
                    "yellow",
                    "#6384FF"
                ]
    
                }]
        };
        
        var pieChart = new Chart(oilCanvas, {
          type: 'pie',
          data: oilData
        });
    //$("#chartContainer").CanvasJSChart(options);    
};

function grafica(datolabel,datoserie){
    $('#chartContainer').html('');    
    
    var speedCanvas = document.getElementById("chartContainer");
    var speedData = {
        labels: datolabel,
        datasets: datoserie
      };
       
      var chartOptions = {
        legend: {
          display: true,
          position: 'top',
          labels: {
            boxWidth: 80,
            fontColor: 'black'
          }
        }
      };
      
      var lineChart = new Chart(speedCanvas, {
        type: 'line',
        data: speedData,
        options: chartOptions
      });
      
}
