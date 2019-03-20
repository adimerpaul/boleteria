
    $('#exampleModal').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Button that triggered the modal
  var idempresa = button.data('idempresa') // Extract info from data-* attributes
  var parametros = {
                    "idempresa" : idempresa,
                   "mostrar" : 'codigo'
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
                        $('#idemp').prop('value',datos.idEmpresa);
                        $('#codigo').prop('value',datos.codigo);
                        $('#razonsocial').prop('value',datos.razonSocial);
                        $('#nomfant').prop('value',datos.nombreFant);
                        $('#nomsuc').prop('value',datos.nombreSuc);
                        $('#telefono').prop('value',datos.telefono);
                        $('#direccion').prop('value',datos.direccion);
                        $('#localidad').prop('value',datos.localidad);
                        $('#cinit').prop('value',datos.ci_nit);
                        $('#ingbruto').prop('value',datos.ingresoBruto);
                        $('#urldom').prop('value',datos.urlDominio);
                        $('#fideliza').prop('value',datos.fidelizacion);
                    }
            });
    
})