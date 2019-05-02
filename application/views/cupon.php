<div class="col-sm-11 col-md-10">
    <h3 class="page-title">
        Registrar Nuevo Cupon <small> Agrega un nuevo Cupon</small>
    </h3>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb ">
            <li class="breadcrumb-item"><a href="#"> <i class="fas fa-home"></i> Home</a></li>
            <li class="breadcrumb-item"><a href="#"> <i class="fas fa-file"></i> Cupones </a></li>
            <li class="breadcrumb-item active" aria-current="page"> <i class="fa fa-ticket-alt" ></i> Registrar nuevo cupon</li>
        </ol>
    </nav>
    <div class="card ">
        <div class="card-header text-white bg-info" >
            <i class="fas fa-money-check"></i> Datos Ventas Por Periodo
        </div>
        <div class="card-body">
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-success btn-sm mb-3" style="padding: 2px;" data-toggle="modal" data-target="#exampleModal">
                 <i class="fa fa-ticket-alt"></i> Registrar nuevo cupon
            </button>
            <table id="example" class="display" style="width:100%">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Fechas</th>
                    <th>Funcion</th>
                    <th>Pelicula</th>
                    <th>Motivo</th>
                    <th>Cantidad</th>
                    <th>Estado</th>
                    <th>Cliente</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                <?php
                    $query=$this->db->query("SELECT * FROM cupon");
                    foreach ($query->result() as $row){
                        echo "<tr>
                                <td>$row->idCupon</td>
                                <td>De ".substr($row->fechaInicio,0,10)." al ". substr($row->fechaFin,0,10)."</td>
                                <td></td>
                                <td></td>
                                <td>$row->motivo</td>
                                <td>$row->cantidad</td>
                                <td>$row->estado</td>
                                <td></td>
                                <td></td>
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
                <h5 class="modal-title" id="exampleModalLabel"> <i class="fa fa-ticket-alt"></i> Registrar cupon</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group row">
                        <label for="motivo" class="col-sm-2 col-form-label">Motivo</label>
                        <div class="col-sm-10">
                            <input type="text" required class="form-control" id="motivo" placeholder="Motivo">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="fechafin" class="col-sm-2 col-form-label">Fecha Fin</label>
                        <div class="col-sm-10">
                            <input type="date" required value="<?=date('Y-m-d')?>" class="form-control" id="fechafin" placeholder="fechafin">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="funcion" class="col-sm-2 col-form-label">Funcion</label>
                        <div class="col-sm-10">
                            <select name="funcion" id="funcion" class="form-control"></select>
                            <?php

                            ?>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="funcion" class="col-sm-2 col-form-label">Pelicula</label>
                        <div class="col-sm-10">
                            <select name="funcion" id="funcion" class="form-control"></select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="cliente" class="col-sm-2 col-form-label">Cliente</label>
                        <div class="col-sm-10">
                            <select name="cliente" id="cliente" class="form-control"></select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="cantidad" class="col-sm-2 col-form-label">Cantidad</label>
                        <div class="col-sm-10">
                            <input type="number" required value="1" class="form-control" id="cantidad" placeholder="cantidad">
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

