$("#nombre").keyup(function () {
    actualizarEjemplo();
});

$("#coloricono").change(function () {
    actualizarEjemplo();

});
$("#icono").change(function () {
    actualizarEjemplo();
});

$("#nombre2").keyup(function () {
    actualizarEjemplo2();
});

$("#coloricono2").change(function () {
    actualizarEjemplo2();

});
$("#icono2").change(function () {
    actualizarEjemplo2();
});

function actualizarEjemplo() {
    $('#divEjemplo').empty();
    var nombre = $("#nombre").val();
    var color = $("#coloricono").val();
    var icono = $("#icono").val();
    var burl = $("#burl").val();
    console.log(icono);

    if (icono !== "") {
        icono = "<i><img src='" + burl + 'assets/imagenes/' + icono + "' alt='LOGO' style='height:90px; width:90px;'/></i>";
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

function actualizarEjemplo2() {
    $('#divEjemplo').empty();
    var nombre = $("#nombre2").val();
    var color = $("#coloricono2").val();
    var icono = $("#icono2").val();
    var burl = $("#burl").val();
    console.log(icono);

    if (icono !== "") {
        icono = "<i><img src='" + burl + 'assets/imagenes/' + icono + "' alt='LOGO' style='height:90px; width:90px;'/></i>";
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

        $('#divEjemplo2').html(ejemplo);
    }
}


$('#exampleModal').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget) // Button that triggered the modal
    var idrubro = button.data('idrubro') // Extract info from data-* attributes
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
            $('#nombre2').prop('value', datos.nombreRubro);
            $('#desc2').prop('value', datos.descripcion);
            $('#rpadre2').prop('value', datos.rubroPadre);

            $('#icono2').prop('value', datos.imagen);

            $('#coloricono2').prop('value', datos.colorFondo);

            $('#activo2').bootstrapToggle(datos.activo);
            actualizarEjemplo2();
        }
    });

})