
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

$('#consultar').click(function(){
    var idu=$('#venderor').prop('value');
    var param = {
        'iduser': idu,
        'fechaini': fecini,
        'fechafin': fecfin
    }; 
    console.log(fecini);
});