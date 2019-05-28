<div class="col-sm-11 col-md-10">
    <h3 class="page-title">
        Resumen de ventas del dia Candy<small> Resumen de ventas dia Candy</small>
    </h3>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb ">
            <li class="breadcrumb-item"><a href="#"> <i class="fas fa-home"></i> Home</a></li>
            <li class="breadcrumb-item"><a href="#"> <i class="fas fa-sign"></i> Resumen </a></li>
            <li class="breadcrumb-item active" aria-current="page"> <i class="fas fa-chart-area"></i> Resumen del dia Candy</li>
        </ol>
    </nav>
    <div class="card ">
        <div class="card-header text-white bg-info" >
            <i class="fas fa-money-check"></i> Ventas del dia Candy
        </div>
        <div class="card-body">
            <label for="">Fecha de Caja:</label>
            <input type="date" name="fechacandy" id="fechacandy" value="<?php echo date('Y-m-d');?>">
            <br>
            <h3>Ventas por factura</h3>
            <table  class="table-bordered" style="width:100%">
                <thead class="table-success">
                <tr>
                    <th>Numero</th>
                    <th>Fecha</th>
                    <th>Cliente</th>
                    <th>Total</th>
                </tr>
                </thead>
                <tbody id="rfactura">
                <?php
                $total=0;
                $query=$this->db->query("SELECT * FROM ventacandy v 
INNER JOIN cliente c ON v.idcliente=c.idcliente
INNER JOIN usuario u ON u.idUsuario=v.idUsuario
WHERE u.idUsuario='".$_SESSION['idUs']."'
AND date(fechaVenta)=date('".date('Y-m-d')."')");
                foreach ($query->result() as $row){
                    $total=$total+$row->total;
                    echo "<tr> 
                                <td>$row->idVentaCandy</td> 
                                <td>$row->fechaVenta</td>  
                                <td>$row->apellidoCl</td> 
                                <td>$row->total</td>
                            </tr>";
                }
                ?>
                <tr>
                    <th></th>
                    <th></th>
                    <th>Total</th>
                    <th><?=$total?></th>
                </tr>
                </tbody>
            </table><br>
            <h3>Ventas por Producto y Combo</h3>
            <table  class="table-bordered" style="width:100%">
                <thead class="table-success">
                <tr>
                    <th>Id</th>
                    <th>Nombre</th>
                    <th>cantidad</th>
                    <th>PUnitario</th>
                    <th>Total</th>
                </tr>
                </thead>
                <tbody id="rdetalle">


                </tbody>
            </table>
            <br>
            <a class="btn btn-success btn-block" id="imprimirCandy"> <i class="fas fa-print"></i> Imprimir ventas del dia</a>
        </div>

    </div>
</div>




