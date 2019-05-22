<style>
    .boton{
        padding: 22px;
    }
</style>
<div class="col-sm-11 col-md-10">
    <h3 class="page-title">
        Candy  <small> ventas </small>
    </h3>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb ">
            <li class="breadcrumb-item"><a href=""> <i class="fas fa-home"></i> Home</a></li>
            <li class="breadcrumb-item"><a href=""> <i class="fas fa-signal"></i> Ventas candy</a></li>
            <li class="breadcrumb-item active" aria-current="page"> <i class="fa fa-ticket-alt" ></i> Venta</li>
        </ol>
    </nav>
    <div class="row">
        <div class="col-sm-8">
            <div class="card  mb-3" >
                <div class="card-header text-white bg-info"> <i class="fa fa-coffee"></i> RUBROS</div>
                <div class="card-body">
                    <div class='tile bg-green' id="combos">
                        <div class='tile-body'>
                            <img src='<?=base_url()?>assets/imagenes/combo.png' alt='logo'>
                        </div>
                        <div class='tile-object'>
                            <h5 style='font-weight: bold;'>Combos</h5>
                        </div>
                    </div>
                    <?php
                    $query=$this->db->query("SELECT * FROM rubro WHERE activo='on'");
                    foreach ($query->result() as $row){
                        echo " <div class='tile bg-$row->colorFondo rubro' id='$row->idRubro' >
                                    <div class='tile-body'>
                                        <img src='".base_url()."assets/imagenes/$row->imagen' alt='logo'>
                                    </div>
                                    <div class='tile-object'>
                                        <h5 style='font-weight: bold;'>$row->nombreRubro</h5>
                                    </div>
                                </div>";
                    }
                    ?>
                </div>
            </div>
            <div class="card  mb-3" >
                <div class="card-header text-white bg-info"><i class="fa fa-cocktail"></i> Productos</div>
                <div class="card-body" id="productos">

                </div>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="card  mb-3" >
                <div class="card-header text-white bg-info d-flex justify-content-end">
                    <button class="btn-danger btn-sm"> <i class="fa fa-trash"></i> Cancelar</button>
                    <button class="btn-success btn-sm"> <i class="fa fa-plus-circle"></i> Cerrar venta</button>

                </div>
                <div class="card-body">
                    <h5 class="card-title">Info card title</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Modal -->
<div class="modal fade" id="seleccion-producto" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Detalle Producto</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="formulario">
                <div class="row">
                    <div class="col-sm-6">
                            <div class="form-group">
                                <label for="nombre">Nombre producto</label>
                                <input type="email" class="form-control" id="nombre" placeholder="Nombre Producto" disabled>
                            </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="precio">Precio unit.</label>
                                    <input type="number" class="form-control" id="precio" disabled>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="total">Total (BS.).</label>
                                    <input type="number" class="form-control" id="total" disabled>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="cantidad">Cantidad</label> <br>
                            <button id="mini" class="btn-danger boton"> <i class="fa fa-minus"></i></button>
                            <input type="number"  style="width: 90px;font-size: 20px" id="cantidad" class="boton" value="1" placeholder="0" disabled>
                            <button id="maxi" class="btn-success boton" > <i class="fa fa-plus"></i></button>
                        </div>

                    </div>
                    <div class="col-sm-6">
                        <div id="seleccionados" class="form-control" style="height: 100%">

                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label for="preferencias">Preferencias</label>
                            <div class="form-control" id="preferencias" >

                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-trash"></i> Cancelar</button>
                    <button type="submit" class="btn btn-info"> <i class="fa fa-check"></i> Agregar al pedido</button>
                </div>
                </form>
            </div>


        </div>
    </div>
</div>
