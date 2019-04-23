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
            <form>
                <div class="form-group row">
                    <label for="venderor" class="col-sm-1 col-form-label">Vendedor:</label>
                    <div class="col-sm-5">
                        <select name="vendedor" id="venderor" class="form-control">
                            <option value="">Seleccionar...</option>
                            <?php
                            $query=$this->db->query("SELECT * FROM usuario");
                            foreach ($query->result() as $row){
                                echo "<option value='isUsuario'>$row->nombreUser</option>";
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
            </form>
        </div>
    </div>

    <div class="card ">
        <div class="card-header text-white bg-info" >
            <i class="fas fa-money-check"></i> Datos Ventas Por Periodo
        </div>
        <div class="card-body">
            <h3>INFORMACION DE LA EMPRESA</h3>
            <hr />
            <div class="col-md-10">
                <form method="POST" action="<?php echo base_url();?>EmpresaCtrl/store" >
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="codigo">Codigo:</label>
                            <input type="text" class="form-control" id="codigo" name="codigo">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="razonsocial">Razon Social: </label>
                            <input type="text" class="form-control" id="razonsocial" name="razonsocial">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="nomfant">Nombre Fantasia:</label>
                            <input type="text" class="form-control" id="nomfant" name="nomfant">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="nomsuc">Nombre Sucursal: </label>
                            <input type="text" class="form-control" id="nomsuc" name="nomsuc">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="telefono">Telefono:</label>
                            <input type="text" class="form-control" id="telefono" name="telefono">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="localidad">Localidad: </label>
                            <input type="text" class="form-control" id="localidad" name="localidad">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="direccion">Direccion: </label>
                        <input type="text" class="form-control" id="direccion" name="direccion">
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="cinit">CI / NIT:</label>
                            <input type="text" class="form-control" id="cinit" name="cinit">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="ingbruto">Ingresos Brutos: </label>
                            <input type="text" id="ingbruto" class="form-control" name="ingbruto">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="afip">Agencia AFIP:</label>
                            <input type="text" class="form-control" id="afip" name="afip">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="urldom">URL Dominio: </label>
                            <input type="text" id="urldom" class="form-control" name="urldom">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="fideliza">Fidelizacion:</label>
                            <select class="form-control" id="fideliza" name="fideliza">
                                <option selected value="Ninguno">Ninguno</option>
                                <option value="Siempre">Siempre</option>
                                <option value="Opcional">Opcional</option>
                            </select>
                        </div>
                    </div>
                    <input type="submit" class="btn btn-success" value="Registrar">
                    <a type="button" class="btn btn-warning" href="<?php echo base_url();?>EmpresaCtrl/empresaver">Cancelar</a>
                </form>
            </div>
        </div>

    </div>
</div>

