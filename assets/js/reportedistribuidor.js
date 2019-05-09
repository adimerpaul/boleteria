var fechainicio;
var fechafin;
$(document).ready(calsemana());  

$('#fecha').change(function(){
    calsemana();
})

function calsemana() {
    var dias=0;
    var fec=$('#fecha').val();
    var m = moment($('#fecha').val()).day();
    console.log(m);
    
    switch(m) {
        case 0:
          dias=3;
          break;
        case 1:
        dias=4;
        break;
          case 2:
          dias=5;
          // code block
          break;
          case 3:
          dias=6;
          
          break;
          case 4:
          dias=0;
          // code block
          break;
          case 5:
          dias=1;
          // code block
          break;
          case 6:
          dias=2;
          // code block
          break;
        default:
        dias=0;
        // code block
      }
      var feci=moment(fec).subtract(parseInt(dias), 'days');
      var fecf=moment(feci).add(6,'days');
      fechainicio= moment(feci).format('YYYY-MM-DD');
      fechafin= moment(fecf).format('YYYY-MM-DD');
      console.log(fechainicio+' '+fechafin);

      $('#fecha1').val(fechainicio);
      $('#fecha2').val(fechafin);}