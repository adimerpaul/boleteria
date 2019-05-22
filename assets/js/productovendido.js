

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
    var totalproducto=0;
    var totalcombo=0;
    var total=0;
    var totalventa=0;
    var cadena="";
    var cadena2=""; 

    $.ajax({
        data:  param,
        url:   'ReporteCandy/totalperiodo',
        type:  'post',
        beforeSend: function () {
            //$("#resultado").html("Procesando, espere por favor...");
            //$('#listaeliculas').html("procesando...");
        },
        success:  function (response){
            //var datos=JSON.parse(response);
            datos=JSON.parse(response);
            console.log(datos);
            totalproducto=datos[0].totalprod;
            totalcombo=datos[0].totalcomb;
            total=totalproducto + totalcombo;
            totalventa=datos[0].totalventa;
            if (totalproducto == null) totalproducto=0;
            if (totalcombo == null) totalcombo=0;
            if (totalventa == null) totalventa=0.00;
            $('#resprod span').html(totalproducto);
            $('#rescombo span').html(totalcombo);
            $('#restotal span').html(total);
            $('#resventa span').html(totalventa+" Bs");   
            listProductos();     
        }
    })
    
});
$('#lProducto').click(function(){
    listProductos();
});

$('#lCombo').click(function(){
    listCombo();
});

function listProductos(){
    var ini=$('#fecha').data('daterangepicker').startDate;
    var fin=$('#fecha').data('daterangepicker').endDate;
    var param={
        'fechaini':ini.format('YYYY-MM-DD'),
        'fechafin':fin.format('YYYY-MM-DD')
    };
    var lista="";
    var cabeza="";
    $.ajax({
        data:  param,
        url:   'ReporteCandy/masProducto',
        type:  'post',
        beforeSend: function () {
            //$("#resultado").html("Procesando, espere por favor...");
            //$('#listaeliculas').html("procesando...");
        },
        success:  function (response){
            //var datos=JSON.parse(response);
            datos=JSON.parse(response);
            $('#tabContent').html("");
            $('#tcabeza').html("");
            cabeza="<tr><th>Codigo</th><th>Producto</th><th>Total</th><th>Total Venta (Bs)</th><</tr>";
            $('#tcabeza').html(cabeza);
            console.log(datos);
            datos.forEach(row => {
            lista+="<tr>";
            lista+="<td>"+row.idProducto+"</td>";                
            lista+="<td>"+row.nombreProd+"</td>";                
            lista+="<td>"+row.total+"</td>";                
            lista+="<td>"+row.totalventa+"</td>";                
            lista+="</tr>";    
            });
            $('#tabContent').html(lista);
        }
    }
    )  
};

function listCombo(){
    var ini=$('#fecha').data('daterangepicker').startDate;
    var fin=$('#fecha').data('daterangepicker').endDate;
    var param={
        'fechaini':ini.format('YYYY-MM-DD'),
        'fechafin':fin.format('YYYY-MM-DD')
    };
    var lista="";
    var cabeza="";
    $.ajax({
        data:  param,
        url:   'ReporteCandy/masCombo',
        type:  'post',
        beforeSend: function () {
            //$("#resultado").html("Procesando, espere por favor...");
            //$('#listaeliculas').html("procesando...");
        },
        success:  function (response){
            //var datos=JSON.parse(response);
            datos=JSON.parse(response);
            $('#tcabeza').html("");
            $('#tabContent').html("");
            cabeza="<tr><th>Codigo</th><th>Combo</th><th>Total</th><th>Total Venta (Bs)</th><</tr>";
            $('#tcabeza').html(cabeza);
            console.log(datos);
            datos.forEach(row => {
            lista+="<tr>";
            lista+="<td>"+row.idCombo+"</td>";                
            lista+="<td>"+row.nombreCombo+"</td>";                
            lista+="<td>"+row.total+"</td>";                
            lista+="<td>"+row.totalventa+"</td>";                
            lista+="</tr>";    
            });
            $('#tabContent').html(lista);
        }
    }
    )  
};