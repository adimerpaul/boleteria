$(function() {

    var idproducto;
    var cantidadcombo;
    var cantidadcomboreal;
    var escombo=false;
    var idcombo;
    VerificaDosificacion();
    function VerificaDosificacion(){
        $.ajax({
            data: 'fdosif='+moment().format('Y-MM-DD'),
            url: 'VentaCandyCtrl/verifDosifcacion',
            type: 'post',
            success:  function (response){
                //console.log(response);
                if (response == false){
                    $.ajax({
                        url:'VentaCandyCtrl/UpDosificacion',
                        success:  function (response){
                            if (response == false)
                                alert('No se Cuenta con Dosificacion');
                        }
                    })

                }

            }
        })
    }
    $('.rubro').click(function (e) {
        VerificaDosificacion();
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
                    idproducto=($(this).attr('id'));
                    $('#seleccionados').html('');
                    $('#cantidad').val(1);
                    $('#seleccion-producto').modal('show');
                    producto(idproducto);
                });
            }
        });
    });
    function producto(idproducto){
        escombo=false;
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
            if (escombo){
                cantidadcombo=parseInt(cantidadcombo)-parseInt(cantidadcomboreal);
            }
            $('#cantidadcombo').html(cantidadcombo);
            $('#cantidad').val(parseInt($('#cantidad').val())- parseInt(1));
            $('#total').val(parseInt($('#cantidad').val())*parseInt($('#precio').val()));
        }
        e.preventDefault();
    });
    $('#maxi').click(function (e) {

        if (escombo){
            cantidadcombo=parseInt(cantidadcombo)+parseInt(cantidadcomboreal);
        }
        $('#cantidadcombo').html(cantidadcombo);
        $('#cantidad').val(parseInt($('#cantidad').val())+parseInt(1));
        $('#total').val(parseInt($('#cantidad').val())*parseInt($('#precio').val()));
        e.preventDefault();
    });
    function addpref(idprefrencia,nombre) {
        if (escombo){
            var cantidad=cantidadcombo;
        } else {
            var cantidad=$('#cantidad').val();
        }
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
        if (escombo){
            var cantidad=cantidadcombo;
        } else {
            var cantidad=$('#cantidad').val();
        }
        // var selec = document.getElementsByClassName("removepref").length;
        // if (selec<cantidad){
        //     if (selec==1){
        if (escombo){
            guardartemporalcomobo();
        } else {
            guardartemporal();
         }
        //     }else{
        //         alert('Preferencias incompletas!');
        //     }
        // }else {
        //     if (escombo){
        //         guardartemporalcomobo();
        //     } else {
        //         guardartemporal();
        //     }
        // }
        return false;
    });
    $('#combos').click(function (e) {
        escombo=true;
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
                    idcombo=($(this).attr('id'));
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
        //     url:'VentaCandyCtrl/combopreferencia',
        //     data:'id='+idcombo,
        //     success:function (e) {
        //         //console.log(e);
        //         var datos=JSON.parse(e);
        //         cantidadcombo=datos[0].cantidad;
        //         cantidadcomboreal=datos[0].cantidad;
        //         var t='Cant: <span id="cantidadcombo">'+cantidadcombo+'</span> =';
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
    function guardartemporal() {
        //console.log(idproducto);
        var datos={
            'idProducto':idproducto,
            'pUnitario':$('#precio').val(),
            'tCantidad':$('#cantidad').val(),
            'nombreP':$('#nombre').val()
        }
        $.ajax({
            type:'POST',
            url:'VentaCandyCtrl/guardartemporal',
            data:datos,
            success:function (e) {
                //var datos=JSON.parse(e);
                if (e==1){
                    $('#seleccion-producto').modal('hide');
                    datostemporal();
                }

            }
        });
    }
    function guardartemporalcomobo() {
        var datos={
            'idCombo':idcombo,
            'pUnitario':$('#precio').val(),
            'tCantidad':$('#cantidad').val(),
            'nombreP':$('#nombre').val()
        }
        $.ajax({
            type:'POST',
            url:'VentaCandyCtrl/guardartemporalcombo',
            data:datos,
            success:function (e) {
                //var datos=JSON.parse(e);
                if (e==1){
                    $('#seleccion-producto').modal('hide');
                    datostemporal();
                }

            }
        });
    }
    function datostemporal() {
        $.ajax({
            type:'POST',
            url:'VentaCandyCtrl/datostemporal',
            success:function (e) {
                var datos=JSON.parse(e);
                var totaltemporal=0;
                //console.log(e);
                $('#temporal').html('');
                for (var i=0;i<datos.length;i++){
                    totaltemporal=totaltemporal+parseInt(datos[i].tCantidad)*parseInt(datos[i].pUnitario);
                    $('#temporal').append("<tr>" +
                        "                            <td>"+datos[i].tCantidad+"</td>" +
                        "                            <td>"+datos[i].nombreP+"</td>" +
                        "                            <td>"+datos[i].pUnitario+"</td>" +
                        "                            <td>"+ parseInt(datos[i].tCantidad)*parseInt(datos[i].pUnitario)+"</td>" +
                        "                            <td> <small class='elitemporal p-1 btn-danger' id='"+datos[i].idDtemporal+"'><i class='fa fa-times'></i></small></td>" +
                        "                        </tr>");
                }
                $('#totaltemporal').html(totaltemporal);
                $('#montoapagar').val(totaltemporal);
                $('.elitemporal').click(function (e) {
                    var idtemporal=($(this).attr('id'));
                    eliminartemporal(idtemporal);
                });
            }
        });
    }
    datostemporal();
    function eliminartemporal(idtemporal) {
        $.ajax({
            type:'POST',
            url:'VentaCandyCtrl/eliminartemporal',
            data:'id='+idtemporal,
            success:function (e) {
                if (e==1){
                    datostemporal();
                }

            }
        });
    }
    $('#cancelar').click(function (e) {

        $.ajax({
            type:'POST',
            url:'VentaCandyCtrl/eliminartemporalall',
            success:function (e) {
                datostemporal();
            }
        });
        e.preventDefault();
    });
    $('#cinit').keyup(function (e) {
        $.ajax({
            type:'POST',
            url:'VentaCandyCtrl/buscarcliente',
            data:'ci='+$('#cinit').val(),
            success:function (e) {
                var datos=JSON.parse(e);
                if (datos.length==1){
                    if ($('#cinit').val()=='0'){
                        $('#tipo').bootstrapToggle('off');
                    }else {

                        $('#tipo').bootstrapToggle('on');
                    }
                    $('#nombres').val(datos[0].nombreCl);
                    $('#apellidos').val(datos[0].apellidoCl);
                }else {
                    $('#tipo').bootstrapToggle('on');
                    $('#nombres').val('');
                    $('#apellidos').val('');
                }
            }
        });
        e.preventDefault();
    })
    $('#montocliente').keyup(function (e) {
        $('#cambio').val(parseInt($('#montocliente').val())-parseInt($('#montoapagar').val()));
        e.preventDefault();
    });

    $('#cliente').submit(function (e) {
        if($('#cambio').val()<0 && $('#temporal').html()==''){
            alert('Controlar el monto');
            e.preventDefault();
        }
        else{
            $('#cliente').modal('hide');
            var datos={
                ci:$('#cinit').val(),
                apellidos:$('#apellidos').val(),
                nombres:$('#nombres').val()
            }
    
            $.ajax({
                type:'POST',
                url:'VentaCandyCtrl/sctualizarCliente',
                data:datos,
                success:function (e) {
                    if($('#tipo').prop('checked')){
                        var tipoventa="FACTURA";
                    }else{
                        var tipoventa="RECIBO";
                    }
                    var idcliente=e;
                    var datos={
                        idcliente:idcliente,
                        cinit:$('#cinit').val(),
                        total:$('#totaltemporal').html(),
                        cancelado:parseFloat($('#montocliente').val()),
                        tipoVenta:tipoventa
                    }
                    //console.log(datos);
                    $('#cinit').val('');
                    $('#apellidos').val('');
                    $('#nombres').val('');
                    $('#montocliente').val('');
                    $.ajax({
                        type:'POST',
                        url:'VentaCandyCtrl/insertarVenta',
                        data:datos,
                        success:function (response) {
                            console.log(response);
                            if (response!=0){
                                console.log(response);
                            
                            if (tipoventa=="FACTURA"){
                            $.ajax({
                                url: 'FacturaCandy/imprimirfactura/'+response,
                                success: async function (e) {
                                    myWindow = window.open("", "myWindow", "width=200,height=100");
                                    var te= await e;
                                    myWindow.document.write(te);
                                    myWindow.document.close();
                                    myWindow.focus();
                                    setTimeout(function(){
                                        myWindow.print();
                                        myWindow.close();
                                        impDetalle(response); 
                                        //impAniv(response);                                                                               
                                },500); 
                               
                                },
                                
                            });
                        }
                            else {
                                    setTimeout(function(){
                                        impDetalle(response);
                                        //impAniv(response);
                                },500); 
                            }
                        }
                        else
                          alert("problema de registro");
                        }
                    });
                }
            });
            e.preventDefault();
        }  
    });
});

function impDetalle(id){
    $.ajax({
        url: 'FacturaCandy/imprimirinterno/'+id,
        success: function (detalle) {
            myWindow = window.open("", "myWindow", "width=200,height=100");
            myWindow.document.write(detalle);
            myWindow.document.close();
            myWindow.focus();
            myWindow.print();
            myWindow.close();
            window.location.href='';
        }})
};

function impAniv(id){
    $.ajax({
        url: 'FacturaCandy/aniversario/'+id,
        success: function (detalle2) {
            myWindow = window.open("", "myWindow", "width=200,height=100");
            myWindow.document.write(detalle2);
            myWindow.document.close();
            myWindow.focus();
            myWindow.print();
            myWindow.close();
            window.location.href='';
        }})
};

$('#cerrarventa').click(function(){
    $('#cinit').val('');
    $('#apellidos').val('');
    $('#nombres').val('');
    $('#montocliente').val('');
});