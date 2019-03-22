var capacidad=0;
var asientos;
$('#exampleModal').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget) // Button that triggered the modal
    var idsala = button.data('idsala') // Extract info from data-* attributes

    $('#habilitados').html("");
    var parametros = {
        "tabla" : 'asiento',
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
        success:  function (response){
            asientos=JSON.parse(response);
            //console.log(sientos[1].activoa);

            parametros= {
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
                    var datos=JSON.parse(response)[0];
                    //console.log(datos);

                    $('#idSala').prop('value',datos.idSala);
                    $('#nombreSala').prop('value',datos.nombreSala);
                    $('#nroSala').prop('value',datos.nroSala);
                     $('#nroColumna').prop('value',datos.nroColumna);
                    $('#nroFila').prop('value',datos.nroFila);
                    $('#capacidad').prop('value',datos.capacidad);
                    capacidad=datos.capacidad;
                    // $('#invert').prop('value',datos.invert);
                    var fila=(datos.nroFila);
                    var columna=(datos.nroColumna);
                    cambio(fila,columna);
                }
            });
        }
    });

})

function cambio(fila,columna) {
    var t="";
    var h="<td></td>";
    var c="";
    var cont=0;
    var L=['A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z']
    for (var i=1;i<=columna;i++) {
        h=h+"<td class='numero'>"+i+"</td>";
    }
    for (var i=0;i<fila;i++) {
        c="";
        for (var j=1;j<=columna;j++) {
            if (asientos[cont].activo=="ACTIVO"){
                c=c+"<td data-numero='"+j+"' data-estado='1' class='lugar libre'></td>";
            }else{
                c=c+"<td data-numero='"+j+"' data-estado='1' class='lugar ocupado'></td>";
            }
            cont=cont+1;
        }
        t=t+"<tr><td class='letra'>"+L[i]+"</td>"+c+"</tr>";
    }
    $('#body').html(t);
    $('#head').html(h);

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



$('#manual').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget) // Button that triggered the modal
    var idsala = button.data('idsala') // Extract info from data-* attributes
    $('#letra').html("");
    $('#numero').html("");
    var L=['A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z']
    $('#idSala2').prop('value',idsala);
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
        success:  function (response){
            var manu=JSON.parse(response)[0];
            var fi=manu.nroFila;
            var co=manu.nroColumna;
            $('#idSala').prop('value',manu.idSala);
            for (var i=0;i<fi;i++){
                $('#letra').append("<option value='"+L[i]+"'>"+L[i]+"</option>");
            }
            for (var i=1;i<=co;i++){
                $('#numero').append("<option value='"+i+"'>"+i+"</option>");
            }
        }
    });
});