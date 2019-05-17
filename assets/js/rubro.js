$("#nombre").keyup(function () {
    actualizarEjemplo();
});

$("#coloricono").change(function () {
    actualizarEjemplo();

});
$("#icono").change(function () {
    actualizarEjemplo();

});

function actualizarEjemplo() {
    $('#divEjemplo').empty();
    var nombre = $("#nombre").val();
    var color = $("#coloricono").val();
    var icono = $("#icono").val();
    var burl = $("#burl").val();
    console.log(icono);

    if (icono !== "") {
        icono = "<i><img src='" + burl + 'assets/imagenes/' + icono + "' alt='logo' style='height:90px; width:90px;'/></i>";
    }

    console.log(icono);

    if (color !== "") {
        var ejemplo =
            "<div class='tile bg-" + color + "' style='margin-left: 30px;'>" +
            "<div class='tile-body'>" + icono + "</div>" +
            "<div class='tile-object'>" +
            "<h5 style='font-weight: bold;'>" + nombre +
            "</h5></div>" +
            "</div>";

        $('#divEjemplo').html(ejemplo);
    }
}

$('#exampleModal').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget) // Button that triggered the modal
    var idrubro = button.data('idrubro') // Extract info from data-* attributes
    var check = "on";
    var parametros = {
        "idrubro": idrubro
    };
    $.ajax({
        data: parametros,
        url: 'RubroCtrl/datos',
        type: 'post',
        beforeSend: function () {
            //$("#resultado").html("Procesando, espere por favor...");
        },
        success: function (response) {
            console.log(response);
            var datos = JSON.parse(response);
            $('#idrubro').prop('value', datos.idRubro);
            $('#nombre').prop('value', datos.nombreRubro);
            $('#desc').prop('value', datos.descripcion);
            $('#duracion').prop('value', datos.duracion);
            $('#rpadre').prop('value', datos.rubroPadre);

            $('#icono').prop('value', datos.imagen);

            $('#coloricono').prop('value', datos.colorFondo);

            if (datos.activo == "SI")
                $('#activo').bootstrapToggle('on');
            else
                $('#activo').bootstrapToggle('off');
            actualizarEjemplo();
        }
    });

})