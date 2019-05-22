$(function() {
    $('.rubro').click(function (e) {
        var idcombo=($(this).attr('id'));
        $.ajax({
            type:'POST',
            url:'VentaCandyCtrl/productos',
            data:'id='+idcombo,
            success:function (e) {
                //console.log(e);
                var datos=JSON.parse(e);
                var t='';
                for (var i=0;i<datos.length;i++){
                    t=t+" <div class='tile bg-"+datos[i].colorFondo+" producto' id='"+datos[i].idProducto+"' >" +
                            "<div class='tile-body'>" +
                            "<i><img src='assets/imagenes/"+datos[i].imagen+"' alt='logo'>" +
                        "</div></i>" +
                            "<div class='tile-object'>" +
                            "<h5 style='font-weight: bold; background: #000; opacity: 0.80;'>"+datos[i].nombreProd+"<br>Bs"+datos[i].precioVenta+"</h5>" +
                            "</div>" +
                            "</div>";
                }

                $('#productos').html(t);
                $('.producto').click(function (e) {
                    var idproducto=($(this).attr('id'));
                    $('#seleccionados').html('');
                    $('#cantidad').val(1);
                    $('#seleccion-producto').modal('show');
                    producto(idproducto);
                });
            }
        });
    });
    function producto(idproducto){
        $.ajax({
            type:'POST',
            url:'VentaCandyCtrl/productospreferencia',
            data:'id='+idproducto,
            success:function (e) {
                //console.log(e);
                var datos=JSON.parse(e);
                var t='';
                for (var i=0;i<datos.length;i++){
                    t=t+"<button  class='addpref m-1 btn-success' id='"+datos[i].idPreferencia+"' nombre='"+datos[i].nombrePref+"'>"+datos[i].nombrePref+"</button>";
                }
                $('#preferencias').html(t);
                $('.addpref').click(function (e) {
                    var idprefrencia=($(this).attr('id'));
                    var nombre=($(this).attr('nombre'));
                    addpref(idprefrencia,nombre);
                    e.preventDefault();
                });
            }
        });
        $.ajax({
            type:'POST',
            url:'VentaCandyCtrl/datosproductos',
            data:'id='+idproducto,
            success:function (e) {
                var datos=JSON.parse(e)[0];
                $('#nombre').val(datos.nombreProd);
                $('#precio').val(datos.precioVenta);
                $('#total').val(datos.precioVenta);
            }
        });
    }
    $('#mini').click(function (e) {
        if (parseInt($('#cantidad').val())>1){
            $('#cantidad').val(parseInt($('#cantidad').val())- parseInt(1));
            $('#total').val(parseInt($('#cantidad').val())*parseInt($('#precio').val()));
        }
        e.preventDefault();
    });
    $('#maxi').click(function (e) {
        $('#cantidad').val(parseInt($('#cantidad').val())+parseInt(1));
        $('#total').val(parseInt($('#cantidad').val())*parseInt($('#precio').val()));
        e.preventDefault();
    });
    function addpref(idprefrencia,nombre) {
        var cantidad=$('#cantidad').val();
        var selec = document.getElementsByClassName("removepref").length;

        if(selec<cantidad) {
            $('#seleccionados').append("<button  class='removepref m-1 btn-success' name='p" + idprefrencia + "' id='p" + idprefrencia + "' >" + nombre + "</button>");
        }
        $('.removepref').click(function (e) {
            e.preventDefault();
            $(this).remove();
        });
    }
    $('#formulario').submit(function (e) {
        var cantidad=$('#cantidad').val();
        var selec = document.getElementsByClassName("removepref").length;
        if (selec<cantidad){
            if (selec==1){
                console.log('guardar');
            }else{
                alert('Preferencias incompletas!');
            }
        }else {
            console.log('guardar');
        }
        return false;
    });
    $('#combos').click(function (e) {
        $.ajax({
            type:'POST',
            url:'VentaCandyCtrl/combos',
            success:function (e) {
                //console.log(e);
                var datos=JSON.parse(e);
                var t='';
                for (var i=0;i<datos.length;i++){
                    t=t+" <div class='tile bg-"+datos[i].fondoColor+" combo' id='"+datos[i].idCombo+"' >" +
                        "<div class='tile-body'>" +
                        "<i><img src='assets/imagenes/"+datos[i].imagen+"' alt='logo'>" +
                        "</div></i>" +
                        "<div class='tile-object'>" +
                        "<h5 style='font-weight: bold; background: #000; opacity: 0.80;'>"+datos[i].nombreCombo+"<br>Bs"+datos[i].precioVenta+"</h5>" +
                        "</div>" +
                        "</div>";
                }

                $('#productos').html(t);
                $('.combo').click(function (e) {
                    var idcombo=($(this).attr('id'));
                    $('#seleccionados').html('');
                    $('#cantidad').val(1);
                    $('#seleccion-producto').modal('show');
                    combo(idcombo);
                });
            }
        });
    });
    function combo(idcombo){
        // $.ajax({
        //     type:'POST',
        //     url:'VentaCandyCtrl/productospreferencia',
        //     data:'id='+idproducto,
        //     success:function (e) {
        //         //console.log(e);
        //         var datos=JSON.parse(e);
        //         var t='';
        //         for (var i=0;i<datos.length;i++){
        //             t=t+"<button  class='addpref m-1 btn-success' id='"+datos[i].idPreferencia+"' nombre='"+datos[i].nombrePref+"'>"+datos[i].nombrePref+"</button>";
        //         }
        //         $('#preferencias').html(t);
        //         $('.addpref').click(function (e) {
        //             var idprefrencia=($(this).attr('id'));
        //             var nombre=($(this).attr('nombre'));
        //             addpref(idprefrencia,nombre);
        //             e.preventDefault();
        //         });
        //     }
        // });
        $.ajax({
            type:'POST',
            url:'VentaCandyCtrl/datoscombo',
            data:'id='+idcombo,
            success:function (e) {
                var datos=JSON.parse(e)[0];
                $('#nombre').val(datos.nombreCombo);
                $('#precio').val(datos.precioVenta);
                $('#total').val(datos.precioVenta);
            }
        });
    }
});
