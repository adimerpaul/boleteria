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
            <div class="row">
            <div class="col-sm-4"><h4><i class="fas fa-film"></i> PELICULAS</h4></div>
            <div class="col-sm-6">
            <ul class="breadcrumb " id="ul-cabecera">
                                        <li>
                                            <i class="far fa-credit-card"></i>
                                            Disponibles: <strong id="lblEntradasDisponibles"></strong>
                                        </li>|	
                                        <li>
                                            <i class="fas fa-tags"></i>
                                            Vendidas: <strong id="lblEntradasVendidas"></strong>
                                        </li>|	
                                        <li>
                                            <i class="fas fa-thumbs-up"></i>
                                            Devueltas: <strong id="lblEntradasDevueltas" style="red"></strong>
                                        </li>|
                                        <li>
                                            <i class="fas fa-video"></i>
                                            Capacidad: <strong id="lblCapacidadSala"></strong>
                                        </li>		
                                    </ul>
                </div>
            </div>
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
                                    <a id="btnEntradaMenos"  class="btn btn-light  " style="width:40%">
                                        <i class="fas fa-minus-circle"></i>
                                        <div>Entrada</div>
                                    </a>
                                    <a id="btnEntradaMas"  class="btn btn-light  " style="width:40%">
                                        <i class="fas fa-plus-circle"></i>
                                        <div>Entrada</div>
                                    </a>
                                </div>
                                </br>
                                <div class="row-fluid">
                                    <a id="btnCancelar" class="btn btn-danger" style="width:40%">
                                        <i class="fas fa-times"></i>
                                        <div>Cancelar</div>
                                    </a>
                                        <a id="btnAgregar"  class="btn btn-primary " style="width:40%" data-toggle="modal" data-target="#exampleModal" data-idsala="">
                                            <i class="fas fa-plus"></i>
                                            <div>Agregar</div>
                                        </a>
                                        
                                </div>
                                </br>
                                <div class="row-fluid row">
                                    <a id="btnAceptar"  class="btn btn-success " data-toggle="modal" data-target="#clienteModal" style="width:40%">
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
                 
                <h6 class="card-header text-white bg-dark">  <a href="<?=base_url()?>VentaCtrl/deleteTempAll" class="btn btn-danger" id="elimVentaTemp">Cancelar venta</a></h6>
                
                 
            <div class="card-body">
                <h5 class="card-title">Detalle Venta</h5>
                <table class="table table-sm">
                    <thead>
                        <tr>
                            <th scope="col">Cant</th>
                            <th scope="col">Fecha</th>
                            <th scope="col">Pelicula</th>
                            <th scope="col">subtotal</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody id="tabPreVenta">
                    <?php foreach($temporal as $row): ?>                        
                        <tr>
                            <th scope="row">1</th>
                            <td><?php echo $row['fechaFuncion'].' '.$row['horaFuncion']; ?></td>
                            <td><?php echo $row['titulo']; ?></td>
                            <td class="costo"><?php echo $row['costo']; ?></td>
                            <td><a class="btn btn-outline-danger btn-sm" href="<?=base_url()?>VentaCtrl/deleteTemporal/<?=$row['idTemporal']?>"><i class="far fa-trash-alt"></i></a></td>                                                        
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
                <hr>
                <div style="text-align: right; background-color: #CD853F; color: white; font-size:20px;">
                <label for="">TOTAL:</label>
                <label for="" id="totalPre">0,0</label>Bs
                </div>
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
                <h5 class="modal-title" id="exampleModalLabel">Asientos Sala</h5>
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


<div class="modal fade" id="clienteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modificar Cliente</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body"> 
          <h5>Datos de Cliente</h5>
          <hr>
          <div class="form-row">
            <div class="form-group col-md-6">
                <label for="cinit1">CI / NIT:</label>   
                <input type="text" class="form-control" id="cinit1" name="cinit1" required>  
            </div>
            <div class="form-group col-md-6">
                <label for="buscar"></label>  <br> 
               <a class="btn btn-info" id="buscarCliente"><i class="fas fa-search"></i> BUSCAR</a> 
            </div>
         </div>
         <hr>
         <div class="form-row">
            <div class="form-group col-md-4">
                <label for="pago">Monto:</label>   
                <input type="number" step="any" class="form-control" id="pago" name="pago" min=0 step='0.01' requiered>  
            </div>
            <div class="form-group col-md-4">
                <label for="prepago">Monto a Cancelar:</label>   
                <input type="number" step="any" class="form-control" id="prepago" name="prepago" readonly step='0.01'>  
            </div>
            <div class="form-group col-md-4">
                <label for="resultado">Vuelto:</label>   
                <input type="number" step="any" class="form-control" id="resultado" name="resultado" readonly step='0.01'>  
            </div>
        </div>
         <hr>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="cinit">CI / NIT:</label>   
      <input type="text" class="form-control" id="cinit" name="cinit" readonly required>  
      <input type="hidden" id="idcliente" name="idcliente">  
    </div>
    <div class="form-group col-md-2">
        <label for=""></label>   <br>
        <input class="form-control" id="vtipo" type="checkbox" data-toggle="toggle" data-on="F" data-off="O"  data-onstyle="primary" data-offstyle="success" checked>
    </div>
    <div class="form-group col-md-4">
      <label for="cupon">Nro Cortesia:</label>   
      <input type="checkbox" id="checkcupon" >
      <input type="number" class="form-control" id="cupon" name="cupon"> 
      <span id="errorcupon" style="color: red;" ></span>
    </div>
  </div>

  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="nombre">Nombre:</label>   
      <input type="text" class="form-control" id="nombre" name="nombre"  style="text-transform: uppercase;">  
      <input type="hidden" id="idcliente" name="idcliente">  
    </div>
    <div class="form-group col-md-6">
      <label for="apellido">Apellido:</label>   
      <input type="text" class="form-control" id="apellido" name="apellido" Required style="text-transform: uppercase;">  
    </div>
  </div>


  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="email">Email:</label>   
      <input type="text" class="form-control" id="email" name="email">  
    </div>
    <div class="form-group col-md-6">
      <label for="telef">Telefono:</label>   
      <input type="text" class="form-control" id="telef" name="telef">  
    </div>
  </div>

  <input type="button" class="btn btn-success" value="Registrar" id="registrarVenta">
  <a type="button" class="btn btn-warning" href="<?php echo base_url();?>VentaCtrl">Cancelar</a>
      </div>
      <div class="modal-footer">

      </div>
    </div>
  </div>
</div>



