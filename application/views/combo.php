<div class="col-sm-11 col-md-10">
    <h3 class="page-title">
        Registrar Combo <small> Agrega un nuevo combo</small>
    </h3>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb ">
            <li class="breadcrumb-item"><a href="#"> <i class="fas fa-home"></i> Home</a></li>
            <li class="breadcrumb-item"><a href="#"> <i class="fas fa-file"></i> Combo </a></li>
            <li class="breadcrumb-item active" aria-current="page"> <i class="fa fa-cog" ></i> Registrar nuevo cupon</li>
        </ol>
    </nav>
    <div class="card ">
        <div class="card-body">
            <!-- Button trigger modal -->
            <?php if($this->usuarios_model->veri($_SESSION['idUs'],'91')):  ?>
                <button type="button" class="btn btn-success btn-sm mb-3" style="padding: 2px;" data-toggle="modal" data-target="#exampleModal">
                    <i class="fa fa-plus-circle"></i> Registrar nuevo Combo
                </button>
            <?php endif?>
            <table id="cupones" class="display" style="width:100%">
                <thead>
                <tr>
                    <th>Codigo</th>
                    <th>Nombre</th>
                    <th>Cant. de prod.</th>
                    <th>Precio Venta</th>
                    <th>Estado</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                <?php
                $query=$this->db->query("SELECT c.idCombo,c.nombreCombo,count(*) as cantidad,c.precioVenta,activo FROM combo c 
INNER JOIN comboproducto p ON c.idCombo=p.idCombo
GROUP BY c.idCombo,c.nombreCombo
ORDER BY c.idCombo DESC ");
                foreach ($query->result() as $row){
                    if ($row->activo=='on'){
                        $t="<span class='alert-success'>$row->activo</span>";
                    }else{
                        $t="<span class='alert-danger'>$row->activo</span>";
                    }
                    echo "<tr> 
                                <td>$row->idCombo</td> 
                                <td>$row->nombreCombo</td> 
                                <td>$row->cantidad</td> 
                                <td>$row->precioVenta</td> 
                                <td>$t</td> 
                                <td> 
                                    <button class='btn btn-warning btn-sm text-white' data-idcupon='$row->idCombo' style='padding:2px ;' data-toggle='modal' data-target='#update'> <i class='fa fa-pencil-alt'></i> Modificar</button>
                                    <a class='btn btn-danger btn-sm eli' style='padding:2px ;' href='".base_url()."ComboCtrl/delete/$row->idCombo'> <i class='fa fa-trash'></i> Eliminar</a> 
                                 
                                </td> 
                            </tr>";
                }
                ?>

                </tbody>
            </table>
        </div>

    </div>
</div>


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"> <i class="fa fa-ticket-alt"></i> Registrar</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" action="<?=base_url()?>ComboCtrl/store">
                    <div class="form-group row">
                        <label for="nombre" class="col-sm-1 col-form-label">Nombre</label>
                        <div class="col-sm-4">
                            <input type="text" name="nombre" required class="form-control" id="nombre" placeholder="Nombre">
                        </div>
                        <label for="descripcion" class="col-sm-2 col-form-label">Descripcion</label>
                        <div class="col-sm-5">
                            <input type="text" name="descripcion"  class="form-control" id="descripcion" placeholder="Descripcion ">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="precioCosto" class="col-sm-1 col-form-label">Precio costo</label>
                        <div class="col-sm-5">
                            <input type="text" name="precioCosto" required class="form-control" id="precioCosto" placeholder="Precio costo">
                            <span class="alert-info" id="utilidad">Utilidad: <span></span></span>
                        </div>
                        <label for="precioVenta" class="col-sm-1 col-form-label">Precio venta</label>
                        <div class="col-sm-5">
                            <input type="text" name="precioVenta" required class="form-control" id="precioVenta" placeholder="Precio venta">
                            <span class="alert-danger" id="iva">IVA: <span></span></span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="imagen" class="col-sm-1 col-form-label">Imagen</label>
                        <div class="col-sm-5">
                            <select name="imagen" required class="form-control mdb-select md-form" id="icono" >
                                <option value="" d selected>Seleccionar...</option>
                                <?php
                                $directorio = opendir("assets/imagenes");
                                $i=0;
                                while ($archivo = readdir($directorio))
                                {
                                    $nombreArch = ucwords($archivo);
                                    if($nombreArch != '.' && $nombreArch !='..'){
                                        $i++;
                                        echo "<option value='".base_url('assets/imagenes/').$nombreArch."' style='background-image:url(".base_url('assets/imagenes/').$nombreArch.")'>$nombreArch</option>";
                                    }
                                }
                                ?>
                            </select>
                        </div>
                        <label for="color" class="col-sm-1 col-form-label">Color de fondo</label>
                        <div class="col-sm-5">
                            <select  type="text" name="color" required class="form-control" id="color">
                                <option value="" >Seleccione un color...</option>
                                <option value="green">Verde</option>
                                <option value="yellow">Amarillo</option>
                                <option value="blue">Azul</option>
                                <option value="red">Rojo</option>
                                <option value="purple">Purpura</option>
                                <option value="gray">Gris</option>
                            </select>
                        </div>

                    </div>
                    <div class="form-group row">
                        <label for="color" class="col-sm-1 col-form-label">Ejemplo</label>
                        <div class="col-sm-3">
                            <div id="divEjemplo" name="divEjemplo">
                            </div>
                        </div>
                        <div class="col-sm-8 row">
                                <div class="form-group col-sm-12">
                                    <label for="idproducto">Productos</label>
                                    <div class="row">
                                        <div class="col-sm-5">
                                            <select name="idproducto" id="idproducto" class="form-control" >
                                                <option value="">Seleccionar</option>
                                                <?php
                                                $query=$this->db->query("SELECT * FROM producto WHERE activo='on'");
                                                foreach ($query->result() as $row){
                                                    echo "<option value='$row->idProducto'>$row->nombreProd</option>";
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="col-sm-5">
                                            <input type="text" id="cantidad" name="cantidad" class="form-control" placeholder="cantidad">
                                        </div>
                                        <div class="col-sm-2">
                                            <button type="button" id="agregar" class="btn-success"> <i class="fa fa-plus-circle"></i> Agregar</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group col-sm-12">
                                    <table class="table">
                                        <thead class="thead-dark">
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">Nombre</th>
                                                <th scope="col">Cantidad</th>
                                                <th scope="col"></th>
                                            </tr>
                                        </thead>
                                        <tbody id="detalle">

                                        </tbody>

                                    </table>
                                </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal"> <i class="fa fa-trash"></i> Cancelar</button>
                        <button type="submit" class="btn btn-success"> <i class="fa fa-plus"></i> Guardar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="update">
    <div class="modal-dialog modal-lg">
        <div class="modal-content ">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"><i class="fa fa-ticket-alt"></i> Modificar</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" action="<?=base_url()?>ComboCtrl/update">
                    <div class="form-group row">
                        <label for="nombre2" class="col-sm-1 col-form-label">Nombre</label>
                        <div class="col-sm-4">
                            <input type="text" name="idcombo" id="idcombo2" hidden>
                            <input type="text" name="nombre" required class="form-control" id="nombre2" placeholder="Nombre">
                        </div>
                        <label for="descripcion2" class="col-sm-2 col-form-label">Descripcion</label>
                        <div class="col-sm-5">
                            <input type="text" name="descripcion"  class="form-control" id="descripcion2" placeholder="Descripcion ">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="precioCosto2" class="col-sm-1 col-form-label">Precio costo</label>
                        <div class="col-sm-5">
                            <input type="text" name="precioCosto" required class="form-control" id="precioCosto2" placeholder="Precio costo">
                            <span class="alert-info" id="utilidad2">Utilidad: <span></span></span>
                        </div>
                        <label for="precioVenta2" class="col-sm-1 col-form-label">Precio venta</label>
                        <div class="col-sm-5">
                            <input type="text" name="precioVenta" required class="form-control" id="precioVenta2" placeholder="Precio venta">
                            <span class="alert-danger" id="iva2">IVA: <span></span></span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="imagen2" class="col-sm-1 col-form-label">Imagen</label>
                        <div class="col-sm-5">
                            <select name="imagen" required class="form-control mdb-select md-form" id="icono2" >
                                <option value="" d selected>Seleccionar...</option>
                                <?php
                                $directorio = opendir("assets/imagenes");
                                $i=0;
                                while ($archivo = readdir($directorio))
                                {
                                    $nombreArch = ucwords($archivo);
                                    if($nombreArch != '.' && $nombreArch !='..'){
                                        $i++;
                                        echo "<option value='".base_url('assets/imagenes/').$nombreArch."' style='background-image:url(".base_url('assets/imagenes/').$nombreArch.")'>$nombreArch</option>";
                                    }
                                }
                                ?>
                            </select>
                        </div>
                        <label for="color2" class="col-sm-1 col-form-label">Color de fondo</label>
                        <div class="col-sm-5">
                            <select  type="text" name="color" required class="form-control" id="color2">
                                <option value="" >Seleccione un color...</option>
                                <option value="green">Verde</option>
                                <option value="yellow">Amarillo</option>
                                <option value="blue">Azul</option>
                                <option value="red">Rojo</option>
                                <option value="purple">Purpura</option>
                                <option value="gray">Gris</option>
                            </select>
                        </div>

                    </div>
                    <div class="form-group row">
                        <label for="color" class="col-sm-1 col-form-label">Ejemplo</label>
                        <div class="col-sm-3">
                            <div id="divEjemplo2" name="divEjemplo">
                            </div>
                        </div>
                        <div class="col-sm-8 row">
                            <div class="form-group col-sm-12">
                                <label for="idproducto">Productos</label>
                                <div class="row">
                                    <div class="col-sm-5">
                                        <select name="idproducto" id="idproducto2" class="form-control" >
                                            <option value="">Seleccionar</option>
                                            <?php
                                            $query=$this->db->query("SELECT * FROM producto WHERE activo='on'");
                                            foreach ($query->result() as $row){
                                                echo "<option value='$row->idProducto'>$row->nombreProd</option>";
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="col-sm-5">
                                        <input type="text" id="cantidad2" name="cantidad" class="form-control" placeholder="cantidad">
                                    </div>
                                    <div class="col-sm-2">
                                        <button type="button" id="agregar2" class="btn-success"> <i class="fa fa-plus-circle"></i> Agregar</button>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-sm-12">
                                <table class="table">
                                    <thead class="thead-dark">
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Nombre</th>
                                        <th scope="col">Cantidad</th>
                                        <th scope="col"></th>
                                    </tr>
                                    </thead>
                                    <tbody id="detalle2">

                                    </tbody>

                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="group row">
                        <label for="activo" class="col-sm-1">Estado</label>
                        <div class="col-sm-3">
                            <input name="activo" id="activo" type="checkbox" checked data-toggle="toggle" data-onstyle="success" data-offstyle="danger">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal"> <i class="fa fa-trash"></i> Cancelar</button>
                        <button type="submit" class="btn btn-warning"> <i class="fa fa-pencil-alt"></i> Modificar</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
<script !src="">
    window.onload=function (e) {


        var cont=0;
        $('#idproducto').click(function () {
            $('#cantidad').val(1);
        });
        $('#idproducto2').click(function () {
            $('#cantidad2').val(1);
        });
        $('#agregar').click(function (e) {
            if ($('#idproducto').val()=="" || $('#cantidad').val()==""){
                alert("Seleccionar producto y cantidad!");
            }else{
                cont++;
                $('#detalle').append("<tr>" +
                    "<td>"+cont+"</td>" +
                    "<td>"+$('#idproducto option:selected').text()+" <input value='"+$('#idproducto').val()+"' name='p"+$('#idproducto').val()+"' hidden></td>" +
                    "<td>"+$('#cantidad').val()+"<input value='"+$('#cantidad').val()+"' name='c"+$('#idproducto').val()+"' hidden></td>" +
                    "<td><button  class='elim btn-danger'><i class='fa fa-trash'></i></button></td>" +
                    "</tr>");
                $('#idproducto').val('');
                $('#cantidad').val('');
            }
            $('.elim').click(function(e){
                $(this).closest('tr').remove()
            })
        });

        $('#precioVenta,#precioCosto').keyup(function (e) {
            var iva=Math.round(($('#precioVenta').val()*0.13) * 100) / 100;
            $('#iva span').html(' 13% /'+iva);
            var utilidad=Math.round((( parseInt($('#precioVenta').val())-parseInt($('#precioCosto').val()))-iva) * 100) / 100;
            var porcentaje= Math.round( ((utilidad*100)/($('#precioVenta').val()))* 100) / 100;
            $('#utilidad span').html(porcentaje+'% /'+utilidad);
        });

        $('#color').change(function () {
            $('#divEjemplo').empty();
            var nombre = $("#nombre").val();
            var color = $("#color").val();
            var icono = $("#icono").val();

            if(icono !== ""){
                icono = "<i><img src='"+icono+"' alt='logo' style='height:90px; width:90px;'/></i>";
            }

            if(color !== ""){
                var ejemplo =
                    "<div class='tile bg-"+color+"' style='margin-left: 30px;'>" +
                    "<div class='tile-body'>" +icono+ "</div>" +
                    "<div class='tile-object'>" +
                    "<h5 style='font-weight: bold;'>" + nombre +
                    "</h5></div>" +
                    "</div>";

                $('#divEjemplo').html(ejemplo);
            }
        });


        $('#cupones').DataTable( {
            "order": [[ 0, "desc" ]]
        } );
var conta;
        var eli=document.getElementsByClassName('eli');
        for (var i=0;i<eli.length;i++){
            eli[i].addEventListener('click',function (e) {
                if (!confirm("Seguro de eliminar?")){
                    e.preventDefault();
                }
            });

        }
        $('#update').on('show.bs.modal',function (e) {
                var button = $(e.relatedTarget);
                var idcupon = button.data('idcupon');
                $('#idcombo2').val(idcupon);
            $.ajax({
                type: 'POST',
                data: 'idcupon=' + idcupon,
                url: 'ComboCtrl/datos',
                success: function (e) {
                    conta=0;
                    var datos=JSON.parse(e);
                    $('#detalle2').html('');
                    //console.log(datos);

                    for (var i=0;i<datos.length;i++){
                        conta++;
                        $('#detalle2').append("<tr>" +
                            "<td>"+conta+"</td>" +
                            "<td>"+datos[i].nombreProd+" <input value='"+datos[i].idProducto+"' name='p"+datos[i].idProducto+"' hidden></td>" +
                            "<td>"+datos[i].cantidad+"<input value='"+datos[i].cantidad+"' name='c"+datos[i].idProducto+"' hidden></td>" +
                            "<td><button  class='elim2 btn-danger'><i class='fa fa-trash'></i></button></td>" +
                            "</tr>");
                        $('#idproducto2').val('');
                        $('#cantidad2').val('');
                    }
                    $('.elim2').click(function(e){
                        $(this).closest('tr').remove()
                    })
                }
            });
                $.ajax({
                    type:'POST',
                    data:'idcupon='+idcupon,
                    url:'ComboCtrl/verificar',
                    success:function (e) {
                        //console.log(e);
                        var datos=JSON.parse(e);
                        $('#toggle-demo').bootstrapToggle(datos.activo)
                        $('#nombre2').val(datos.nombreCombo);
                        $('#descripcion2').val(datos.descripcion);
                        $('#precioCosto2').val(datos.precioCosto);
                        $('#precioVenta2').val(datos.precioVenta);
                        $('#icono2').val(datos.imagen);
                        $('#color2').val(datos.fondoColor);
                    //    imagen
                        $('#divEjemplo2').empty();
                        var nombre = $("#nombre2").val();
                        var color = $("#color2").val();
                        var icono = $("#icono2").val();

                        if(icono !== ""){
                            icono = "<i><img src='"+icono+"' alt='logo' style='height:90px; width:90px;'/></i>";
                        }

                        if(color !== ""){
                            var ejemplo =
                                "<div class='tile bg-"+color+"' style='margin-left: 30px;'>" +
                                "<div class='tile-body'>" +icono+ "</div>" +
                                "<div class='tile-object'>" +
                                "<h5 style='font-weight: bold;'>" + nombre +
                                "</h5></div>" +
                                "</div>";

                            $('#divEjemplo2').html(ejemplo);
                        }
                        //iva
                        var iva=Math.round(($('#precioVenta2').val()*0.13) * 100) / 100;
                        $('#iva2 span').html(' 13% /'+iva);
                        var utilidad=Math.round((( parseInt($('#precioVenta2').val())-parseInt($('#precioCosto2').val()))-iva) * 100) / 100;
                        var porcentaje= Math.round( ((utilidad*100)/($('#precioVenta2').val()))* 100) / 100;
                        $('#utilidad2 span').html(porcentaje+'% /'+utilidad);

                    }
                });
            }
        )
        $('#precioVenta2,#precioCosto2').keyup(function (e) {
            var iva=Math.round(($('#precioVenta2').val()*0.13) * 100) / 100;
            $('#iva2 span').html(' 13% /'+iva);
            var utilidad=Math.round((( parseInt($('#precioVenta2').val())-parseInt($('#precioCosto2').val()))-iva) * 100) / 100;
            var porcentaje= Math.round( ((utilidad*100)/($('#precioVenta2').val()))* 100) / 100;
            $('#utilidad2 span').html(porcentaje+'% /'+utilidad);
        });

        $('#color2').change(function () {
            $('#divEjemplo2').empty();
            var nombre = $("#nombre2").val();
            var color = $("#color2").val();
            var icono = $("#icono2").val();

            if(icono !== ""){
                icono = "<i><img src='"+icono+"' alt='logo' style='height:90px; width:90px;'/></i>";
            }

            if(color !== ""){
                var ejemplo =
                    "<div class='tile bg-"+color+"' style='margin-left: 30px;'>" +
                    "<div class='tile-body'>" +icono+ "</div>" +
                    "<div class='tile-object'>" +
                    "<h5 style='font-weight: bold;'>" + nombre +
                    "</h5></div>" +
                    "</div>";

                $('#divEjemplo2').html(ejemplo);
            }
        });
        $('#agregar2').click(function (e) {
            if ($('#idproducto2').val()=="" || $('#cantidad2').val()==""){
                alert("Seleccionar producto y cantidad!");
            }else{
                conta++;
                $('#detalle2').append("<tr>" +
                    "<td>"+conta+"</td>" +
                    "<td>"+$('#idproducto2 option:selected').text()+" <input value='"+$('#idproducto2').val()+"' name='p"+$('#idproducto2').val()+"' hidden></td>" +
                    "<td>"+$('#cantidad2').val()+"<input value='"+$('#cantidad2').val()+"' name='c"+$('#idproducto2').val()+"' hidden></td>" +
                    "<td><button  class='elim2 btn-danger'><i class='fa fa-trash'></i></button></td>" +
                    "</tr>");
                $('#idproducto2').val('');
                $('#cantidad2').val('');
            }
            $('.elim2').click(function(e){
                $(this).closest('tr').remove()
            })
        });

    }
</script>
