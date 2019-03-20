
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
            console.log(response);
            var datos=JSON.parse(response);
            $('#idSala').prop('value',datos.idSala);
            $('#nombreSala').prop('value',datos.nombreSala);
            $('#nroSala').prop('value',datos.nroSala);
            $('#nroColumna').prop('value',datos.nroColumna);
            $('#nroFila').prop('value',datos.nroFila);
            $('#capacidad').prop('value',datos.capacidad);
            $('#invert').prop('value',datos.invert);
        }
    });

})