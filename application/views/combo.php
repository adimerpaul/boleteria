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
                    <i class="fa fa-check"></i> Registrar nuevo Combo
                </button>
            <?php endif?>
            <table id="cupones" class="display" style="width:100%">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Fecha Inicio</th>
                    <th>Fecha Final</th>
                    <th>Motivo</th>
                    <th>Estado</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                <?php
                $query=$this->db->query("SELECT * FROM cupon");
                foreach ($query->result() as $row){
                    echo "<tr> 
                                <td>$row->idCupon</td> 
                                <td>".substr($row->fechaInicio,0,10)."</td> 
                                <td>". substr($row->fechaFin,0,10)."</td> 
                                <td>$row->motivo</td> 
                                <td>$row->estado</td> 
                                <td> 
                                    <a class='btn btn-danger btn-sm eli' style='padding:2px ;' href='".base_url()."CuponCtrl/delete/$row->idCupon'> <i class='fa fa-stop'></i> Eliminar</a> 
                                    <button class='btn btn-warning btn-sm text-white' data-idcupon='$row->idCupon' style='padding:2px ;' data-toggle='modal' data-target='#detalle'> <i class='fa fa-edit'></i> Detalle</button>
                                    <a class='btn btn-info btn-sm ' style='padding:2px ;' href='".base_url()."CuponCtrl/imprimir/$row->idCupon'> <i class='fa fa-print'></i> Imprimir</a> 
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
                            <input type="text" name="descripcion" required class="form-control" id="descripcion" placeholder="Descripcion ">
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
                            <input type="text" name="imagen" required class="form-control" id="imagen" placeholder="Imagen">
                            <select class="mdb-select md-form" id="icono" name="icono">
                                <option value="" disabled selected>Choose your option</option>
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
                        <div class="form-group col-md-6">
                            <label for="activo">Ejemplo : </label><br>
                            <div id="divEjemplo" name="divEjemplo">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal"> <i class="fa fa-stop"></i> Cancelar</button>
                        <button type="submit" class="btn btn-success"> <i class="fa fa-check"></i> Guardar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="detalle">
    <div class="modal-dialog modal-lg">
        <div class="modal-content ">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Detalle</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-12">
                        <div id="contenedor">

                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button data-dismiss="modal" class="btn btn-danger"> <i class="fa fa-times"></i> Cerrar</button>
                </div>
            </div>
        </div>
    </div>
</div>
<script !src="">
    window.onload=function (e) {

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

        var eli=document.getElementsByClassName('eli');
        for (var i=0;i<eli.length;i++){
            eli[i].addEventListener('click',function (e) {
                if (!confirm("Seguro de eliminar?")){
                    e.preventDefault();
                }
            });

        }
        $('#detalle').on('show.bs.modal',function (e) {
                var button = $(e.relatedTarget);
                var idcupon = button.data('idcupon');
                $.ajax({
                    type:'POST',
                    data:'idcupon='+idcupon,
                    url:'CuponCtrl/verificar',
                    success:function (e) {
                        console.log(e);
                        $('#contenedor').html(e);
                    }
                });
            }
        )

    }
</script>
