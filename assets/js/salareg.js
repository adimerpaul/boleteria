$('#nroFila').keyup(cambio);
$('#nroColumna').keyup(cambio);
$('#nroFila').change(cambio);
$('#nroColumna').change(cambio);
var capacidad=0;

function cambio() {
        var fila=($('#nroFila').prop('value'));
        var columna=($('#nroColumna').prop('value'));
        var t="";
        var h="<td></td>";
        var c="";
        var L=['A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z']
        for (var i=1;i<=columna;i++) {
            h=h+"<td class='numero'>"+i+"</td>";
        }
        for (var i=0;i<fila;i++) {
            c="";
            for (var j=1;j<=columna;j++) {
                c=c+"<td data-numero='"+j+"' data-estado='1' class='lugar libre'> </td>";
            }
            t=t+"<tr><td class='letra'>"+L[i]+"</td>"+c+"</tr>";
        }
        $('#body').html(t);
        $('#head').html(h);
capacidad=fila*columna;
    $('#capacidad').prop('value',capacidad);

    $('.lugar').click(function () {
        var letra = "";
        $(this).parents("tr").find(".letra").each(function() {
            letra = $(this).html();
        });
        var numero=$(this).data("numero");
        //console.log($(this).data("estado") );
        $(this).removeClass('libre');
        $(this).addClass('ocupado');
        $(this).add('disable',true);
        if ($(this).data("estado")=="1"){
            capacidad=capacidad-1;
            $('#capacidad').prop('value',capacidad);
            $(this).attr('data-estado',"0");
            //console.log(numero);
            aumentar(letra,numero);
        }
    });
}
function aumentar(letra,numero){
    $('#habilitados').append("<input name='"+letra+numero+"' value='INACTIVO' />");
}


