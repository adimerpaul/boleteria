<div class="col-sm-11 col-md-10">
    <h3 class="page-title">
        Resumen de Ventas <small> Analice las ventas desde aquí </small>
    </h3>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb ">
            <li class="breadcrumb-item"><a href="#"> <i class="fas fa-home"></i> Home</a></li>
            <li class="breadcrumb-item"><a href="#"> <i class="fas fa-signal"></i> Resumen ventas</a></li>
            <li class="breadcrumb-item active" aria-current="page"> <i class="fa fa-ticket-alt" ></i> Ver resumen ventas</li>
        </ol>
    </nav>
    <div class="row">
        <div class="col">
                <div class="form-group row">
                    <label for="venderor" class="col-sm-1 col-form-label">Vendedor:</label>
                    <div class="col-sm-5">
                        <select name="vendedor" id="venderor" class="form-control">
                            <option value="">Seleccionar...</option>
                            <?php
                            $query=$this->db->query("SELECT * FROM usuario");
                            foreach ($query->result() as $row){
                                echo "<option value='$row->idUsuario'>$row->nombreUser</option>";
                            }

                            ?>
                        </select>
                    </div>
                    <label for="staticEmail" class="col-sm-1 col-form-label">Fecha:</label>
                    <div class="col-sm-5">
                        <div type="text" class="form-control" id="fecha" value="<?=date('Y-m-d')?>">
                            <i class="fa fa-calendar"></i>
                            <span></span>
                            <i class="fa fa-caret-down"></i>
                        </div>
                    </div>
                </div>
                <button type="button" id="consultar" class="btn btn-success btn-sm"> <i class="fas fa-check"></i> Consultar</button>
        </div>
    </div>
    <br>
    <div class="card ">
        <div class="card-header text-white bg-info" >
            <i class="fas fa-money-check"></i> Datos Ventas Por Periodo
        </div>
        <div class="card-body">
            <h3><b>INFORMACION DEL PERIODO</b></h3>
            <hr>
            <div class="">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="codigo"><b>Fecha Inicial:</b></label>
                            <label for="" id="fechaI"></label>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="razonsocial"><b>Fecha Final: </b></label>
                            <label for="" id="fechaF"></label>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="codigo"><b>Usuario:</b></label>
                            <label for="" id="userN"></label>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="razonsocial"><b>Ventas: </b></label>
                            <label for="" id="ventatotal"></label>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="codigo"><b>Devoluciones:</b></label>
                            <label for="" id="devolucion"></label>
                        </div>
                    </div>
                    <hr>
                    <table  class="table"   style="width:100%">
                    <thead>
                        <tr>
                            <th>Funcion</th>
                            <th>Fecha</th>
                            <th>Pelicula</th>
                            <th>Vendidas</th>
                            <th>Devueltas</th>
                            <th>Total</th>
                        </tr>
                    </thead>
                    <tbody id="tresumen">
                    </tbody>
                </table>
                <hr>
            </div>
        </div>

    </div>
</div>

