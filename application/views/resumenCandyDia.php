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
    <div>

    <div class="card ">
        <div class="card-header text-white bg-info" >
            <i class="fas fa-money-check"></i> Datos Ventas Día
        </div>
        <div class="card-body">
            <h3>Información del Día </h3>
            <hr>
            
            <div class="row">
                <div class="col-md-6">
                <label for=""><b>Fecha : </b></label> <label for="" id="fecha"><?= $fecha?></label>
                </div>
                <div class='col-md-6'>
                 <label ><b>Total de Ventas del Día: </b></label> <label  id='totalProd'></label>
                 </div>
            </div>
            <br>
            <h3>Ventas Realizadas</h3>
            <hr>
            <table id="example" class="display" style="width:100%" id="tresumen">

                <thead class="table-success">
                <tr>
                    <th>fecha</th>
                    <th>Vendedor</th>
                    <th>Total</th>
                    <th>nroComprobante</th>
                    <th>Opcion</th>
                </tr>
                </thead>
                <tbody id="listav">
                    <?php
                    $query=$this->db->query("SELECT idVentaCandy,fechaVenta,user,total,nroComprobante From ventaCandy v, usuario u
                    where date(fechaVenta)='".$fecha."' and u.idUsuario=".$idusuario ." and v.idUsuario=u.idUsuario");
                    foreach ($query->result() as $row) {
                        echo "<tr>";
                        echo "<td>$row->fechaVenta</td>";                        
                        echo "<td>$row->user</td>";                        
                        echo "<td>$row->total</td>";                        
                        echo "<td>$row->nroComprobante</td>";                        
                        echo "<td><a class='btn btn-warning btn-sm'>ver detalle</a></td>";                                                
                        echo "</tr>";
                    }
                    ?>
                </tbody>
            </table>

        </div>

    </div>
</div>

