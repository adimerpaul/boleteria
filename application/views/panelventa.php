<style>
    .pantalla{
        width: 250px;
        background: #2a6496;
        font-size: 30px;
        font-family: Cambria;
        color: white;
    }
    .libre{
        width: 45px;
        background: #4cae4c;
    }
    .ocupado{
        width: 45px;
        background: #5a6268;
    }
    .disabledContent
    {
        cursor: not-allowed;
        background-color: rgb(229, 229, 229) !important;
    }
    .asignado
    {
        width: 45px;
        background: #004DFF; 
    }
    .vendido
    {
        width: 45px;
        background: #FF0000; 
    }
</style>

<div class="col-sm-11 col-md-10">
    <h3>PANEL DE VENTAS</h3>

    <div class="card ">
        <div class="card-header text-white bg-success" >
        PANEL DE VENTAS
            <input type="date" id="fecfuncion"  name="fecfuncion"  min="<?php echo date("Y-m-d");?>" required value="<?php echo date("Y-m-d");?>">
        </div>
        <div class="card-body">
            <h4><i class="fas fa-film"></i> PELICULAS</h4>
            <hr/>
            <div class="row">
            <div id="listapelicula">
                <ol id="selectable">
                    <li class="ui-widget-content">
                        <div class="titulo"><h4>Architect & Engineer</h4></div>
                        <div class="tipo">d3</div>
                        <div class="vendido">33</div>
                    </li>
                </ol>
                </div>
            </div>
            
            <hr>
        <div class="row">
            <div class="col-md-2">
            <h6><i class="far fa-clock"></i> Funciones</h6><br>
            <div id="horariopelicula">
                <ol id="selecfun">
                    <li class="ui-widget-content"><span style="border-image: initial; border: 3px solid blue;">S1</span> 15:15 (18:00)</li>
                    
                </ol>
            </div>  
            </div>

            <div class="col-md-2">
                <h6><i class="fas fa-dollar-sign"></i> Tarifas</h6><br>
                <div id="lcosto">
                    <ol id="selecost">

                    </ol> 
                </div>
            </div>

            <div class="col-md-4">
                <h6>Operaciones</h6><br>
                
                <div id="pnlOperaciones" class="portlet-body">
                                <div class="row-fluid">
                                    <a id="btnEntradaMenos" href="#" class="btn btn-light  " style="width:40%">
                                        <i class="fas fa-minus-circle"></i>
                                        <div>Entrada</div>
                                    </a>
                                    <a id="btnEntradaMas" href="#" class="btn btn-light  " style="width:40%">
                                        <i class="fas fa-plus-circle"></i>
                                        <div>Entrada</div>
                                    </a>
                                </div>
                                </br>
                                <div class="row-fluid">
                                    <a id="btnCancelar" href="#" class="btn btn-danger" style="width:40%">
                                        <i class="fas fa-times"></i>
                                        <div>Cancelar</div>
                                    </a>
                                        <a id="btnAgregar" href="#" class="btn btn-primary " style="width:40%" data-toggle="modal" data-target="#exampleModal" data-idsala="">
                                            <i class="fas fa-plus"></i>
                                            <div>Agregar</div>
                                        </a>
                                        
                                </div>
                                </br>
                                <div class="row-fluid row">
                                    <a id="btnAceptar" href="#" class="btn btn-success " style="width:40%">
                                        <i class="fas fa-check"></i>
                                        <div>Cerrar Venta</div>
                                    </a>
                                    <div><p>&nbsp;</p></div>
                                            <div class="pricing-head pricing-head-active">
                                                <h3 style="height: 40px;background: transparent;border: 3px solid;">
                                                    <strong>
                                                        <a href="#" id="lblCantidadEntradas" data-type="text" data-pk="1" style="display: inline">0</a>
                                                    </strong>
                                                    <p style="color: #000; display: inline"> / </p>
                                                    <strong>
                                                        <p id="lblPrecio" style="color: green; display: inline">0,00Bs</p>
                                                    </strong>
                                                </h3>
                                    </div>
        </div>  
            </div>

            </div>
            <div class="col-md-4">
            <div class="card ">
                 
                <h6 class="card-header text-white bg-dark">  <a href="#" class="btn btn-danger">Cancelar venta</a></h6>
                
                 
            <div class="card-body">
                <h5 class="card-title">Detalle Venta</h5>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Cant</th>
                            <th scope="col">Fecha</th>
                            <th scope="col">Pelicula</th>
                            <th scope="col">subtotal</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">1</th>
                            <td>Mark</td>
                            <td>Otto</td>
                            <td>@mdo</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            </div>

                
            </div>
        </div>

            
        </div>
    </div>  
</div>



<div class="modal fade bd-example-modal-lg" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modificar Sala</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            <form action="">
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="nroSala">nroSala:</label>
                            <input type="text" id="idSala" name="idSala" hidden>
                            <input type="text" id="nroFila" name="nroFila" hidden>
                            <input type="text" id="nroColumna" name="nroColumna" hidden>
                            <input type="text" id="idfunmodal" name="idfunmodal" hidden>
                            <input type="text" class="form-control" id="nroSala" name="nroSala" readonly>
                        </div>
                        <div class="form-group col-md-6">
                            <div>
                                <i class="fas fa-tags"></i>
                                <label for="">Butacas Asignadas:</label>
                                <label id="numasignada">0</label>
                            </div>
                            <div>
                                <i class="far fa-credit-card"></i>
                                <label for="">Entradas: </label>
                                <label id="totalentrada"> </label>
                            </div>
                        </div>

                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-12" style="width: 100%;justify-content: center">
                            <center>
                                <div class="pantalla">Pantalla</div>
                                <table id="tabla" class="table-bordered">

                                    <thead id="head">
                                    </thead>
                                    <tbody id="body">

                                    </tbody>
                                </table>
                                <div id="habilitados" hidden >

                                </div>
                            </center>
                        </div>
                    </div>
                    <input type="button" class="btn btn-success" value="Aceptar" id="bolacepta">
                    <button type="button" class="btn btn-warning" data-dismiss="modal">Cancelar</button>
            </div>
            </form>
            <div class="modal-footer">

            </div>
        </div>
    </div>
</div>
