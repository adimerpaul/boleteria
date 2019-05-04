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
        showWeekNumbers: true,
        singleDatePicker: true,
        ranges: {
           'Hoy': [moment(), moment()],
           'Ayer': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
           'Ultimos 7 Dias': [moment().subtract(6, 'days'), moment()]
        }
    }, cb);

    cb(start, end);

});