
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
        url:   'listaperiodo2',
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
        url:   'totallistaperiodo2',
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
        url:   'porpelicula2',
        type:  'post',
        beforeSend: function () {
            //$("#resultado").html("Procesando, espere por favor...");
            //$('#listaeliculas').html("procesando...");
        },
        success:  function (response){
            console.log(response);
            datos2=JSON.parse(response);
            console.log(datos2);
            var data=[];
            datos2.forEach(row => {
                data.push({
                name: row.titulo+' - '+row.total,
                y: parseInt(parseFloat(row.total) / parseFloat(totalvendido) * 100)});
                
            })

            porpelicula(data);
        }
    })
    $.ajax({
        data:  param,
        url:   'portarifa2',
        type:  'post',
        beforeSend: function () {
            //$("#resultado").html("Procesando, espere por favor...");
            //$('#listaeliculas').html("procesando...");
        },
        success:  function (response){
            console.log(response);
            datos3=JSON.parse(response);
            var data3=[];
            datos3.forEach(row =>{
                data3.push({name :row.serie+'-'+row.descripcion+'('+row.precio+'Bs)-'+row.total,
                y: parseInt(parseFloat(row.total) / parseFloat(totalvendido) * 100)})
            })
            portarifa(data3);
        }

    })
    $.ajax({
        data:  param,
        url:   'porsemana2',
        type:  'post',
        beforeSend: function () {
            //$("#resultado").html("Procesando, espere por favor...");
            //$('#listaeliculas').html("procesando...");
        },
        success:  function (response){
            var semana="";
            var arraysemana=[];
            var arraySerie=[];
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
                semana+="<td>"+row.totalF+"</td>";
                semana+="<td>"+row.ingresoF+"</td>";
                semana+="<td>"+row.totalR+"</td>";
                semana+="<td>"+row.ingresoR+"</td>";
                semana+="</tr>";
                arraySerie.push({
                    name: row.titulo,
                    data: [parseInt(row.jueves),parseInt(row.viernes),parseInt(row.sabado),parseInt(row.domingo),parseInt(row.lunes),parseInt(row.martes),parseInt(row.miercoles)]
                    
                });  

            });
            $('#tabPelicula').html(semana);
            grafica2(arraySerie);
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
            var serie= [];
            var datGrafica=[];
            var ejex=[];
            var fecserie=fecini;
            var num=Object.keys(datos4[0]).length;
            console.log(Object.keys(datos4[0]).length);
                for(var i=0;i<num-3;i++){
                    var fini=moment(fecserie).format('MM-YYYY');
                    ejex.push(fini+'');
                    fecserie=moment(fecserie).add(1, 'month')
                 };
                 console.log(ejex);
            datos4.forEach(row => {
                datGrafica=[];
                for(var i=0;i<num-3;i++){ 
                    ca='m'+i;
                    $.each( row, function( key, val ) {
                        if (key == "m"+i){
                            if (val == null) 
                            datGrafica.push(0);
                            else 
                            datGrafica.push(parseInt(val));
        
                        }
                    });
                }
                serie.push({
                    name: row.titulo,
                    data: datGrafica
                    
                });           
                    
            });
        console.log(serie);         
            grafica(serie,ejex);
        }
    })


}

function porpelicula(data1) {
    $('#oilChart').html('');

    Highcharts.chart('oilChart', {
        chart: {
            plotBackgroundColor: null,
            plotBorderWidth: null,
            plotShadow: false,
            type: 'pie'
        },
        title: {
            text: 'Resumen por Pelicula'
        },
        tooltip: {
            pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
        },
        plotOptions: {
            pie: {
                allowPointSelect: true,
                cursor: 'pointer',
                dataLabels: {
                    enabled: true,
                    format: '<b>{point.name}</b>: {point.percentage:.1f} %',
                    style: {
                        color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                    }
                }
            }
        },
        series: [{
            name: 'Brands',
            colorByPoint: true,
            data: data1
        }]
    });
};
 
function portarifa(data1) {
    
    $('#oilChart2').html('');    
    Highcharts.chart('oilChart2', {
        chart: {
            plotBackgroundColor: null,
            plotBorderWidth: null,
            plotShadow: false,
            type: 'pie'
        },
        title: {
            text: 'Resumen por Tarifa'
        },
        tooltip: {
            pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
        },
        plotOptions: {
            pie: {
                allowPointSelect: true,
                cursor: 'pointer',
                dataLabels: {
                    enabled: true,
                    format: '<b>{point.name}</b>: {point.percentage:.1f} %',
                    style: {
                        color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                    }
                }
            }
        },
        series: [{
            name: 'Brands',
            colorByPoint: true,
            data: data1
        }]
    });   
};

function grafica(datoserie,ini){
    $('#chartContainer').html('');    
    
    Highcharts.chart('chartContainer', {

        title: {
            text: 'Per Capita Diario'
        },
    
        subtitle: {
            text: ''
        },
    
        yAxis: {
            title: {
                text: 'Tarifa'
            }
        },
        legend: {
            layout: 'vertical',
            align: 'right',
            verticalAlign: 'middle'
        },
     
        plotOptions: {
            line: {
                dataLabels: {
                    enabled: true
                },
                enableMouseTracking: false
            }
        },

        xAxis: {
            categories: ini
        },
        series: datoserie,
    
        responsive: {
            rules: [{
                condition: {
                    maxWidth: 500
                },
                chartOptions: {
                    legend: {
                        layout: 'horizontal',
                        align: 'center',
                        verticalAlign: 'bottom'
                    }
                }
            }]
        }
    
    });
}

function grafica2(datoserie){
    $('#chartContainer2').html('');    
    Highcharts.chart('chartContainer2', {
        chart: {
            type: 'line'
        },
        title: {
            text: 'Detalle Diario'
        },
    
        subtitle: {
            text: ''
        },
    
        yAxis: {
            title: {
                text: 'Cantidad'
            }
        },

        xAxis: {
            categories: ['Jueves', 'Viernes', 'Sabado', 'Domingo', 'Lunes', 'Martes', 'Miercoles']
        },

        legend: {
            layout: 'vertical',
            align: 'right',
            verticalAlign: 'middle'
        },
    
        plotOptions: {
            line: {
                dataLabels: {
                    enabled: true
                },
                enableMouseTracking: false
            }
        },
    
        series: datoserie,
    
        responsive: {
            rules: [{
                condition: {
                    maxWidth: 500
                },
                chartOptions: {
                    legend: {
                        layout: 'horizontal',
                        align: 'center',
                        verticalAlign: 'bottom'
                    }
                }
            }]
        }
    
    });
}
