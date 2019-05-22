
var fecini;
var fecfin;
$(function() {
    var start = moment();
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
        url:   'listaVenta',
        type:  'post',
        beforeSend: function () {
            //$("#resultado").html("Procesando, espere por favor...");
        },
        success:  function (response){
            //var datos=JSON.parse(response);
            datos=JSON.parse(response);
            console.log(datos);
            var total=0;
            var totalVenta=0;
            var lista="";
            var BASE_URL = "<?php echo base_url();?>";
            $('#fecInicial').html(ini.format('YYYY-MM-DD'));
            $('#fecFinal').html(fin.format('YYYY-MM-DD'));
            datos.forEach(row => {
                           
                    total=total+parseFloat(row.total);
                    totalVenta=totalVenta+parseFloat(row.totalventa);
                    lista+= "<tr> <td>"+row.fecha+"</td>"; 
                    lista+= "<td>"+row.user+"</td>";  
                    lista+= "<td>"+row.total+"</td>";
                    lista+= "<td>"+row.totalventa+" Bs</td>";
                    lista+= "<td><a class='btn btn-success btn-sm rventa' data-iduser="+row.idUsuario+" data-fecha="+row.fecha+" name='detalleDia'>Ver detalle Dia</a></td></tr>";
                })
                lista+="<tr><th></th><th>Total</th><th>"+total+"</th><th>"+totalVenta+" Bs</th><th></th></tr>";
                $('#listav').html("");
                $('#listav').html(lista);
                calculaCantidad();
            }});
        }
    );


function calculaCantidad(){
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
        url:   'cantVenta',
        type:  'post',
        beforeSend: function () {
            //$("#resultado").html("Procesando, espere por favor...");
        },
        success:  function (response){
            datos=JSON.parse(response)[0];
            console.log(datos);
            $('#totalProd').html(datos.tprod+' ('+datos.ventaprod+' Bs)');
            $('#totalComb').html(datos.tcomb+' ('+datos.ventacomb +' Bs)');
        }
    })
}


$(' a [name=detalleDia]').click(function(){
    var idus = this.data('iduser');
    var fec = this.data('fecha');
    console.log(idus+' '+fec);
})