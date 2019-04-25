
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
    var totalvendido=0;
    var totaldevuelto=0;
    var totalweb=0;
    var totalventa=0;
    var totaldev=0;
    var porcventa=0;
    var porcweb=0;
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
            
            $('#listapeliculas input[type=checkbox]').change();

            //llenartabla();

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
    var cadena2="(";
    var cadena="";

    $('#listapeliculas input[type=checkbox]').each(function (){
        if(this.checked)
        cadena2 += $(this).val()+',';
    });
    cadena = cadena2.substr(0,(cadena2.length - 1));
    cadena += ")";
    var param={
        'fechaini':ini.format('YYYY-MM-DD'),
        'fechafin':fin.format('YYYY-MM-DD'),
        'cadena':cadena
    };
    console.log(cadena);
    /*$.ajax({
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
            totalvendido=datos[0].vendido;
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
            $('#listapeliculas').html(lista);
            
        }
    })*/



}