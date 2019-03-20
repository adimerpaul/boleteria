$('#nroFila').keyup(cambio);
$('#nroColumna').keyup(cambio);
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
                c=c+"<td data-id='"+j+"' class='lugar libre'></td>";
            }
            t=t+"<tr><td class='letra'>"+L[i]+"</td>"+c+"</tr>";
        }

        $('#body').html(t);
        $('#head').html(h);
    $('.lugar').click(function () {
        var valores = "";
        $(this).parents("tr").find(".letra").each(function() {
            valores = $(this).html();
        });

        console.log($(this).data("id") );
        $(this).removeClass('libre');
        $(this).addClass('ocupado');
        //alert($(this).data("id") );
    });
}
