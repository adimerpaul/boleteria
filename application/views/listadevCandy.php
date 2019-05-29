<div class="col-sm-11 col-md-10">
    <h3>LISTADO DE DEVOLUCIONES CANDY</h3>
    <br>
    <div class="card ">
    <div class="card-header text-white bg-warning" >
        Devoluciones de las ventas Candy
    </div>
    <div class="card-body">     
    <div class="row">
    </div>
    <br>   
        <table id="example" class="display" style="width:100%">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Fecha Dev</th>
                    <th>Responsable</th>
                    <th>Vendedor</th>
                    <th>Fecha Venta</th>
                    <th>Id Venta</th>
                    <th>Tipo</th>
                    <th>Motivo</th>
                </tr>
            </thead>
            <tbody>
       
        <?php 
        $query=$this->db->query("SELECT idDevolucion,fechaReg,nombreUser as responsable,
            (select u1.nombreUser from usuario u1 where u1.idUsuario=v.idUsuario) as vendedor,
            fechaVenta,v.idVentaCandy,tipoVenta,monto,motivo FROM devolucion d,ventacandy v, usuario u 
            WHERE d.idVenta=v.idVentaCandy
            and d.idUsuario = u.idUsuario and tipo='CANDY'");
        foreach($query->result() as $row): ?>
        <tr>
            <td><?php echo $row->idDevolucion; ?></td>
            <td><?php echo $row->fechaReg; ?></td>
            <td><?php echo $row->responsable; ?></td>
            <td><?php echo $row->vendedor; ?></td>
            <td><?php echo $row->fechaVenta; ?></td>
            <td><?php echo $row->idVentaCandy.' - '.$row->monto.' Bs'; ?></td>
            <td><?php echo $row->tipoVenta; ?></td>
            <td><?php echo $row->motivo; ?></td>
        </tr>
    <?php endforeach; ?>
            </tbody>
        </table>

    </div>
</div>
</div>

