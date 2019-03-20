
$('#exampleModal').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget) // Button that triggered the modal
    var idbutaca = button.data('idbutaca') // Extract info from data-* attributes
    var parametros = {
        "idbutaca" : idbutaca,
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
            $('#idButaca').prop('value',datos.idButaca);
            $('#nombre').prop('value',datos.nombreBut);
            $('#descripcion').prop('value',datos.descripcionBut);
            $('#activo').prop('value',datos.activoBut);
            
        }
    });

})