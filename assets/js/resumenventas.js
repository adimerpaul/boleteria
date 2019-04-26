
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
            $('#listapeliculas input[type=checkbox]').change();

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
                label2+=row.titulo+': '+row.total+',';
                data2+=(parseFloat(row.total)* parseFloat(totalvendido) / 100)+',';
            })
            data = data2.substr(0,(data2.length - 1));
            label = label2.substr(0,(label2.length - 1));
            console.log(label);
            porpelicula(label.split(","),data.split(','));
        }
    })
    $.ajax({


    })

}

function porpelicula(label1,data1) {
    var oilCanvas = document.getElementById("oilChart");

    Chart.defaults.global.defaultFontFamily = "Lato";
    Chart.defaults.global.defaultFontSize = 15;

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
                "#6384FF"
            ]

            }]
    };
    
    var pieChart = new Chart(oilCanvas, {
      type: 'pie',
      data: oilData
    });

    
    //$("#chartContainer").CanvasJSChart(options);    
}
