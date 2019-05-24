<div class="col-sm-11 col-md-10">
    <h3 class="page-title">
        Resumen de Ventas Candy Dia <small> Analice las ventas por Día desde aquí</small>
    </h3>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb ">
            <li class="breadcrumb-item"><a href="#"> <i class="fas fa-home"></i> Home</a></li>
            <li class="breadcrumb-item"><a href="#"> <i class="fas fa-sign"></i> Resumen Ventas </a></li>
            <li class="breadcrumb-item active" aria-current="page"> <i class="fas fa-chart-area"></i> Ventas Candy Dia</li>
        </ol>
    </nav>

    <div class="card ">
        <div class="card-header text-white bg-info" >
            <i class="fas fa-money-check"></i> Datos Ventas Día
        </div>
        <div class="card-body">
            <h3>Información del Día </h3>
            <hr>
            <input type="hidden" value="<?php echo base_url();?>" id="burl">
            <div class="row">
                <div class="col-md-6">
                    <label for=""><b>Fecha : </b></label> <label for="" id="fecha"><?= $fecha?></label>
                </div>
                <div class='col-md-6'>
                    <label ><b>Total de Ventas del Día: </b></label> 
                        <?php $query=$this->db->query("SELECT sum(total) as sumatotal  from ventaCandy where date(fechaVenta)='$fecha'");
                         echo $query->result()[0]->sumatotal.' Bs.'; ?>
                    </label>
                </div>
            </div>
            <br>
            <h3>Ventas Realizadas</h3>
            <hr>
            <table id="example" class="display" style="width:100%" id="tresumen">
                <thead class="table-success">
                    <tr>
                        <th>Fecha</th>
                        <th>Vendedor</th>
                        <th>Total</th>
                        <th>nroComprobante</th>
                        <th>Opcion</th>
                    </tr>
                </thead>
                <tbody id="listav">
                    <?php
                        $query=$this->db->query("SELECT idVentaCandy,fechaVenta,user,total,nroComprobante From ventaCandy v, usuario u
                        where date(fechaVenta)='".$fecha."' and v.idUsuario=u.idUsuario");
                        foreach ($query->result() as $row) {
                        echo "<tr>";
                        echo "<td>$row->fechaVenta</td>";                        
                        echo "<td>$row->user</td>";                        
                        echo "<td>$row->total</td>";                        
                        echo "<td>$row->nroComprobante</td>";                        
                        if($this->usuarios_model->veri($_SESSION['idUs'],'142')): 
                        echo "<td><a class='btn btn-outline-warning btn-sm detalle'  data-toggle='modal' data-target='#exampleModal' data-idventacandy='".$row->idVentaCandy."'>Ver Detalle</a></td>";                                                
                        endif;
                        echo "</tr>";}
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Informacion de Venta</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="serie"><b>Fecha: </b></label>   
                <label id="fechaventa"></label>   
            </div>
            <div class="form-group col-md-6">
                <label for=""><b>Hora:</b> </label>
                <label id="horaventa"></label>   
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for=""><b>Vendedor:</b></label>   
                <label id="vendedor"></label>   
            </div>
            <div class="form-group col-md-6">
                <label for=""><b>Cliente:</b></label>   
                <label id="cliente"></label>   
            </div>

        </div>
        <br>
        <h3><b>PRODUCTOS</b></h3>
            <hr>
            <table id="example" class="table" style="width:100%" id="tresumen">

            <thead class="table-success">
                <tr>
                    <th>No</th>
                    <th>Producto</th>
                    <th>Cantidad</th>
                    <th>Precio Unitario</th>
                    <th>Sub Total</th>
                </tr>
            </thead>
            <tbody id="detalleventa">

            </tbody>
        </table>

      </div>

    </div>
  </div>
</div>

