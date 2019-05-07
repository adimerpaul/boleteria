<div class="col-sm-11 col-md-10">
    <h3>LISTADO DE VENTAS</h3>
    <br>
    <div class="card ">
    <div class="card-header text-white bg-warning" >
        BOLETOS
    </div>
    <div class="card-body">     <br>   
        <table id="example" class="display" style="width:100%">
            <thead>
                <tr>
                    <th>NumeroBOC</th>
                    <th>Devuelta</th>
                    <th>idVenta</th>
                    <th>Pelicula</th>
                    <th>Fecha</th>
                    <th>Hora</th>
                    <th>Tarifa</th>
                    <th>Fecha Reg</th>
                    <th>Butaca</th>
                    <th>Usuario</th>
                </tr>
            </thead>
            <tbody>

        <?php foreach($boleto as $row): ?>
        <tr>
            <td><?php echo $row['numboc']; ?></td>
            <td><?php echo $row['devuelto']; ?></td>
            <td><?php echo $row['idVenta']; ?></td>
            <td><?php echo $row['titulo']; ?></td>
            <td><?php echo $row['fechaFuncion']; ?></td>
            <td><?php echo $row['horaFuncion']; ?></td>
            <td><?php echo $row['costo']; ?></td>
            <td><?php echo $row['fecha']; ?></td>
            <td><?php if($row['devuelto']=='NO') 
            echo chr($row['fila']+64).'-'.$row['fila'].'-'.$row['columna']; 
            else echo '-';?></td>
            <td><?php echo $row['nombreUser']; ?></td>

        </tr>
    <?php endforeach; ?>
            </tbody>
        </table>

    </div>
</div>
</div>


