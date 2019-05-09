<div class="col-sm-11 col-md-10">
    <h3 class="page-title">
        Resumen de Ventas por Semana <small> Genera las cantidad vendido</small>
    </h3>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb ">
            <li class="breadcrumb-item"><a href=""> <i class="fas fa-home"></i> Home</a></li>
            <li class="breadcrumb-item active" aria-current="page"> <i class="fa fa-file" ></i> Ver Resumen Venta	</li>
        </ol>
    </nav>
    <form action="<?=base_url()?>Reporte/bordistribuidor" method="post">
        <div class="form-group row col-md-6">
            <label for="pelicula" class="col-sm-2 col-form-label">Pelicula</label>
            <div class="col-sm-10">
            <select class="form-control" id="pelicula" name="pelicula" required >
                            <?php
                            $query=$this->db->query("SELECT * FROM pelicula order by nombre");
                            foreach ($query->result() as $row){
                                if($row->formato==1)
                                $tipo='3D';
                                else
                                $tipo='2D';
                                if($row->idPelicula == $pelicula)                             
                                echo "<option value='$row->idPelicula' selected>".$row->nombre.' '.$tipo."</option>";
                                else
                                echo "<option value='$row->idPelicula'>".$row->nombre.' '.$tipo."</option>";
                            }

                            ?>
            </select>
            </div>
        </div>
        <div class="row">
        <div class="col-sm-5">
        <label for="">Seleccione un a Fecha</label>
            <input type="date" id="fecha" name="fecha" required value="<?php echo date('Y-m-d');?>">    <br><br>            
            Inicio: <input type="date" id="fecha1" name="fecha1" required value="<?php echo $fecha1;?>" readonly> <br>                  
            Fin: <input type="date" id="fecha2" name="fecha2" required value="<?php echo $fecha2;?>" readonly >                 
        </div>
        <div class="col-sm-3">
            <button type="submit" id="consulta" class="btn btn-success btn-block"> <i class="fas fa-check"></i> Consultar</button>
        </div>
        </div>

    </form>        <br>
    <div class="card ">
        <div class="card-header text-white bg-info" >
            <i class="fas fa-money-check"></i> Datos Por Periodo
        </div>
        <div class="card-body">
            <table id="reporte" class="display" style="width:100%">
                <thead>
                <tr>
                    <th>Dia</th>
                    <th>Fecha</th>
                    <?php
                    $query=$this->db->query("SELECT t.idTarifa,serie,precio from tarifa t, funcion f, boleto b where t.idTarifa = f.idTarifa and b.idFuncion=f.idFuncion and date(b.fecha) >='$fecha1' and date(b.fecha)<='$fecha2' and devuelto='NO' and idCupon is null group by serie order by t.idTarifa");
                    foreach ($query->result() as $row) {
                        echo "<th>".$row->serie.'/'.$row->precio."</th>";
                    }
                    ?>
                    <th>total</th>
                </tr>
                </thead>
                <tbody>
                <?php $series=[];$sprecio=[];$i=0; $sum=[];
                               $query=$this->db->query("SELECT t.idTarifa,serie,precio from tarifa t, funcion f, boleto b where t.idTarifa = f.idTarifa and b.idFuncion=f.idFuncion and date(b.fecha) >='$fecha1' and date(b.fecha)<='$fecha2' and devuelto='NO' and idCupon is null group by serie order by t.idTarifa");
                               foreach ($query->result() as $row) {
                                   $series[$i]=$row->idTarifa;
                                   $sprecio[$i]=$row->precio;
                                   $i++;
                               }
                               $consulta="SELECT (ELT(WEEKDAY(date(b.fecha)) + 1, 'Lunes', 'Martes', 'Miercoles', 'Jueves', 'Viernes', 'Sabado', 'Domingo')) AS DIA, date(b.fecha) as FECHA ";
                               for($j=0;$j<$i;$j++){
                                $consulta.=",(select count(*) from tarifa t, funcion f, boleto b 
                                where t.idTarifa = f.idTarifa
                                and b.idFuncion=f.idFuncion
                                and f.idPelicula = $pelicula
                                and date(b.fecha) >='$fecha1' and date(b.fecha) <='$fecha2'
                                and devuelto='NO' and idCupon is null and t.idTarifa=".$series[$j].") as t".$j;
                               }
                               $consulta.=" from tarifa t, funcion f, boleto b
                               where t.idTarifa = f.idTarifa
                               and b.idFuncion=f.idFuncion
                               and f.idPelicula =$pelicula
                               and date(b.fecha) >='$fecha1' and date(b.fecha) <='$fecha2'
                               GROUP by serie";
                               $query2=$this->db->query($consulta);
                               echo json_encode($query2->result_array());
                               
                               foreach ($query2->result_array() as $row) {
                                    $tar='';
                                    $aux='';
                                    for($j=0;$j<$i;$j++){
                                        $ps='t'.$j;
                                        $sum[$j]+=($row[$ps]);
                                        $tar.="<td>".$row[$ps]."</td>";
                                        $aux.="<td></td>";
                                    }
                                   
                                    echo "<tr>
                                    <td>".$row['DIA']."</td>
                                    <td>".$row['FECHA']."</td>".
                                    $tar
                                    ."<td></td>
                                    </tr>";
                            }
                            $listatotal='';
                            $auxlista='';
                            $total=0;
                            for($j=0;$j<$i;$j++){
                                $listatotal.="<td><b>".$sum[$j]."</b></td>";
                                $total+=(($sum[$j]) * ($sprecio[$j]));
                                $auxlista.="<td><b>0</b></td>";
                            }
                            if($listatotal=='')$listatotal=$auxlista;                          
                            echo "<tr>
                                <td>".$i."</td>
                                <td></td>".$listatotal."
                                <td><b>$total</b></td>
                            <tr>";
                               ?>

                </tbody>
            </table>

        </div>

    </div>
</div>


<script !src="">
    document.addEventListener('DOMContentLoaded', function() {
        $('#reporte').DataTable( {
            dom: 'Bfrtip',
            buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print'
            ]
        } );
    });
</script>