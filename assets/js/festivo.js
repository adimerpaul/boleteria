
$('#exampleModal').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget) // Button that triggered the modal
    var idfestivo = button.data('idfestivo') // Extract info from data-* attributes
    var parametros = {
        "idFestivo" : idfestivo,
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
            $('#idfestivo').prop('value',datos.idFestivo);
            $('#fecha').prop('value',datos.fecha);
            $('#descripcion').prop('value',datos.descripcion);
            if (datos.activo==1)
            $('#activo').prop('checked',true);
            else
            $('#activo').prop('checked',false);
            
        }
    });

})