var capacidad=0;

$('#exampleModal').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget) // Button that triggered the modal
    var idsala = button.data('idsala') // Extract info from data-* attributes
    var parametros = {
        "tabla" : 'sala',
        "where" : 'idsala',
        "dato" : idsala,
    };
    $.ajax({
        data:  parametros,
        url:   'datos',
        type:  'post',
        beforeSend: function () {
            //$("#resultado").html("Procesando, espere por favor...");
        },
        success:  function (response) {
            //console.log(response);
            var datos=JSON.parse(response);
            $('#idSala').prop('value',datos.idSala);
            $('#nombreSala').prop('value',datos.nombreSala);
            $('#nroSala').prop('value',datos.nroSala);
           // $('#nroColumna').prop('value',datos.nroColumna);
            //$('#nroFila').prop('value',datos.nroFila);
            $('#capacidad').prop('value',datos.capacidad);
           // $('#invert').prop('value',datos.invert);
            var fila=(datos.nroFila);
            var columna=(datos.nroColumna);
            cambio(fila,columna);
            console.log('asd');
        }
    });

})

function cambio(fila,columna) {
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
