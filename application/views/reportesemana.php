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
    <form action="<?=base_url()?>Reporte/repsemana" method="post">
        <div class="row">
        <div class="col-sm-5">
        <label for="">Seleccione un a Fecha</label>
            <input type="date" id="fecha" name="fecha" required value="<?php echo date('Y-m-d');?>">    <br><br>            
            Inicio: <input type="date" id="fecha1" name="fecha1" required value="<?php echo $fecha1;?>" readonly >                  
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
                    <th>Nro</th>
                    <th>Pelicula</th>
                    <th>Jueves</th>
                    <th>Viernes</th>
                    <th>Sabado</th>
                    <th>Domingo</th>
                    <th>Lunes</th>
                    <th>Martes</th>
                    <th>Miercoles</th>
                    <th>total</th>
                    <th>ingreso</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $query=$this->db->query("SELECT p.idPelicula,concat(nombre,' ',(if(formato=1,'3D','2D'))) as titulo,count(*) as total,
                (SELECT count(*)
                            FROM boleto b1  
                            INNER JOIN funcion f1 ON b1.idFuncion=f1.idFuncion
                            INNER JOIN pelicula p1 ON p1.idPelicula=f1.idPelicula
                            WHERE date(b1.fecha)>=date('$fecha1') AND date(b1.fecha)<=date('$fecha2')
                            AND WEEKDAY(date(b1.fecha))+1=4
                            AND p1.idPelicula=p.idPelicula
                            ) as jueves,
                (SELECT count(*)
                            FROM boleto b1  
                            INNER JOIN funcion f1 ON b1.idFuncion=f1.idFuncion
                            INNER JOIN pelicula p1 ON p1.idPelicula=f1.idPelicula
                            WHERE date(b1.fecha)>=date('$fecha1') AND date(b1.fecha)<=date('$fecha2')
                            AND WEEKDAY(date(b1.fecha))+1=5
                            AND p1.idPelicula=p.idPelicula
                            ) as viernes,
                (SELECT count(*)
                            FROM boleto b1  
                            INNER JOIN funcion f1 ON b1.idFuncion=f1.idFuncion
                            INNER JOIN pelicula p1 ON p1.idPelicula=f1.idPelicula
                            WHERE date(b1.fecha)>=date('$fecha1') AND date(b1.fecha)<=date('$fecha2')
                            AND WEEKDAY(date(b1.fecha))+1=6
                            AND p1.idPelicula=p.idPelicula
                            ) as sabado,
                (SELECT count(*)
                            FROM boleto b1  
                            INNER JOIN funcion f1 ON b1.idFuncion=f1.idFuncion
                            INNER JOIN pelicula p1 ON p1.idPelicula=f1.idPelicula
                            WHERE date(b1.fecha)>=date('$fecha1') AND date(b1.fecha)<=date('$fecha2')
                            AND WEEKDAY(date(b1.fecha))+1=7
                            AND p1.idPelicula=p.idPelicula
                            ) as domingo,
                (SELECT count(*)
                            FROM boleto b1  
                            INNER JOIN funcion f1 ON b1.idFuncion=f1.idFuncion
                            INNER JOIN pelicula p1 ON p1.idPelicula=f1.idPelicula
                            WHERE date(b1.fecha)>=date('$fecha1') AND date(b1.fecha)<=date('$fecha2')
                            AND WEEKDAY(date(b1.fecha))+1=1
                            AND p1.idPelicula=p.idPelicula
                            ) as lunes,
                (SELECT count(*)
                            FROM boleto b1  
                            INNER JOIN funcion f1 ON b1.idFuncion=f1.idFuncion
                            INNER JOIN pelicula p1 ON p1.idPelicula=f1.idPelicula
                            WHERE date(b1.fecha)>=date('$fecha1') AND date(b1.fecha)<=date('$fecha2')
                            AND WEEKDAY(date(b1.fecha))+1=2
                            AND p1.idPelicula=p.idPelicula
                            ) as martes,
                (SELECT count(*)
                            FROM boleto b1  
                            INNER JOIN funcion f1 ON b1.idFuncion=f1.idFuncion
                            INNER JOIN pelicula p1 ON p1.idPelicula=f1.idPelicula
                            WHERE date(b1.fecha)>=date('$fecha1') AND date(b1.fecha)<=date('$fecha2')
                            AND WEEKDAY(date(b1.fecha))+1=3
                            AND p1.idPelicula=p.idPelicula
                            ) as miercoles,
                (select sum(precio)
                from funcion f1, boleto b1, tarifa t
                WHERE b1.idFuncion = f1.idFuncion
                and f1.idPelicula = p.idPelicula
                 and f1.idTarifa = t.idTarifa
                and b1.fecha>='$fecha1' and b1.fecha<='$fecha2'
                and b1.devuelto='NO' and b1.idCupon is null) as ingreso
                
                from pelicula p, funcion f, boleto b
                WHERE f.idPelicula = p.idPelicula
                and b.idFuncion = f.idFuncion
                and b.fecha>='$fecha1' and b.fecha<='$fecha2'
                and devuelto ='NO'
                group by p.idPelicula order by total desc ");
                 $i=0;
                $jueves=0;
                $viernes=0;
                $sabado=0;
                $domingo=0;
                $lunes=0;
                $martes=0;
                $miercoles=0;
                $total=0;
                $ingreso=0;
                foreach ($query->result() as $row){
                    $i++;
                    $jueves+=($row->jueves);
                    $viernes+=($row->viernes);
                    $sabado+=($row->sabado);
                    $domingo+=($row->domingo);
                    $lunes+=($row->lunes);
                    $martes+=($row->martes);
                    $miercoles+=($row->miercoles);
                    $total+=($row->total);
                    $ingreso+=($row->ingreso);
                    echo "<tr>
                    <td>$i</td>
                    <td>$row->titulo</td>
                    <td>$row->jueves</td>
                    <td>$row->viernes</td>
                    <td>$row->sabado</td>
                    <td>$row->domingo</td>
                    <td>$row->lunes</td>
                    <td>$row->martes</td>
                    <td>$row->miercoles</td>
                    <td>$row->total</td>
                    <td>$row->ingreso</td>
                    </tr>";
                }
                echo "<tr>
                <td><b>N</b></td>
                <td><b></b></td>
                <td><b>$jueves</b></td>
                <td><b>$viernes</b></td>
                <td><b>$sabado</b></td>
                <td><b>$domingo</b></td>
                <td><b>$lunes</b></td>
                <td><b>$martes</b></td>
                <td><b>$miercoles</b></td>
                <td><b>$total</b></td>
                <td><b>$ingreso</b></td>
                </tr>";
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