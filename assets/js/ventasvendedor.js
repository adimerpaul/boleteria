
var start = moment().subtract(29, 'days');
var end = moment();
var fecini;
var fecfin;
    $('#fecha').daterangepicker({
    startDate: start,
    endDate: end,
    ranges: {
        'Hoy': [moment(), moment()],
        'Ayer': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
        'Ultimos 7 Dias': [moment().subtract(6, 'days'), moment()],
        'Ultimos 30 Dias': [moment().subtract(29, 'days'), moment()],
        'Este Mes': [moment().startOf('month'), moment().endOf('month')],
        'Ultimo Mes ': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
    }
}, function(start, end, label) {
    console.log('New date range selected: ' + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD') + ' (predefined range: ' + label + ')');
    $('#fecha span').html(start.format('YYYY-MM-DD') + ' - ' + end.format('YYYY-MM-DD'));
    fecini=start.format('YYYY-MM-DD');
    fecfin=end.format('YYYY-MM-DD');
}).click();

$('#consultar').click(function(event){
    var idu=$('#venderor').prop('value');
    var nombre=$('#venderor').prop('value');
    var total=0;
    var nventa=0;
    var ndev=0;
    var tablaCadena="";
    var param = {
        'iduser': idu,
        'fechaini': fecini,
        'fechafin': fecfin
    }; console.log(param);
         $.ajax({
                        data:  param,
                        url:   'Ventasvendedor/datosventa',
                        type:  'post',
                        beforeSend: function () {
                                //$("#resultado").html("Procesando, espere por favor...");
                            $('#tresumen').html("procesando");
        
                        },
                        success:  function (response) {
                            console.log(response);
                            var datos=JSON.parse(response);

                            $('#fechaI').html(fecini);
                            $('#fechaF').html(fecfin);
                            $('#userN').html(($("#venderor option:selected").text()));
                            datos.forEach(row => {
                                ndev += parseInt(row.devuelto);
                                nventa += parseInt(row.vendido);
                                if (row.total != null)
                                total += parseFloat(row.total);
                                tablaCadena+="<tr>";
                                tablaCadena+="<td>"+row.idFuncion+"</td>";
                                tablaCadena+="<td>"+row.fechaFuncion+" "+row.horaFuncion+"</td>";
                                tablaCadena+="<td>"+row.titulo+"</td>";
                                tablaCadena+="<td>"+row.vendido+"</td>";
                                tablaCadena+="<td>"+row.devuelto+"</td>";
                                tablaCadena+="<td>"+row.total+" Bs</td>";
                                tablaCadena+="</tr>";
                            });
                            tablaCadena+="<tr>";
                            tablaCadena+="<td></td>";
                            tablaCadena+="<td></td>";
                            tablaCadena+="<td><b>TOTAL:</b></td>";
                            tablaCadena+="<td><b>"+nventa+"</b></td>";
                            tablaCadena+="<td><b>"+ndev+"</b></td>";
                            tablaCadena+="<td><b>"+total+" Bs</b></td>";
                            tablaCadena+="</tr>";
                            $('#tresumen').html(tablaCadena);
                            $('#ventatotal').html(nventa+"("+total+" Bs)");
                            $('#devolucion').html(ndev);
        }
    });
    console.log(fecini);
});