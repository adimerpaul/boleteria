
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
            <div class="col-md-3">
            <h5><i class="far fa-clock"></i> Funciones</h5><br>
            <div id="horariopelicula">
                <ol id="selecfun">
                    <li class="ui-widget-content"><span style="border-image: initial; border: 3px solid blue;">S1</span> 15:15 (18:00)</li>
                    
                </ol>
            </div>  
            </div>

            <div class="col-md-2">
                <h5><i class="fas fa-dollar-sign"></i> Tarifas</h5><br>
                <div id="listacosto">

                </div>
                
            </div>

            <div class="col-md-4">
                <h5>Operaciones</h5><br>
                
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
                                        <a id="btnAgregar" href="#" class="btn btn-primary " style="width:40%">
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
                                                        <a href="#" id="lblCantidadEntradas" data-type="text" data-pk="1" style="display: inline">
                                                            0
                                                        </a>
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
            <div class="col-md-3">
                <h5>Detalle Venta</h5><br>
                
                
            </div>
        </div>

            
        </div>
    </div>  
</div>
