
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
                                if(!empty($pelicula) && $row->idPelicula == $pelicula)
                                echo "<option value='$row->idPelicula' selected>".$row->nombre.' '.$tipo."</option>";
                                else
                                echo "<option value='$row->idPelicula'>".$row->nombre.' '.$tipo."</option>";
                            }

                            ?>
            </select>
            </div>
        </div>
        <div class="row">
        <div class="col-sm-8">
        <label for="">Seleccione un a Fecha</label>
            <input type="date" id="fecha" name="fecha" required value="<?php echo date('Y-m-d');?>">    <br><br>            
            Inicio: <input type="date" id="fecha1" name="fecha1" required value="<?php echo $fecha1;?>" readonly> 
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
        <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
            <a class="navbar-brand" href="#">Exportar datos</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
                <span class="navbar-toggler-icon"></span>
            </button>
 
        </nav>
            <table id="reporte" class="table table-striped table-bordered" style="width:100%">
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
                <?php $series=[];$sprecio=[];$i=0; $sum1=[]; $titulo='';
                                if(empty($pelicula)) $pelicula=0; 
                               $query=$this->db->query("SELECT t.idTarifa,serie,precio from tarifa t, funcion f, boleto b where t.idTarifa = f.idTarifa and b.idFuncion=f.idFuncion and date(b.fecha) >='$fecha1' and date(b.fecha)<='$fecha2' and devuelto='NO' and idCupon is null group by serie order by t.idTarifa");
                               foreach ($query->result() as $row) {
                                   $series[$i]=$row->idTarifa;
                                   $sprecio[$i]=$row->precio;
                                   $i++;
                               }
                               $fecconsulta=$fecha1;
                               $dia=0;
                               $consulta='';
                               while($dia<7){
                               $consulta.="SELECT (ELT(WEEKDAY(('$fecconsulta')) + 1, 'Lunes', 'Martes', 'Miercoles', 'Jueves', 'Viernes', 'Sabado', 'Domingo')) AS DIA, date('$fecconsulta') as FECHA ";
                               for($j=0;$j<$i;$j++){
                                $consulta.=",(select count(*) 
                                from tarifa t, funcion f, boleto b 
                                where t.idTarifa = f.idTarifa
                                and b.idFuncion=f.idFuncion
                                and f.idPelicula = $pelicula
                                and date(b.fecha) ='$fecconsulta' 
                                and devuelto = 'NO' and idCupon is null and t.idTarifa=".$series[$j].") as t".$j;
                               }
                               $consulta.=" from dual ";
                                $dia++;
                                $fecconsulta=date("Y-m-d",strtotime($fecha1."+ $dia days"));
                                if($dia<7) $consulta.=" union ";}
                               $query2=$this->db->query($consulta);
                               $sum1=[];
                               foreach ($query2->result_array() as $row) {
                                    $tar='';
                                    $aux='';
                                    for($k=0;$k<$i;$k++){
                                        $ps='t'.$k;
                                        $sum1[$k]+=$row[$ps];
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
                            $subtotal='';
                            $auxiliar='';
                            for($j=0;$j<$i;$j++){
                                $listatotal.="<td><b>".$sum1[$j]."</b></td>";
                                $total+=(($sum1[$j]) * ($sprecio[$j]));
                                $subtotal=$sum1[$j] * $sprecio[$j];
                                $auxlista.="<td><b>$subtotal</b></td>";
                                $auxiliar.="<td></td>";
                                
                            }

                            $query3=$this->db->query("Select concat(nombre,' ',(if(formato=1,'3D','2D'))) as titulo from pelicula where idPelicula = $pelicula");
                            $titulo=$query3->result()[0]->titulo;
                            echo "<tr>
                            <td><b>SUBTOTAL:</b></td>
                            <td></td>".$listatotal."
                            <td><b></b></td>
                        <tr>";                         
                            echo "<tr>
                                <td><b>TOTAL:<b></td>
                                <td></td>".$auxlista."
                                <td><b>$total</b></td>
                            <tr>";
                            echo "<tr>
                                <td><b>TITULO:</b></td>
                                <td><b>$titulo</b></td>".$auxiliar."
                                <td></td>
                            </tr>";
                               ?>

                </tbody>
            </table>
            <hr class="d-sm-none">

        </div>

    </div>
</div>

<script>
$("table").tableExport({
	formats: ["xlsx","txt", "csv"], //Tipo de archivos a exportar ("xlsx","txt", "csv", "xls")
	position: 'button',  // Posicion que se muestran los botones puedes ser: (top, bottom)
	bootstrap: false,//Usar lo estilos de css de bootstrap para los botones (true, false)
	fileName: "borderauxdistribuidor",    //Nombre del archivo 
});
</script>

