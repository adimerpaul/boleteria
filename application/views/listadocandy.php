<div class="col-sm-11 col-md-10">
    <h3 class="page-title">
        Listado Venta Candy <small> Selecciona una Venta en fecha </small>
    </h3>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb ">
            <li class="breadcrumb-item"><a href="#"> <i class="fas fa-home"></i> Home</a></li>
            <li class="breadcrumb-item"><a href="#"> <i class="fas fa-file"></i> Listado </a></li>
            <li class="breadcrumb-item active" aria-current="page"> <i class="fa fa-cog" ></i> Listado Venta Candy</li>
        </ol>
    </nav><br>
    <h3>LISTADO DE VENTAS CANDY</h3>
    <br>
    <div class="card ">
    <div class="card-header text-white bg-warning" >
        Lista de Venta Candy
    </div>
    <div class="card-body">     
    <div class="row">
      <form class="form-inline" method="POST" action="<?php echo base_url();?>ListadoCandyCtrl" >
        <div class="form-group mb-3">
          <label for="fecini" class="">Fecha Inicial</label><br>
          <input type="date" class="form-control" id="fecini" name="fecini" value="<?php echo $fecinicio;?>" required>
        </div>
        <div class="form-group mb-3">
          <label for="fecfin" class="">FechaFinal</label><br>
          <input type="date" class="form-control" id="fecfin" name="fecfin" value="<?php echo $fecfinal;?>" required>
        </div>
        <button type="submit" class="btn btn-primary mb-2">Buscar</button>
    </form>
    </div>
    <br>   
        <table id="example" class="display" style="width:100%">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Nro Comprobante</th>
                    <th>Fecha</th>
                    <th>Cliente</th>
                    <th>Usuario</th>
                    <th>Total</th>
                    <th>Tipo</th>
                    <th>Estado</th>
                    <th>Opciones</th>
                </tr>
            </thead>
            <tbody>
       
        <?php 
        $query=$this->db->query("SELECT * FROM ventacandy v 
        inner join usuario u on u.idUsuario=v.idUsuario
        inner join cliente c on c.idCliente=v.idCliente
        where date(fechaVenta)>='$fecinicio' and date(fechaVenta)<='$fecfinal'");
        foreach($query->result() as $row): ?>
        <tr>
            <td><?php echo $row->idVentaCandy; ?></td>
            <td><?php echo $row->nroComprobante; ?></td>
            <td><?php echo $row->fechaVenta; ?></td>
            <td><?php echo $row->nombreCl.' '.$row->apellidoCl; ?></td>
            <td><?php echo $row->nombreUser; ?></td>
            <td><?php echo $row->total; ?></td>
            <td><?php echo $row->tipoVenta; ?></td>
            <td><?php echo $row->estado; ?></td>
            <td>                
                    <a class="btn btn-outline-warning  btn-sm" data-toggle="modal" data-target="#exampleModal" data-idventacandy="<?php echo $row->idVentaCandy; ?>">Ver Detalle</a>
            </td>
        </tr>
    <?php endforeach; ?>
            </tbody>
        </table>

    </div>
</div>
</div>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Detalle de la Venta Candy</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <h4>INFORMACION DE LA VENTA CANDY</h4>
          <hr>
  <div class="form-row">
    <div class="form-group col-md-4">
      <label >Id Venta: </label>   
      <label  id="idVentaCandy"></label> 
      <input type="hidden" id="idVenCandy">     
    </div>
    <div class="form-group col-md-4">
      <label >Nro Comprobante: </label>   
      <label  id="nroComp"></label>      
    </div>
    <div class="form-group col-md-4">
      <label >Total Venta: </label>   
      <label  id="totalVenta"></label>      
    </div>
  </div>

  <div class="form-row">
    <div class="form-group col-md-4">
      <label >Fecha: </label>   
      <label  id="fechaVenta"></label>      
    </div>
    <div class="form-group col-md-4">
      <label >Cliente: </label>   
      <label  id="nombre"></label>      
    </div>    
  </div>

  <div class="form-row">
    <div class="form-group col-md-4">
      <label >Vendedor: </label>   
      <label  id="nombreUser"></label>      
    </div>
    <div class="form-group col-md-4">
      <label >Codigo de Control: </label>   
      <label id="codControl"></label>      
    </div>
    <div class="form-group col-md-4">
      <label >Tipo: </label>   
      <label id="tipoventa"></label>      
    </div>
  </div>
    <hr>
    <h4>Entradas</h4>
    <hr>
    <table id="example" class="display" style="width:100%">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Producto</th>
                    <th>Cantidad</th>
                    <th>Precio Unitario</th>
                    <th>Subtotal</th>
                </tr>
            </thead>
            <tbody id="tabbody">

            </tbody>
        </table>
        <hr>
                <?php if($this->usuarios_model->veri($_SESSION['idUs'],'146')):  ?>
                <a class="btn btn-success text-white" id="btnImpresion">Impresion</a>
                <?php endif ?>
                <?php if($this->usuarios_model->veri($_SESSION['idUs'],'145')):  ?>
        <input type="button" class="btn btn-danger" value="Devolucion" id="btnDevolver">
                <?php endif ?>
        <a type="button" class="btn btn-warning" href="<?php echo base_url();?>ListadoCandyCtrl">Cancelar</a>
      </div>
      <div class="modal-footer">

      </div>
    </div>
  </div>
</div>
<script !src="">
    url='<?=base_url()?>';
</script>
