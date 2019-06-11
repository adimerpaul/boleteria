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
        <div class="col-sm-6">
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
                    <th>JR</th>
                    <th>JF</th>
                    <th>Viernes</th>
                    <th>VR</th>
                    <th>VF</th>
                    <th>Sabado</th>
                    <th>SR</th>
                    <th>SF</th>
                    <th>Domingo</th>
                    <th>DR</th>
                    <th>DF</th>
                    <th>Lunes</th>
                    <th>LR</th>
                    <th>LF</th>
                    <th>Martes</th>
                    <th>MR</th>
                    <th>MF</th>
                    <th>Miercoles</th>
                    <th>XR</th>
                    <th>XF</th>
                    <th>Total</th>
                    <th>Total_R</th>
                    <th>Total_F</th>
                    <th>Monto_T</th>
                    <th>Monto_R</th>
                    <th>Monto_F</th>
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
                            AND WEEKDAY(date(b1.fecha))+1=4 and b1.idCupon is null
                            AND p1.idPelicula=p.idPelicula and b1.devuelto='NO'
                            ) as jueves,
                            (SELECT count(*)
                            FROM boleto b1  
                            INNER JOIN funcion f1 ON b1.idFuncion=f1.idFuncion
                            INNER JOIN pelicula p1 ON p1.idPelicula=f1.idPelicula
                            WHERE date(b1.fecha)>=date('$fecha1') AND date(b1.fecha)<=date('$fecha2')
                            AND WEEKDAY(date(b1.fecha))+1=4 and b1.idCupon is null
                            AND p1.idPelicula=p.idPelicula and b1.devuelto='NO' and b1.tipoCompra='FACTURA'
                            ) as jf,
                            (SELECT count(*)
                            FROM boleto b1  
                            INNER JOIN funcion f1 ON b1.idFuncion=f1.idFuncion
                            INNER JOIN pelicula p1 ON p1.idPelicula=f1.idPelicula
                            WHERE date(b1.fecha)>=date('$fecha1') AND date(b1.fecha)<=date('$fecha2')
                            AND WEEKDAY(date(b1.fecha))+1=4 and b1.idCupon is null
                            AND p1.idPelicula=p.idPelicula and b1.devuelto='NO' and b1.tipoCompra='RECIBO'
                            ) as jr,

                (SELECT count(*)
                            FROM boleto b1  
                            INNER JOIN funcion f1 ON b1.idFuncion=f1.idFuncion
                            INNER JOIN pelicula p1 ON p1.idPelicula=f1.idPelicula
                            WHERE date(b1.fecha)>=date('$fecha1') AND date(b1.fecha)<=date('$fecha2')
                            AND WEEKDAY(date(b1.fecha))+1=5 and b1.idCupon is null
                            AND p1.idPelicula=p.idPelicula and b1.devuelto='NO'
                            ) as viernes,


                            (SELECT count(*)
                            FROM boleto b1  
                            INNER JOIN funcion f1 ON b1.idFuncion=f1.idFuncion
                            INNER JOIN pelicula p1 ON p1.idPelicula=f1.idPelicula
                            WHERE date(b1.fecha)>=date('$fecha1') AND date(b1.fecha)<=date('$fecha2')
                            AND WEEKDAY(date(b1.fecha))+1=5 and b1.idCupon is null
                            AND p1.idPelicula=p.idPelicula and b1.devuelto='NO' and b1.tipoCompra='RECIBO'
                            ) as vr,

                            (SELECT count(*)
                            FROM boleto b1  
                            INNER JOIN funcion f1 ON b1.idFuncion=f1.idFuncion
                            INNER JOIN pelicula p1 ON p1.idPelicula=f1.idPelicula
                            WHERE date(b1.fecha)>=date('$fecha1') AND date(b1.fecha)<=date('$fecha2')
                            AND WEEKDAY(date(b1.fecha))+1=5 and b1.idCupon is null
                            AND p1.idPelicula=p.idPelicula and b1.devuelto='NO' and b1.tipoCompra='FACTURA'
                            ) as vf,

                (SELECT count(*)
                            FROM boleto b1  
                            INNER JOIN funcion f1 ON b1.idFuncion=f1.idFuncion
                            INNER JOIN pelicula p1 ON p1.idPelicula=f1.idPelicula
                            WHERE date(b1.fecha)>=date('$fecha1') AND date(b1.fecha)<=date('$fecha2')
                            AND WEEKDAY(date(b1.fecha))+1=6 and b1.idCupon is null
                            AND p1.idPelicula=p.idPelicula and b1.devuelto='NO'
                            ) as sabado,
                            (SELECT count(*)
                            FROM boleto b1  
                            INNER JOIN funcion f1 ON b1.idFuncion=f1.idFuncion
                            INNER JOIN pelicula p1 ON p1.idPelicula=f1.idPelicula
                            WHERE date(b1.fecha)>=date('$fecha1') AND date(b1.fecha)<=date('$fecha2')
                            AND WEEKDAY(date(b1.fecha))+1=6 and b1.idCupon is null
                            AND p1.idPelicula=p.idPelicula and b1.devuelto='NO' and b1.tipoCompra='RECIBO'
                            ) as sr,
                            (SELECT count(*)
                            FROM boleto b1  
                            INNER JOIN funcion f1 ON b1.idFuncion=f1.idFuncion
                            INNER JOIN pelicula p1 ON p1.idPelicula=f1.idPelicula
                            WHERE date(b1.fecha)>=date('$fecha1') AND date(b1.fecha)<=date('$fecha2')
                            AND WEEKDAY(date(b1.fecha))+1=6 and b1.idCupon is null
                            AND p1.idPelicula=p.idPelicula and b1.devuelto='NO' and b1.tipoCompra='FACTURA'
                            ) as sf,
                            
                (SELECT count(*)
                            FROM boleto b1  
                            INNER JOIN funcion f1 ON b1.idFuncion=f1.idFuncion
                            INNER JOIN pelicula p1 ON p1.idPelicula=f1.idPelicula
                            WHERE date(b1.fecha)>=date('$fecha1') AND date(b1.fecha)<=date('$fecha2')
                            AND WEEKDAY(date(b1.fecha))+1=7 and b1.idCupon is null
                            AND p1.idPelicula=p.idPelicula and b1.devuelto='NO'
                            ) as domingo,
                            (SELECT count(*)
                            FROM boleto b1  
                            INNER JOIN funcion f1 ON b1.idFuncion=f1.idFuncion
                            INNER JOIN pelicula p1 ON p1.idPelicula=f1.idPelicula
                            WHERE date(b1.fecha)>=date('$fecha1') AND date(b1.fecha)<=date('$fecha2')
                            AND WEEKDAY(date(b1.fecha))+1=7 and b1.idCupon is null
                            AND p1.idPelicula=p.idPelicula and b1.devuelto='NO' and b1.tipoCompra='RECIBO'
                            ) as dr,
                            (SELECT count(*)
                            FROM boleto b1  
                            INNER JOIN funcion f1 ON b1.idFuncion=f1.idFuncion
                            INNER JOIN pelicula p1 ON p1.idPelicula=f1.idPelicula
                            WHERE date(b1.fecha)>=date('$fecha1') AND date(b1.fecha)<=date('$fecha2')
                            AND WEEKDAY(date(b1.fecha))+1=7 and b1.idCupon is null
                            AND p1.idPelicula=p.idPelicula and b1.devuelto='NO' and b1.tipoCompra='FACTURA'
                            ) as df,

                (SELECT count(*)
                            FROM boleto b1  
                            INNER JOIN funcion f1 ON b1.idFuncion=f1.idFuncion
                            INNER JOIN pelicula p1 ON p1.idPelicula=f1.idPelicula
                            WHERE date(b1.fecha)>=date('$fecha1') AND date(b1.fecha)<=date('$fecha2')
                            AND WEEKDAY(date(b1.fecha))+1=1 and b1.idCupon is null
                            AND p1.idPelicula=p.idPelicula and b1.devuelto='NO'
                            ) as lunes,
                            (SELECT count(*)
                            FROM boleto b1  
                            INNER JOIN funcion f1 ON b1.idFuncion=f1.idFuncion
                            INNER JOIN pelicula p1 ON p1.idPelicula=f1.idPelicula
                            WHERE date(b1.fecha)>=date('$fecha1') AND date(b1.fecha)<=date('$fecha2')
                            AND WEEKDAY(date(b1.fecha))+1=1 and b1.idCupon is null
                            AND p1.idPelicula=p.idPelicula and b1.devuelto='NO' and b1.tipoCompra='RECIBO'
                            ) as lr,
                            (SELECT count(*)
                            FROM boleto b1  
                            INNER JOIN funcion f1 ON b1.idFuncion=f1.idFuncion
                            INNER JOIN pelicula p1 ON p1.idPelicula=f1.idPelicula
                            WHERE date(b1.fecha)>=date('$fecha1') AND date(b1.fecha)<=date('$fecha2')
                            AND WEEKDAY(date(b1.fecha))+1=1 and b1.idCupon is null
                            AND p1.idPelicula=p.idPelicula and b1.devuelto='NO' and b1.tipoCompra='FACTURA'
                            ) as lf,

                (SELECT count(*)
                            FROM boleto b1  
                            INNER JOIN funcion f1 ON b1.idFuncion=f1.idFuncion
                            INNER JOIN pelicula p1 ON p1.idPelicula=f1.idPelicula
                            WHERE date(b1.fecha)>=date('$fecha1') AND date(b1.fecha)<=date('$fecha2')
                            AND WEEKDAY(date(b1.fecha))+1=2 and b1.idCupon is null
                            AND p1.idPelicula=p.idPelicula and b1.devuelto='NO'
                            ) as martes,
                            (SELECT count(*)
                            FROM boleto b1  
                            INNER JOIN funcion f1 ON b1.idFuncion=f1.idFuncion
                            INNER JOIN pelicula p1 ON p1.idPelicula=f1.idPelicula
                            WHERE date(b1.fecha)>=date('$fecha1') AND date(b1.fecha)<=date('$fecha2')
                            AND WEEKDAY(date(b1.fecha))+1=2 and b1.idCupon is null
                            AND p1.idPelicula=p.idPelicula and b1.devuelto='NO' and b1.tipoCompra='RECIBO'
                            ) as mr,
                            (SELECT count(*)
                            FROM boleto b1  
                            INNER JOIN funcion f1 ON b1.idFuncion=f1.idFuncion
                            INNER JOIN pelicula p1 ON p1.idPelicula=f1.idPelicula
                            WHERE date(b1.fecha)>=date('$fecha1') AND date(b1.fecha)<=date('$fecha2')
                            AND WEEKDAY(date(b1.fecha))+1=2 and b1.idCupon is null
                            AND p1.idPelicula=p.idPelicula and b1.devuelto='NO' and b1.tipoCompra='FACTURA'
                            ) as mf,

                (SELECT count(*)
                            FROM boleto b1  
                            INNER JOIN funcion f1 ON b1.idFuncion=f1.idFuncion
                            INNER JOIN pelicula p1 ON p1.idPelicula=f1.idPelicula
                            WHERE date(b1.fecha)>=date('$fecha1') AND date(b1.fecha)<=date('$fecha2')
                            AND WEEKDAY(date(b1.fecha))+1=3 and b1.idCupon is null
                            AND p1.idPelicula=p.idPelicula and b1.devuelto='NO'
                            ) as miercoles,
                            (SELECT count(*)
                            FROM boleto b1  
                            INNER JOIN funcion f1 ON b1.idFuncion=f1.idFuncion
                            INNER JOIN pelicula p1 ON p1.idPelicula=f1.idPelicula
                            WHERE date(b1.fecha)>=date('$fecha1') AND date(b1.fecha)<=date('$fecha2')
                            AND WEEKDAY(date(b1.fecha))+1=3 and b1.idCupon is null
                            AND p1.idPelicula=p.idPelicula and b1.devuelto='NO' and b1.tipoCompra='RECIBO'
                            ) as xr,
                            (SELECT count(*)
                            FROM boleto b1  
                            INNER JOIN funcion f1 ON b1.idFuncion=f1.idFuncion
                            INNER JOIN pelicula p1 ON p1.idPelicula=f1.idPelicula
                            WHERE date(b1.fecha)>=date('$fecha1') AND date(b1.fecha)<=date('$fecha2')
                            AND WEEKDAY(date(b1.fecha))+1=3 and b1.idCupon is null
                            AND p1.idPelicula=p.idPelicula and b1.devuelto='NO' and b1.tipoCompra='FACTURA'
                            ) as xf,

                (select sum(precio)
                from funcion f1, boleto b1, tarifa t
                WHERE b1.idFuncion = f1.idFuncion
                and f1.idPelicula = p.idPelicula
                and b1.idTarifa = t.idTarifa
                and b1.fecha>='$fecha1' and b1.fecha<='$fecha2'
                and b1.devuelto='NO' and b1.idCupon is null) as ingresot,
                    (select sum(precio)
                from funcion f1, boleto b1, tarifa t
                WHERE b1.idFuncion = f1.idFuncion
                and f1.idPelicula = p.idPelicula
                and b1.idTarifa = t.idTarifa
                and b1.fecha>='$fecha1' and b1.fecha<='$fecha2' and b1.tipoCompra='RECIBO'
                and b1.devuelto='NO' and b1.idCupon is null) as ingresor,
                    (select sum(precio)
                from funcion f1, boleto b1, tarifa t
                WHERE b1.idFuncion = f1.idFuncion
                and f1.idPelicula = p.idPelicula
                and b1.idTarifa = t.idTarifa
                and b1.fecha>='$fecha1' and b1.fecha<='$fecha2' and b1.tipoCompra='FACTURA'
                and b1.devuelto='NO' and b1.idCupon is null) as ingresof,
                
                (select count(*)
                from funcion f1, boleto b1, tarifa t
                WHERE b1.idFuncion = f1.idFuncion
                and f1.idPelicula = p.idPelicula
                and b1.idTarifa = t.idTarifa
                and b1.fecha>='$fecha1' and b1.fecha<='$fecha2' and b1.tipoCompra='RECIBO'
                and b1.devuelto='NO' and b1.idCupon is null) as totalr,
                (select count(*)
                from funcion f1, boleto b1, tarifa t
                WHERE b1.idFuncion = f1.idFuncion
                and f1.idPelicula = p.idPelicula
                and b1.idTarifa = t.idTarifa
                and b1.fecha>='$fecha1' and b1.fecha<='$fecha2' and b1.tipoCompra='FACTURA'
                and b1.devuelto='NO' and b1.idCupon is null) as totalf

                from pelicula p, funcion f, boleto b
                WHERE f.idPelicula = p.idPelicula
                and b.idFuncion = f.idFuncion
                and b.fecha>='$fecha1' and b.fecha<='$fecha2'
                and devuelto ='NO' and b.idCupon is null
                group by p.idPelicula order by total desc ");
                 $i=0;
                $jueves=0;
                $jf=0;
                $jr=0;
                $viernes=0;
                $vr=0;
                $vf=0;
                $sabado=0;
                $sr=0;
                $sf=0;
                $domingo=0;
                $dr=0;
                $df=0;
                $lunes=0;
                $lr=0;
                $lf=0;
                $martes=0;
                $mr=0;
                $mf=0;
                $miercoles=0;
                $xr=0;
                $xf=0;
                $total=0;
                $totalr=0;
                $totalf=0;
                $ingresot=0;
                $ingresor=0;
                $ingresof=0;
                foreach ($query->result() as $row){
                    $i++;
                    $jueves+=($row->jueves);
                    $jr+=($row->jr);
                    $jf+=($row->jf);
                    $viernes+=($row->viernes);
                    $vr+=($row->vr);
                    $vf+=($row->vf);
                    $sabado+=($row->sabado);
                    $sr+=($row->sr);
                    $sf+=($row->sf);
                    $domingo+=($row->domingo);
                    $dr+=($row->dr);
                    $df+=($row->df);
                    $lunes+=($row->lunes);
                    $lr+=($row->lr);
                    $lf+=($row->lf);
                    $martes+=($row->martes);
                    $mr+=($row->mr);
                    $mf+=($row->mf);
                    $miercoles+=($row->miercoles);
                    $xr+=($row->xr);
                    $xf+=($row->xf);
                    $total+=($row->total);
                    $totalr+=($row->totalr);
                    $totalf+=($row->totalf);
                    $ingresot+=($row->ingresot);
                    $ingresor+=($row->ingresor);
                    $ingresof+=($row->ingresof);
                    echo "<tr>
                    <td>$i</td>
                    <td>$row->titulo</td>
                    <td>$row->jueves</td>
                    <td>$row->jr</td>
                    <td>$row->jf</td>
                    <td>$row->viernes</td>
                    <td>$row->vr</td>
                    <td>$row->vf</td>
                    <td>$row->sabado</td>
                    <td>$row->sr</td>
                    <td>$row->sf</td>
                    <td>$row->domingo</td>
                    <td>$row->dr</td>
                    <td>$row->df</td>
                    <td>$row->lunes</td>
                    <td>$row->lr</td>
                    <td>$row->lf</td>
                    <td>$row->martes</td>
                    <td>$row->mr</td>
                    <td>$row->mf</td>
                    <td>$row->miercoles</td>
                    <td>$row->xr</td>
                    <td>$row->xf</td>
                    <td>$row->total</td>
                    <td>$row->totalr</td>
                    <td>$row->totalf</td>
                    <td>$row->ingresot</td>
                    <td>$row->ingresor</td>
                    <td>$row->ingresof</td>
                    </tr>";
                }
                echo "<tr>
                <td><b>N</b></td>
                <td><b></b></td>
                <td><b>$jueves</b></td>
                <td><b>$jr</b></td>
                <td><b>$jf</b></td>
                <td><b>$viernes</b></td>
                <td><b>$vr</b></td>
                <td><b>$vf</b></td>
                <td><b>$sabado</b></td>
                <td><b>$sr</b></td>
                <td><b>$sf</b></td>
                <td><b>$domingo</b></td>
                <td><b>$dr</b></td>
                <td><b>$df</b></td>
                <td><b>$lunes</b></td>
                <td><b>$lr</b></td>
                <td><b>$lf</b></td>
                <td><b>$martes</b></td>
                <td><b>$mr</b></td>
                <td><b>$mf</b></td>
                <td><b>$miercoles</b></td>
                <td><b>$xr</b></td>
                <td><b>$xf</b></td>
                <td><b>$total</b></td>
                <td><b>$totalr</b></td>
                <td><b>$totalf</b></td>
                <td><b>$ingresot</b></td>
                <td><b>$ingresor</b></td>
                <td><b>$ingresof</b></td>
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
            paging: false,
            dom: 'Bfrtip',
            buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print'
            ]
        } );
    });
</script>